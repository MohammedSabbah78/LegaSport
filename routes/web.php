<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
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
        Route::get('/forgot-password', [ResetPasswordController::class, 'requestPasswordReset'])->name('password.request');
        Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
    });

    Route::prefix('cms/admin/')->middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('cms.dashboard');
        Route::get('/lang', [DashboardController::class, 'changeLanguage'])->name('cms.dashboard.language');

        // Route::resource('admins', AdminController::class);
        Route::resource('languages', LanguageController::class);
        Route::resource('admins', AdminController::class);


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
