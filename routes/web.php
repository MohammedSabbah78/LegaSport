<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CityTranslationController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryTranslationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\NationalityTranslationController;
use App\Http\Controllers\OnBoardingScreenController;
use App\Http\Controllers\OnBoardingScreenTranslationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\SportTranslationController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::prefix('cms')->middleware('guest:admin')->group(function () {
        Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('cms.login');
        Route::post('login', [AuthController::class, 'login']);
    });
    Route::middleware('guest')->group(function () {
        Route::get('forgot-password', [ResetPasswordController::class, 'showForgotpassword'])->name('password.forgot');
        Route::post('forgot-password', [ResetPasswordcontroller::class, 'sendResetEmail']);
        Route::get('reset-password/{token}', [ResetPasswordcontroller::class, 'showResetPassword'])->name('password.reset');
        Route::post('reset-password', [ResetPasswordcontroller::class, 'resetPassword']);
    });

    Route::prefix('cms/admin/')->middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('cms.dashboard');
        Route::get('/lang', [DashboardController::class, 'changeLanguage'])->name('cms.dashboard.language');

        // Route::resource('admins', AdminController::class);
        Route::resource('languages', LanguageController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('ads', AdController::class);

        /*
        |--------------------------------------------------------------------------
        | Sport Routes
        |--------------------------------------------------------------------------
        */
        Route::get('sports', [SportController::class, 'index'])->name('sports.index');
        Route::get('sports/create', [SportController::class, 'create'])->name('sports.create');
        Route::post('sports', [SportController::class, 'store'])->name('sports.store');
        Route::delete('sports/{sport}', [SportController::class, 'destroy'])->name('sports.destroy');

        Route::get('sports/translation/{language}', [SportTranslationController::class, 'showByLanguage'])->name('sport-translations.showByLanguage');
        Route::get('sports/{sport}/translation/create', [SportTranslationController::class, 'create'])->name('sport-translations.create');
        Route::post('sports/{sport}/translation', [SportTranslationController::class, 'store'])->name('sport-translations.store');
        Route::get('sports/translations/{sportTranslation}/edit', [SportTranslationController::class, 'edit'])->name('sport-translations.edit');
        Route::put('sports/translations/{sportTranslation}', [SportTranslationController::class, 'update'])->name('sport-translations.update');
        Route::delete('sports/translations/{sportTranslation}', [SportTranslationController::class, 'destroy'])->name('sport-translations.destroy');




        /*
        |--------------------------------------------------------------------------
        | Nationalities Routes
        |--------------------------------------------------------------------------
        */
        Route::get('nationalities', [NationalityController::class, 'index'])->name('nationalities.index');
        Route::get('nationalities/create', [NationalityController::class, 'create'])->name('nationalities.create');
        Route::post('nationalities', [NationalityController::class, 'store'])->name('nationalities.store');
        Route::delete('nationalities/{nationality}', [NationalityController::class, 'destroy'])->name('nationalities.destroy');

        Route::get('nationalities/translation/{language}', [NationalityTranslationController::class, 'showByLanguage'])->name('nationality-translations.showByLanguage');
        Route::get('nationalities/{nationality}/translation/create', [NationalityTranslationController::class, 'create'])->name('nationality-translations.create');
        Route::post('nationalities/{nationality}/translation', [NationalityTranslationController::class, 'store'])->name('nationality-translations.store');
        Route::get('nationalities/translations/{nationalityTranslation}/edit', [NationalityTranslationController::class, 'edit'])->name('nationality-translations.edit');
        Route::put('nationalities/translations/{nationalityTranslation}', [NationalityTranslationController::class, 'update'])->name('nationality-translations.update');
        Route::delete('nationalities/translations/{nationalityTranslation}', [NationalityTranslationController::class, 'destroy'])->name('nationality-translations.destroy');



        /*
        |--------------------------------------------------------------------------
        | Countries Routes
        |--------------------------------------------------------------------------
        */
        Route::get('countries', [CountryController::class, 'index'])->name('countries.index');
        Route::get('countries/create', [CountryController::class, 'create'])->name('countries.create');
        Route::post('countries', [CountryController::class, 'store'])->name('countries.store');
        Route::delete('countries/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');

        Route::get('countries/translation/{language}', [CountryTranslationController::class, 'showByLanguage'])->name('country-translations.showByLanguage');
        Route::get('countries/{country}/translation/create', [CountryTranslationController::class, 'create'])->name('country-translations.create');
        Route::post('countries/{country}/translation', [CountryTranslationController::class, 'store'])->name('country-translations.store');
        Route::get('countries/translations/{country_translation}/edit', [CountryTranslationController::class, 'edit'])->name('country-translations.edit');
        Route::put('countries/translations/{country_translation}', [CountryTranslationController::class, 'update'])->name('country-translations.update');
        Route::delete('countries/translations/{country_translation}', [CountryTranslationController::class, 'destroy'])->name('country-translations.destroy');




        /*
        |--------------------------------------------------------------------------
        | Cities Routes
        |--------------------------------------------------------------------------
        */
        Route::get('cities', [CityController::class, 'index'])->name('cities.index');
        Route::get('cities/create', [CityController::class, 'create'])->name('cities.create');
        Route::post('cities', [CityController::class, 'store'])->name('cities.store');
        Route::delete('cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');

        Route::get('cities/translation/{language}/country/{country}', [CityTranslationController::class, 'showByCountry'])->name('city-translations.showByLanguage');
        Route::get('cities/{city}/translation/create', [CityTranslationController::class, 'create'])->name('city-translations.create');
        Route::post('cities/{city}/translation', [CityTranslationController::class, 'store'])->name('city-translations.store');
        Route::get('cities/translations/{city_translation}/edit', [CityTranslationController::class, 'edit'])->name('city-translations.edit');
        Route::put('cities/translations/{city_translation}', [CityTranslationController::class, 'update'])->name('city-translations.update');
        Route::delete('cities/translations/{city_translation}', [CityTranslationController::class, 'destroy'])->name('city-translations.destroy');




        /*
        |--------------------------------------------------------------------------
        | Cities Routes
        |--------------------------------------------------------------------------
        */
        Route::get('on-boarding-screens', [OnBoardingScreenController::class, 'index'])->name('on-boarding-screens.index');
        Route::get('on-boarding-screens/create', [OnBoardingScreenController::class, 'create'])->name('on-boarding-screens.create');
        Route::get('on-boarding-screens/{onBoardingScreen}/edit', [OnBoardingScreenController::class, 'edit'])->name('on-boarding-screens.edit');
        Route::post('on-boarding-screens', [OnBoardingScreenController::class, 'store'])->name('on-boarding-screens.store');
        Route::delete('on-boarding-screens/{onBoardingScreen}', [OnBoardingScreenController::class, 'destroy'])->name('on-boarding-screens.destroy');

        Route::get('on-boarding-screens/translation/{language}', [OnBoardingScreenTranslationController::class, 'showByLanguage'])->name('on-boarding-screen-translations.showByLanguage');
        Route::get('on-boarding-screens/{onBoardingScreen}/translation/create', [OnBoardingScreenTranslationController::class, 'create'])->name('on-boarding-screen-translations.create');
        Route::post('on-boarding-screens/{onBoardingScreen}/translation', [OnBoardingScreenTranslationController::class, 'store'])->name('on-boarding-screen-translations.store');
        Route::get('on-boarding-screens/translations/{onBoardingScreenTranslation}/edit', [OnBoardingScreenTranslationController::class, 'edit'])->name('on-boarding-screen-translations.edit');
        Route::put('on-boarding-screens/translations/{onBoardingScreenTranslation}', [OnBoardingScreenTranslationController::class, 'update'])->name('on-boarding-screen-translations.update');
        Route::delete('on-boarding-screens/translations/{onBoardingScreenTranslation}', [OnBoardingScreenTranslationController::class, 'destroy'])->name('on-boarding-screen-translations.destroy');



        /*
        |--------------------------------------------------------------------------
        | Roles & Permissions Routes
        |--------------------------------------------------------------------------
        */

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('permissions/role', RolePermissionController::class);

        /*
        |--------------------------------------------------------------------------
        | Edit password Routes
        |--------------------------------------------------------------------------
        */
        Route::get('change-password', [AuthController::class, 'editPassword'])->name('edit-password');
        Route::post('update-password', [AuthController::class, 'updatePassword'])->name('auth.update-password');
    });
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('cms/admin/')->middleware('auth:admin')->group(function () {
            Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');
        });
    }
);
