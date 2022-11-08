<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AchievementTranslationController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterTranslationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTranslationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanTranslationController;
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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::prefix('cms/admin/')->middleware('auth:admin')->group(function () {
        // Mohammed Bhessy

        /*
        |--------------------------------------------------------------------------
        | Countries Routes
        |--------------------------------------------------------------------------
        */
        Route::get('achievements', [AchievementController::class, 'index'])->name('achievements.index');
        Route::get('achievements/create', [AchievementController::class, 'create'])->name('achievements.create');
        Route::post('achievements', [AchievementController::class, 'store'])->name('achievements.store');
        Route::delete('achievements/{achievement}', [AchievementController::class, 'destroy'])->name('achievements.destroy');

        Route::get('achievements/translation/{language}', [AchievementTranslationController::class, 'showByLanguage'])->name('achievement-translations.showByLanguage');
        Route::get('achievements/{achievement}/translation/create', [AchievementTranslationController::class, 'create'])->name('achievement-translations.create');
        Route::post('achievements/{achievement}/translation', [AchievementTranslationController::class, 'store'])->name('achievement-translations.store');
        Route::get('achievements/translations/{achievementTranslation}/edit', [AchievementTranslationController::class, 'edit'])->name('achievement-translations.edit');
        Route::put('achievements/translations/{achievementTranslation}', [AchievementTranslationController::class, 'update'])->name('achievement-translations.update');
        Route::delete('achievements/translations/{achievementTranslation}', [AchievementTranslationController::class, 'destroy'])->name('achievement-translations.destroy');








        /*
        |--------------------------------------------------------------------------
        | Plans Routes
        |--------------------------------------------------------------------------
        */
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
        Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
        Route::delete('plans/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');

        Route::get('plans/translation/{language}', [PlanTranslationController::class, 'showByLanguage'])->name('plan-translations.showByLanguage');
        Route::get('plans/{plan}/translation/create', [PlanTranslationController::class, 'create'])->name('plan-translations.create');
        Route::post('plans/{plan}/translation', [PlanTranslationController::class, 'store'])->name('plan-translations.store');
        Route::get('plans/translations/{planTranslation}/edit', [PlanTranslationController::class, 'edit'])->name('plan-translations.edit');
        Route::put('plans/translations/{planTranslation}', [PlanTranslationController::class, 'update'])->name('plan-translations.update');
        Route::delete('plans/translations/{planTranslation}', [PlanTranslationController::class, 'destroy'])->name('plan-translations.destroy');


        /*
        |--------------------------------------------------------------------------
        | Centers Routes
        |--------------------------------------------------------------------------
        */
        Route::get('centers', [CenterController::class, 'index'])->name('centers.index');
        Route::get('centers/create', [CenterController::class, 'create'])->name('centers.create');
        Route::post('centers', [CenterController::class, 'store'])->name('centers.store');
        Route::delete('centers/{center}', [CenterController::class, 'destroy'])->name('centers.destroy');

        Route::get('centers/translation/{language}', [CenterTranslationController::class, 'showByLanguage'])->name('center-translations.showByLanguage');
        Route::get('centers/{center}/translation/create', [CenterTranslationController::class, 'create'])->name('center-translations.create');
        Route::post('centers/{center}/translation', [CenterTranslationController::class, 'store'])->name('center-translations.store');
        Route::get('centers/translations/{centerTranslation}/edit', [CenterTranslationController::class, 'edit'])->name('center-translations.edit');
        Route::put('centers/translations/{centerTranslation}', [CenterTranslationController::class, 'update'])->name('center-translations.update');
        Route::delete('centers/translations/{centerTranslation}', [CenterTranslationController::class, 'destroy'])->name('center-translations.destroy');


        /*
        |--------------------------------------------------------------------------
        | Event Routes
        |--------------------------------------------------------------------------
        */
        Route::get('events', [EventController::class, 'index'])->name('events.index');
        Route::get('events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('events', [EventController::class, 'store'])->name('events.store');
        Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

        Route::get('events/translation/{language}', [EventTranslationController::class, 'showByLanguage'])->name('event-translations.showByLanguage');
        Route::get('events/{event}/translation/create', [EventTranslationController::class, 'create'])->name('event-translations.create');
        Route::post('events/{event}/translation', [EventTranslationController::class, 'store'])->name('event-translations.store');
        Route::get('events/translations/{eventTranslation}/edit', [EventTranslationController::class, 'edit'])->name('event-translations.edit');
        Route::put('events/translations/{eventTranslation}', [EventTranslationController::class, 'update'])->name('event-translations.update');
        Route::delete('events/translations/{eventTranslation}', [EventTranslationController::class, 'destroy'])->name('event-translations.destroy');
    });
});
