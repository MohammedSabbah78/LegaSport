<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllersService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Resources\General\AboutResource;
use App\Http\Resources\General\FaqsResource;
use App\Http\Resources\General\FederationResource;
use App\Http\Resources\General\OfficeResource;
use App\Http\Resources\General\PartnersResource;
use App\Http\Resources\General\PaymentResource;
use App\Http\Resources\General\PolicyResource;
use App\Http\Resources\General\TermsResource;
use App\Http\Resources\SportResource;
use App\Http\Trait\CustomTrait;
use App\Models\About;
use App\Models\Country;
use App\Models\CountryTranslation;
use App\Models\Faq;
use App\Models\Federation;
use App\Models\Language;
use App\Models\Office;
use App\Models\Partner;
use App\Models\Paymen;
use App\Models\Policie;
use App\Models\RequestVerification;
use App\Models\Sport;
use App\Models\SportTranslation;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function App\Helpers\res;
use function App\Helpers\uploadFile;

class GeneralController extends Controller
{
    public function terms(){
        $data = Term::latest()->first();
        return res('SUCCESS_GET',true,new TermsResource($data));
    }

    public function policy(){
        $data = Policie::latest()->first();
        return res('SUCCESS_GET',true,new PolicyResource($data));
    }

    public function about(){
        $data = About::latest()->first();
        $player = User::where('type', 'player')->count();
        $coach = User::where('type', 'coach')->count();
        $academy = User::where('type', 'academy')->count();
        $partners = Partner::take(5)->get();
        $offices = Office::take(5)->get();
        $result = [
            'about_data' => new AboutResource($data),
            'alanytices' => [
                'playe_countr' => $player,
                'coach_count' => $coach,
                'academy_count' => $academy,
                'offices_count' => $offices->count(),
                'partners_count' => $partners->count(),
            ],
            'partners' => PartnersResource::collection($partners),
            'offices' => OfficeResource::collection($offices),
        ];
        return res('SUCCESS_GET',true,$result);
    }

    public function fqs(){
        $data = Faq::all();
        return res('SUCCESS_GET',true,FaqsResource::collection($data));
    }

    public function emailSupport(){
        $data = collect();
        $data->add([
            'name' => 'HR',
            'email' => 'mohamed@email.com'
        ]);

        $data->add([
            'name' => 'HR2',
            'email' => 'mohamed2@email.com'
        ]);
        return res('SUCCESS_GET',true,$data);
    }

    public function offices(){
        $data = Office::all();
        return res('SUCCESS_GET',true,OfficeResource::collection($data));
    }

    public function sports(){
        $selectLang = request()->header('lang') ?? config('app.locale');
        $lang = Language::where('code', $selectLang)->first();
        $data = SportTranslation::where('language_id',$lang->id)->get();
        return res('SUCCESS_GET',true,SportResource::collection($data));
    }

    public function federationsDefualt(){
        $data = Federation::take(3)->get();
        return res('SUCCESS_GET',true,FederationResource::collection($data));
    }

    public function federationsBySport(Country $country , Sport $sport){
        $data = Federation::where('country_id',$country->id)->where('sport_id',$sport->id)->get();
        return res('SUCCESS_GET',true,FederationResource::collection($data));
    }
    public function federationsSports(){
        $data = SportTranslation::whereHas('sport',function($q){
            $q->has('federations')->where('active',true);
        })->get();
        return res('SUCCESS_GET',true,SportResource::collection($data));
    }

    public function federationsLocations(){
        $lang = Language::where('code', request()->header('lang') ?? config('app.locale'))->first();
        $data = CountryTranslation::whereHas('country',function($q){
            $q->has('federation')
                ->where('active',true);
        })->where('language_id',$lang->id)->get();

        return res('SUCCESS_GET',true,CountryResource::collection($data));
    }


