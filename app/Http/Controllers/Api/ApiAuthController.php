<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllersService;
use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResponse;
use App\Http\Resources\SuccessResponse;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserWithOutTokenResource;
use App\Http\Trait\CustomTrait;
use App\Mail\SendCodeVerifiy;
use App\Models\MobileToken;
use App\Models\PasswordResetUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthController extends Controller
{

    use CustomTrait;
    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'emOrMb' => 'required|string',
            'password' => 'required|string',
            'fcm_token' => 'required|string',
            'mobile_type' => 'required|string',
            'lang_id' => 'nullable|string|exists:languages,id'
        ]);

        if (!$validator->fails()) {
            $user = $this->getUser($request);
            if(is_null($user)){
                return response()->json([
                    'status' => false,
                    'message' => Messages::getMessage('ACCOUNT_NOT_EXISTS'),
                ],Response::HTTP_BAD_REQUEST);
            }
            
            if ($user->status == "verefy") {

                if (!Hash::check($request->input('password'), $user->password)) {
                    return response()->json([
                        'status' => false,
                        'message' => Messages::getMessage('ERROR_PASSWORD'),
                    ], Response::HTTP_BAD_REQUEST);
                }
                if(!is_null($request->get('lang_id'))){
                    $user->language_id = $request->get('lang_id');
                    $user->save();
                }
                return $this->generateToken($request, $user);
            } else {
                $message = Messages::getMessage('NO_ACCOUNT');
                if ($user->status == "blocked") {
                    $message = Messages::getMessage('BLOCK_ACCOUNT');
                }
                if ($user->status == "unVerefy") {
                    $message = Messages::getMessage('NOT_VERIFIED');
                }
                return response()->json([
                    'status' => false,
                    'message' => $message,
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    private function generateToken(Request $request, $user, $type = 'login')
    {
        try {
            $token = $user->createToken('user-api');
            $user->setAttribute('token', $token->accessToken);
            $this->saveFcmToken($request, $user, $token);

            return response()->json([
                'status' => true,
                'message' => Messages::getMessage($type == 'login' ? 'LOGGED_IN_SUCCESSFULLY' : 'SUCCESS_CHECKED'),
                'data' => new UserResource($user),
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            $message = Messages::getMessage($type == "login" ? 'LOGIN_IN_FAILED' : 'FAILD_CHECKED');
            return response()->json([
                'status' => false,
                'message' => $message,
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    private function saveFcmToken(Request $request, User $user, $token)
    {
        $mobileTokens = new MobileToken();
        $mobileTokens->user_id = $user->id;
        $mobileTokens->user_token = $token->token->id;
        $mobileTokens->mobile_type = $request->input('mobile_type');
        $mobileTokens->fcm_token = $request->input('fcm_token');
        $mobileTokens->save();
    }


    public function checkCodeforgetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'mobile' => 'required|string|exists:users,mobile',
            'code' => 'required|string'
        ]);

        if (!$validator->fails()) {
            $user = User::where('mobile', $request->get('mobile'))->first();

            if (!Hash::check($request->input('code'), $user->verification_code)) {
                return response()->json([
                    'status' => false,
                    'message' => Messages::getMessage('PASSWORD_RESET_CODE_ERROR'),
                ], Response::HTTP_BAD_REQUEST);
            }
            $user->verification_code = null;
            $user->save();
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('PASSWORD_RESET_CODE_CORRECT'),
            ], Response::HTTP_OK);
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }


    public function saveCodeOnTable(Request $request, $code)
    {
        $passwordReset = new PasswordResetUser;
        $passwordReset->mobile = $request->input('mobile');
        $passwordReset->code = Hash::make($code);
        $passwordReset->created_at = now();
        $passwordReset->save();
    }

    public function checkCodePasswordReset(Request $request)
    {
        $passwordReset = PasswordResetUser::where('mobile', $request->get('mobile'))->orWhere('email', $request->get('email'))->first();
        $user = User::where('mobile', $request->get('mobile'))->orWhere('email', $request->get('email'))->first();
        if (!is_null($passwordReset) && is_null($user->verification_code)) {
            PasswordResetUser::where('mobile', $request->get('mobile'))->delete();
            return true;
        } else {
            return false;
        }
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'mobile' => 'nullable|string|exists:users,mobile',
            'email' => 'required_if:mobile,nullable|string|exists:users,email',
        ]);

        if (!$validator->fails()) {
            $user = User::where('mobile', $request->get('mobile'))->orWhere('email', $request->get('email'))->first();
            $this->sendActivationCodeDebug($user, 55555);
            $this->saveCodeOnTable($request, 55555);
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('FORGET_PASSWORD_SUCCESS'),
                'code_debug' => 55555
            ], Response::HTTP_OK);
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'mobile' => 'nullable|string|exists:users,mobile',
            'email' => 'required_if:mobile,nullable|string|exists:users,email',
            'password' => 'required|string|confirmed',
            'isRevoke' => 'required|boolean'
        ]);

        if (!$validator->fails()) {
            $user = User::where('mobile', $request->get('mobile'))->orWhere('email', $request->get('email'))->first();

            if ($this->checkCodePasswordReset($request)) {
                $user->password = Hash::make($request->get('password'));
                $isSaved = $user->save();

                if ($request->input('isRevoke')) {
                    $this->revokePreviousTokens($user->id);
                }
                return response()->json([
                    'status' => $isSaved,
                    'message' => $isSaved ? Messages::getMessage('RESET_PASSWORD_SUCCESS') : Messages::getMessage('RESET_PASSWORD_FAILED')
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => Messages::getMessage('NO_PASSWORD_RESET_CODE')
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'current_password' => 'required|string|min:3',
            'new_password' => 'required|string|confirmed',
            'isRevoke' => 'required|boolean'
        ]);

        if (!$validator->fails()) {
            $user = auth('user-api')->user();
            if (!Hash::check($request->get('current_password'), $user->password)) {
                return response()->json(new ErrorResponse('CURRENT_PASSWORD_ERROR'), Response::HTTP_BAD_REQUEST);
            }
            $user->password = Hash::make($request->get('new_password'));
            $isSaved = $user->save();

            if ($request->input('isRevoke')) {
                $this->revokePreviousTokens($user->id, auth()->user()->token()->id);
            }
            return response()->json([
                'status' => $isSaved,
                'message' => $isSaved ? Messages::getMessage('CHANGE_PASSWORD_SUCCESS') : Messages::getMessage('CHANGE_PASSWORD_FAILED')
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function updateUserIFNotActive(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $isSaved = $user->save();
        if ($isSaved) {
            $this->sendActivationCodeDebug($user, 55555);
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('AUTH_CODE_SENT'),
                'code_debug' => 55555,
            ], Response::HTTP_OK);
        } else {
            return ControllersService::generateProcessResponse(false, 'REGISTER');
        }
    }

    public function createNewUser(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->input('name');
        $newUser->mobile = $request->input('mobile');
        $newUser->email = $request->input('email');
        $newUser->password = Hash::make($request->input('password'));
        $newUser->language_id = $request->input('lang_id');
        $isSaved = $newUser->save();
        if ($isSaved) {
            $this->sendActivationCodeDebug($newUser, 55555);
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('AUTH_CODE_SENT'),
                'code_debug' => 55555,
            ], Response::HTTP_OK);
        } else {
            return ControllersService::generateProcessResponse(false, 'REGISTER');
        }
    }

    public function register(Request $request)
    {
        $roles = [
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'password' => 'required|min:6|max:12|confirmed',
            'lang_id' => 'required|string|exists:languages,id'

        ];
        $validator = Validator($request->all(), $roles);
        if (!$validator->fails()) {

            $user = User::where('mobile', $request->get('mobile'))->orWhere('email', $request->get('email'))->first();
            if ($user == null || ($user != null && $user->status != 'unVerefy')) {

                if ($this->checkMobileExists($request->get('mobile'))) {
                    return response()->json(new ErrorResponse('MOBILE_USED'), Response::HTTP_BAD_REQUEST);
                }

                if ($this->checkEmailExists($request->get('email'))) {
                    return response()->json(new ErrorResponse('EMAIL_USED'), Response::HTTP_BAD_REQUEST);
                }

                return $this->createNewUser($request);
            }
            return $this->updateUserIFNotActive($request, $user);
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    private function checkEmailExists($em)
    {
        $isExistsEmail = User::where('email', $em)->exists();
        return $isExistsEmail;
    }

    private function checkMobileExists($mb)
    {
        $isExistsEmail = User::where('mobile', $mb)->exists();
        return $isExistsEmail;
    }

    // public function updateProfile(Request $request)
    // {
    //     $roles = [
    //         'avater' => 'nullable|image|mimes:jpg,png,jpeg',
    //         'name' => 'nullable|string',
    //         'email' => 'nullable|email|unique:users,email,' . auth()->user()->id,
    //         'mobile' => 'nullable|string|unique:users,mobile,' . auth()->user()->id,
    //     ];
    //     $validator = Validator($request->all(), $roles);
    //     if (!$validator->fails()) {
    //         $user = auth('user-api')->user();
    //         $user->name = $request->get('name');
    //         $user->email = $request->get('email');
    //         $user->mobile = $request->get("mobile");
    //         if ($request->hasFile('avater')) {
    //             $user->avater = $this->uploadFile($request->file("avater"));
    //         }
    //         $isSaved = $user->save();
    //         return response()->json([
    //             'status' => $isSaved,
    //             'message' => $isSaved ? Messages::getMessage('USER_UPDATED_SUCCESS') : Messages::getMessage('USER_UPDATED_FAILED'),
    //             'data' => new UserWithOutTokenResource($user)
    //         ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    //     } else {
    //         return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
    //     }
    // }

    private function sendActivationCodeDebug(User $user, $code)
    {
        $user->verification_code = Hash::make($code);
        $user->save();
    }

    private function sendActivationCode(User $user)
    {
        $code = random_int(10000, 99999);
        $user->verification_code = Hash::make($code);
        $user->save();
        // Mail::to($user)->send(new SendCodeVerifiy($code));
        // return response()->json([
        //     'status' => true,
        //     'message' => Messages::getMessage('AUTH_CODE_SENT'),
        //     'code' => $code
        // ], Response::HTTP_CREATED);

    }

    public function sendResetPasswordCode(User $user, $code)
    {
        $user->verification_code = Hash::make($code);
        $user->save();
        // Mail::to($user)->send(new SendCodeVerifiy($code));
    }

    public function checkResetPasswordCode(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if (Hash::check($request->input('code'), $user->verification_code)) {
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('SUCCESS_CHECKED'),
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'status' => false,
                'message' => Messages::getMessage('FAILD_CHECKED'),
            ], Response::HTTP_CREATED);
        }
    }

    public function sendVerifiyCode(Request $request)
    {
        $user = auth()->user();
        $code = random_int(10000, 99999);
        $user->verification_code = Hash::make($code);
        $user->save();
        // Mail::to($user)->send(new SendCodeVerifiy($code));

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('AUTH_CODE_SENT'),
            'code_debug' => $code
        ], Response::HTTP_CREATED);
    }

    public function reSendVerifiyCode(Request $request)
    {
        $validator = Validator($request->all(), [
            'mobile' => 'nullable|string|exists:users,mobile',
            'email' => 'required_if:mobile,nullable|string|exists:users,email',
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', $request->get('email'))->orWhere('mobile', $request->get('mobile'))->first();
            // $code = random_int(10000, 99999);
            $code = 55555;
            $user->verification_code = Hash::make($code);
            $user->save();
            // Mail::to($user)->send(new SendCodeVerifiy($code));

            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('AUTH_CODE_SENT'),
                'code_debug' => $code
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function checkCode(Request $request)
    {
        $validator = Validator($request->all(), [
            'fcm_token' => 'required|string',
            'mobile_type' => 'required|string',
            'mobile' => 'required|string|exists:users,mobile',
            'email' => 'required_if:mobile,nullable|string|exists:users,email',
            'code' => 'required|string'
        ]);

        if (!$validator->fails()) {
            $user = User::where('mobile', $request->get('mobile'))->orWhere('email', $request->get('email'))->first();
            if (Hash::check($request->input('code'), $user->verification_code)) {
                $user->status = "verefy";
                $user->verification_code = null;
                $user->save();

                return $this->generateToken($request, $user, 'check');
            } else {
                return response()->json([
                    'status' => false,
                    'message' => Messages::getMessage('FAILD_CHECKED'),
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function activateAccount(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|digits:9|exists:users,email',
            'code' => 'required|numeric|digits:4',
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', $request->get('email'))->first();
            if (!is_null($user->verification_code)) {
                if (Hash::check($request->get('code'), $user->verification_code)) {
                    $user->verification_code = null;
                    $user->verified = true;
                    $isSaved = $user->save();
                    if ($isSaved) $user->assignRole(Role::findByName('Customer-API', 'user-api'));
                    return response()->json([
                        'status' => $isSaved,
                        'message' => $isSaved ? Messages::getMessage('SUCCESS_AUTH') : Messages::getMessage('FAILED_AUTH')
                    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                } else {
                    return ControllersService::generateProcessResponse(false, 'AUTH_CODE_ERROR');
                }
            } else {
                if ($user->verified) {
                    return ControllersService::generateProcessResponse(false, 'VERIFIED_BOFORE');
                } else {
                    return $this->sendActivationCode($user);
                }
            }
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function logout(Request $request)
    {
        MobileToken::where('user_token', auth()->user()->token()->id)->delete();
        $token = auth('user-api')->user()->token();
        $isRevoked = $token->revoke();
        return response()->json([
            'status' => $isRevoked,
            'message' => $isRevoked ? Messages::getMessage('LOGGED_OUT_SUCCESSFULLY') : Messages::getMessage('LOGGED_OUT_FAILED'),
        ], $isRevoked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function refreshFcmToken(Request $request)
    {
        $validator = Validator($request->all(), [
            'fcm_token' => 'required|string'
        ]);
        if (!$validator->fails()) {
            $user = auth('user-api')->user();
            $user->fcm_token = $request->get('fcm_token');
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Token refreshed successfully'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    private function revokePreviousTokens($userId, $currentToken = null)
    {
        if ($currentToken != null) {
            DB::table('oauth_access_tokens')
                ->where('user_id', $userId)
                ->where('id', '<>', $currentToken)
                ->update([
                    'revoked' => true
                ]);
        } else {
            DB::table('oauth_access_tokens')
                ->where('user_id', $userId)
                ->update([
                    'revoked' => true
                ]);
        }
    }

    private function checkForActiveTokens($userId)
    {
        return DB::table('oauth_access_tokens')
            ->where('user_id', $userId)
            ->where('revoked', false)
            ->exists();
    }



    protected function getUser(Request $request)
    {
        $way = '';
        if (filter_var($request->get('emOrMb'), FILTER_VALIDATE_EMAIL)) {
            $way = 'email';
        } else {
            $way = 'mobile';
        }
        return User::where($way, $request->get('emOrMb'))->first();
    }

    public function userType(Request $request){
        $validator = Validator($request->all(), [
            'type' => 'required|string|in:player,coach,academy',
        ]);
        if (!$validator->fails()) {
            $user = auth()->user();
            $user->type = $request->get('type');
            $user->save();
            return response()->json(new SuccessResponse('SUCCESS_SEND',[],false));
        } else {
            return response()->json(new ErrorResponse('ERROR_SEND'));
        }
    }
}
