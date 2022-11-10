<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AchievementTranslationController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterTranslationController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ClubTranslationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTranslationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FaqsTranslationController;
use App\Http\Controllers\FaqTranslationController;
use App\Http\Controllers\FederationController;
use App\Http\Controllers\FederationTranslationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OfficeTranslationController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnerTranslationController;
use App\Http\Controllers\PaymenController;
use App\Http\Controllers\PaymenTranslationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanTranslationController;
use App\Http\Controllers\StoreCategoryController;
use App\Http\Controllers\StoreCategoryTranslationController;
use App\Models\StoreCategoryTranslation;
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


        /*
        |--------------------------------------------------------------------------
        | Federations Routes
        |--------------------------------------------------------------------------
        */
        Route::get('federations', [FederationController::class, 'index'])->name('federations.index');
        Route::get('federations/create', [FederationController::class, 'create'])->name('federations.create');
        Route::post('federations', [FederationController::class, 'store'])->name('federations.store');
        Route::delete('federations/{federation}', [FederationController::class, 'destroy'])->name('federations.destroy');

        Route::get('federations/translation/{language}', [FederationTranslationController::class, 'showByLanguage'])->name('federation-translations.showByLanguage');
        Route::get('federations/{federation}/translation/create', [FederationTranslationController::class, 'create'])->name('federation-translations.create');
        Route::post('federations/{federation}/translation', [FederationTranslationController::class, 'store'])->name('federation-translations.store');
        Route::get('federations/translations/{federationTranslation}/edit', [FederationTranslationController::class, 'edit'])->name('federation-translations.edit');
        Route::put('federations/translations/{federationTranslation}', [FederationTranslationController::class, 'update'])->name('federation-translations.update');
        Route::delete('federations/translations/{federationTranslation}', [FederationTranslationController::class, 'destroy'])->name('federation-translations.destroy');




        /*
        |--------------------------------------------------------------------------
        | Partners Routes
        |--------------------------------------------------------------------------
        */
        Route::get('partners', [PartnerController::class, 'index'])->name('partners.index');
        Route::get('partners/create', [PartnerController::class, 'create'])->name('partners.create');
        Route::post('partners', [PartnerController::class, 'store'])->name('partners.store');
        Route::delete('partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');

        Route::get('partners/translation/{language}', [PartnerTranslationController::class, 'showByLanguage'])->name('partner-translations.showByLanguage');
        Route::get('partners/{partner}/translation/create', [PartnerTranslationController::class, 'create'])->name('partner-translations.create');
        Route::post('partners/{partner}/translation', [PartnerTranslationController::class, 'store'])->name('partner-translations.store');
        Route::get('partners/translations/{partnerTranslation}/edit', [PartnerTranslationController::class, 'edit'])->name('partner-translations.edit');
        Route::put('partners/translations/{partnerTranslation}', [PartnerTranslationController::class, 'update'])->name('partner-translations.update');
        Route::delete('partners/translations/{partnerTranslation}', [PartnerTranslationController::class, 'destroy'])->name('partner-translations.destroy');

        /*
        |--------------------------------------------------------------------------
        | Clubs Routes
        |--------------------------------------------------------------------------
        */
        Route::get('clubs', [ClubController::class, 'index'])->name('clubs.index');
        Route::get('clubs/create', [ClubController::class, 'create'])->name('clubs.create');
        Route::post('clubs', [ClubController::class, 'store'])->name('clubs.store');
        Route::delete('clubs/{club}', [ClubController::class, 'destroy'])->name('clubs.destroy');

        Route::get('clubs/translation/{language}', [ClubTranslationController::class, 'showByLanguage'])->name('club-translations.showByLanguage');
        Route::get('clubs/{club}/translation/create', [ClubTranslationController::class, 'create'])->name('club-translations.create');
        Route::post('clubs/{club}/translation', [ClubTranslationController::class, 'store'])->name('club-translations.store');
        Route::get('clubs/translations/{clubTranslation}/edit', [ClubTranslationController::class, 'edit'])->name('club-translations.edit');
        Route::put('clubs/translations/{clubTranslation}', [ClubTranslationController::class, 'update'])->name('club-translations.update');
        Route::delete('clubs/translations/{clubTranslation}', [ClubTranslationController::class, 'destroy'])->name('club-translations.destroy');





        /*
        |--------------------------------------------------------------------------
        | Clubs Routes
        |--------------------------------------------------------------------------
        */
        Route::get('storecategories', [StoreCategoryController::class, 'index'])->name('storecategories.index');
        Route::get('storecategories/create', [StoreCategoryController::class, 'create'])->name('storecategories.create');
        Route::post('storecategories', [StoreCategoryController::class, 'store'])->name('storecategories.store');
        Route::delete('storecategories/{storecategorie}', [StoreCategoryController::class, 'destroy'])->name('storecategories.destroy');

        Route::get('storecategories/translation/{language}', [StoreCategoryTranslationController::class, 'showByLanguage'])->name('storecategorie-translations.showByLanguage');
        Route::get('storecategories/{storecategorie}/translation/create', [StoreCategoryTranslationController::class, 'create'])->name('storecategorie-translations.create');
        Route::post('storecategories/{storecategorie}/translation', [StoreCategoryTranslationController::class, 'store'])->name('storecategorie-translations.store');
        Route::get('storecategories/translations/{storecategorieTranslation}/edit', [StoreCategoryTranslationController::class, 'edit'])->name('storecategorie-translations.edit');
        Route::put('storecategories/translations/{storecategorieTranslation}', [StoreCategoryTranslationController::class, 'update'])->name('storecategorie-translations.update');
        Route::delete('storecategories/translations/{storecategorieTranslation}', [StoreCategoryTranslation::class, 'destroy'])->name('storecategorie-translations.destroy');







        /*
        |--------------------------------------------------------------------------
        | Faqs Routes
        |--------------------------------------------------------------------------
        */
        Route::get('faqs', [FaqController::class, 'index'])->name('faqs.index');
        Route::get('faqs/create', [FaqController::class, 'create'])->name('faqs.create');
        Route::post('faqs', [FaqController::class, 'store'])->name('faqs.store');
        Route::delete('faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');

        Route::get('faqs/translation/{language}', [FaqTranslationController::class, 'showByLanguage'])->name('faq-translations.showByLanguage');
        Route::get('faqs/{faq}/translation/create', [FaqTranslationController::class, 'create'])->name('faq-translations.create');
        Route::post('faqs/{faq}/translation', [FaqTranslationController::class, 'store'])->name('faq-translations.store');
        Route::get('faqs/translations/{faqTranslation}/edit', [FaqTranslationController::class, 'edit'])->name('faq-translations.edit');
        Route::put('faqs/translations/{faqTranslation}', [FaqTranslationController::class, 'update'])->name('faq-translations.update');
        Route::delete('faqs/translations/{faqTranslation}', [FaqTranslationController::class, 'destroy'])->name('faq-translations.destroy');





        /*
        |--------------------------------------------------------------------------
        | Paymens Routes
        |--------------------------------------------------------------------------
        */
        Route::get('paymens', [PaymenController::class, 'index'])->name('paymens.index');
        Route::get('paymens/create', [PaymenController::class, 'create'])->name('paymens.create');
        Route::post('paymens', [PaymenController::class, 'store'])->name('paymens.store');
        Route::delete('paymens/{paymen}', [PaymenController::class, 'destroy'])->name('paymens.destroy');

        Route::get('paymens/translation/{language}', [PaymenTranslationController::class, 'showByLanguage'])->name('paymen-translations.showByLanguage');
        Route::get('paymens/{paymen}/translation/create', [PaymenTranslationController::class, 'create'])->name('paymen-translations.create');
        Route::post('paymens/{paymen}/translation', [PaymenTranslationController::class, 'store'])->name('paymen-translations.store');
        Route::get('paymens/translations/{paymenTranslation}/edit', [PaymenTranslationController::class, 'edit'])->name('paymen-translations.edit');
        Route::put('paymens/translations/{paymenTranslation}', [PaymenTranslationController::class, 'update'])->name('paymen-translations.update');
        Route::delete('paymens/translations/{paymenTranslation}', [PaymenTranslationController::class, 'destroy'])->name('paymen-translations.destroy');



        /*
        |--------------------------------------------------------------------------
        | Offices Routes
        |--------------------------------------------------------------------------
        */
        Route::get('offices', [OfficeController::class, 'index'])->name('offices.index');
        Route::get('offices/create', [OfficeController::class, 'create'])->name('offices.create');
        Route::post('offices', [OfficeController::class, 'store'])->name('offices.store');
        Route::delete('offices/{office}', [OfficeController::class, 'destroy'])->name('offices.destroy');

        Route::get('offices/translation/{language}', [OfficeTranslationController::class, 'showByLanguage'])->name('office-translations.showByLanguage');
        Route::get('offices/{office}/translation/create', [OfficeTranslationController::class, 'create'])->name('office-translations.create');
        Route::post('offices/{office}/translation', [OfficeTranslationController::class, 'store'])->name('office-translations.store');
        Route::get('offices/translations/{OfficeTranslation}/edit', [OfficeTranslationController::class, 'edit'])->name('office-translations.edit');
        Route::put('offices/translations/{OfficeTranslation}', [OfficeTranslationController::class, 'update'])->name('office-translations.update');
        Route::delete('offices/translations/{OfficeTranslation}', [OfficeTranslationController::class, 'destroy'])->name('office-translations.destroy');
    });
});