    public function changeEmail(Request $request){
        $validator = Validator($request->all(),[
            'old_email' => 'required|string',
            'new_email' => 'required|string',
        ]);
        if(!$validator->fails()){
            if($request->old_email != auth()->user()->email){
                return res('RECENT_DATA_ERROR',false);
            }
            if($request->old_email == $request->new_email){
                return res('SAME_ENTER_DATA',false);
            }

            $user = auth()->user();
            $user->email = $request->new_email;
            $user->save();
            return res('CHANGE_SUCCESS',true);
        }else{
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function changePhone(Request $request){
        $validator = Validator($request->all(),[
            'recent_mobile' => 'required|string',
            'new_mobile' => 'required|string|confirmed|unique:users,mobile',
        ]);
        if(!$validator->fails()){
            if($request->recent_mobile != auth()->user()->mobile){
                return res('RECENT_DATA_ERROR',false);
            }
            if($request->new_mobile == $request->recent_mobile){
                return res('SAME_ENTER_DATA',false);
            }
            $user = auth()->user();
            $user->mobile = $request->new_mobile;
            $user->save();
            return res('CHANGE_SUCCESS',true);
        }else{
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function changePassword(Request $request){
        $validator = Validator($request->all(),[
            'recent_password' => 'required|string',
            'new_password' => 'required|string|confirmed',
        ]);
        if(!$validator->fails()){
            $user = auth()->user();
            if(!Hash::check($request->recent_password,$user->password)){
                return res('PASSWORD_RECENT_FAILD',false);
            }
            $user->password = Hash::make($request->new_password);
            $user->save();

            return res('CHANGE_SUCCESS',true);
        }else{
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function changeLang(Request $request){
        $validator = Validator($request->all(),[
            'language_id' => 'required|numeric|exists:languages,id'
        ]);
        if(!$validator->fails()){
            $user = auth()->user();
            $user->language_id = $request->language_id;
            $user->save();
            return res('CHANGE_SUCCESS',true);
        }else{
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }


    public function invest(){
        $partners = Partner::take(5)->get();
        $result = [
            'body' => "LEAGUE + enjoys the confidence of many investors and those interested in developing the sports\n field, and we at LEAGUE + are working to renew that confidence\n by achieving visions and goals for our partners and creating sustainable partnerships by opening\n the doors of sponsorships, services and specialized sports stores.",
            'partners' => PartnersResource::collection($partners)
        ];
        return res('SUCCESS_GET',true,$result);
    }

    public function setDataInvest(Request $request){
        return 'Not Ready';
        $validator = Validator($request->all(),[
            'language_id' => 'required|numeric|exists:languages,id'
        ]);
        if(!$validator->fails()){
            
            return res('SUCCESS_SEND',true);
        }else{
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }


    public function accountVerefication(){
        $data = [
            'body' => "Account authentication guarantees high-level serious transactions and protects you from \nsuspicious transactions. \nIt is a paid service. Verification takes a maximum of 14 working days."
        ];
        return res('SUCCESS_GET',true,$data);
    }

    public function setAccountVerefication(Request $request){
        $validator = Validator($request->all(),[
            'full_name' => 'required|string',
            'country_id' => 'required|numeric|exists:countries,id',
            'birth_certificate' => 'required|image|mimes:jpeg,jpg,png,gif',
            'personal_id_image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'citizenchip_certificate' => 'required|image|mimes:jpeg,jpg,png,gif',
            'blood_type' => 'required|string|in:A+,A-,O+,O-,B+,B-,AB',
            'postal_code' => 'required|string',
            'social_acount1' => 'required|url',
            'social_acount2' => 'required|url',
        ]);
        if(!$validator->fails()){
            $userId = auth()->user()->id;
            $requestAccount = new RequestVerification();
            $requestAccount->user_id = auth()->user()->id;
            $requestAccount->full_name = $request->full_name;
            $requestAccount->country_id = $request->country_id;
            $requestAccount->birth_certificate = uploadFile($request->birth_certificate,"verefication/user/{$userId}");
            $requestAccount->personal_id_image = uploadFile($request->personal_id_image,"verefication/user/{$userId}");
            $requestAccount->citizenchip_certificate = uploadFile($request->citizenchip_certificate,"verefication/user/{$userId}");
            $requestAccount->blood_type = $request->blood_type;
            $requestAccount->postal_code = $request->postal_code;
            $requestAccount->social_acount1 = $request->social_acount1;
            $requestAccount->social_acount2 = $request->social_acount2;
            $isSave = $requestAccount->save();
            return res('SUCCESS_SEND',$isSave);
        }else{
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }
    
    public function payments(){
        $data = Paymen::all();
        return res('SUCCESS_GET',true,PaymentResource::collection($data));
    }

    public function sendCheckOut(Request $request){
        $data = 'الطلب في طور التطوير حاليا ، في انتظار بوابة الدفع';
        return res('SUCCESS_SEND',true,$data);
    }


    
    
}
