<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {

        $request->merge(['guard' => $request->guard]);
        $validator = Validator($request->all(), [
            'guard' => 'required|string|in:admin'
        ]);
        session()->put('guard', $request->input('guard'));
        if (!$validator->fails()) {
            return response()->view('cms.auth.login');
        } else {
            abort(404);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'user_name' => 'nullable|string',
            'email' => 'nullable|string',
            'password' => 'required|string|min:3|max:10',
            'remember' => 'required|boolean',
        ]);

        $guard = session('guard');
        if ($guard != 'admin') {
            $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        } else {
            $credentials = ['user_name' => $request->get('user_name'), 'password' => $request->get('password')];
        }
        if (!$validator->fails()) {
            if (Auth::guard($guard)->attempt($credentials, $request->get('remember'))) {
                // Language::all();
                return response()->json(['message' => 'Logged in successfully'], Response::HTTP_OK);
            } else {
                return response()->json(['message' => 'Error credentials, please try again'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }


    public function editPassword(Request $request)
    {

        return response()->view('cms.auth.profile.change-password');
    }


    public function updatePassword(Request $request)
    {

        $guard = session('guard');
        $guard = auth($guard)->check() ? $guard : null;
        $validator = validator($request->all(), [
            'password' => 'required|current_password:' . $guard,
            'new_password' => ['required', 'confirmed']
        ]);

        if (!$validator->fails()) {
            $superAdmin = $request->user();
            $superAdmin->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $superAdmin->save();
            return response()->json(
                ['message' => $isSaved ? 'Password changed successfully' : 'Password was not changed successfully'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        $guard = session('guard');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login', $guard);
    }
}
