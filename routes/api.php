<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['guest'])->prefix('v1')->group(function(){
    Route::post('/auth/register', [ApiAuthController::class , 'register']);
    Route::post('/auth/login', [ApiAuthController::class , 'login']);
    // Forget Password
    Route::post('/auth/forget/password/sendcode', [ApiAuthController::class , 'forgetPassword']);
    Route::post('/auth/forget/password/checkcode', [ApiAuthController::class , 'checkCodeforgetPassword']);
    Route::post('/auth/forget/password/reset', [ApiAuthController::class , 'resetPassword']);
    // Forget Password
    Route::post('/auth/check-code', [ApiAuthController::class , 'checkCode']);
    Route::post('/auth/resend-code', [ApiAuthController::class , 'reSendVerifiyCode']);


    // App Routes

    Route::controller(AppController::class)->group(function(){
        Route::get('countries','countries');
        Route::get('countries/{country}/onbording','onBording');
        Route::get('cities','cities');
        Route::get('nationalites','nationalites');
        Route::get('analytics','analyticsUser');
        Route::get('languages','languages');
    });
    

});
Route::prefix('v1')->middleware(['auth:user-api'])->group(function(){
    
    Route::get('auth/logout',[ApiAuthController::class , 'logout']);
    Route::post('auth/change/password',[ApiAuthController::class , 'changePassword']);
    Route::post('auth/user/type',[ApiAuthController::class , 'userType']);
    //Sports
    Route::get('sports',[SportController::class , 'sports']);
    Route::post('sports/choose',[SportController::class , 'sportsChoose']);
    // Profile Route
    Route::controller(ProfileController::class)->group(function(){
        Route::post('profile/coach','coach');
        Route::post('profile/player','player');
        Route::post('profile/academy','academy');
        Route::post('profile/card','card');
    });
    // Profile Route


    
    
});