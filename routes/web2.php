<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutTranslationController;
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
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferTranslationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OfficeTranslationController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnerTranslationController;
use App\Http\Controllers\PaymenController;
use App\Http\Controllers\PaymenTranslationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanTranslationController;
use App\Http\Controllers\PolicieController;
use App\Http\Controllers\PolicieTranslationController;
use App\Http\Controllers\SponserController;
use App\Http\Controllers\SponserTranslationController;
use App\Http\Controllers\StoreCategoryController;
use App\Http\Controllers\StorecategoryController as ControllersStorecategoryController;
use App\Http\Controllers\StoreCategoryTranslationController;
use App\Http\Controllers\StorecategoryTranslationController as ControllersStorecategoryTranslationController;
use App\Http\Controllers\TaskesForPointController;
use App\Http\Controllers\TaskesForPointTranslationController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TermTranslationController;
use App\Http\Controllers\VotequestionController;
use App\Http\Controllers\VotequestionTranslationController;
use App\Models\About;
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



        /*
        |--------------------------------------------------------------------------
        | Offers Routes
        |--------------------------------------------------------------------------
        */
        Route::get('offers', [OfferController::class, 'index'])->name('offers.index');
        Route::get('offers/create', [OfferController::class, 'create'])->name('offers.create');
        Route::post('offers', [OfferController::class, 'store'])->name('offers.store');
        Route::delete('offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');

        Route::get('offers/translation/{language}', [OfferTranslationController::class, 'showByLanguage'])->name('offer-translations.showByLanguage');
        Route::get('offers/{offer}/translation/create', [OfferTranslationController::class, 'create'])->name('offer-translations.create');
        Route::post('offers/{offer}/translation', [OfferTranslationController::class, 'store'])->name('offer-translations.store');
        Route::get('offers/translations/{offerTranslation}/edit', [OfferTranslationController::class, 'edit'])->name('offer-translations.edit');
        Route::put('offers/translations/{offerTranslation}', [OfferTranslationController::class, 'update'])->name('offer-translations.update');
        Route::delete('offers/translations/{offerTranslation}', [OfferTranslationController::class, 'destroy'])->name('offer-translations.destroy');




        /*
        |--------------------------------------------------------------------------
        | Votequestions Routes
        |--------------------------------------------------------------------------
        */
        Route::get('votequestions', [VotequestionController::class, 'index'])->name('votequestions.index');
        Route::get('votequestions/create', [VotequestionController::class, 'create'])->name('votequestions.create');
        Route::post('votequestions', [VotequestionController::class, 'store'])->name('votequestions.store');
        Route::delete('votequestions/{votequestion}', [VotequestionController::class, 'destroy'])->name('votequestions.destroy');

        Route::get('votequestions/translation/{language}', [VotequestionTranslationController::class, 'showByLanguage'])->name('votequestion-translations.showByLanguage');
        Route::get('votequestions/{votequestion}/translation/create', [VotequestionTranslationController::class, 'create'])->name('votequestion-translations.create');
        Route::post('votequestions/{votequestion}/translation', [VotequestionTranslationController::class, 'store'])->name('votequestion-translations.store');
        Route::get('votequestions/translations/{votequestionTranslation}/edit', [VotequestionTranslationController::class, 'edit'])->name('votequestion-translations.edit');
        Route::put('votequestions/translations/{votequestionTranslation}', [VotequestionTranslationController::class, 'update'])->name('votequestion-translations.update');
        Route::delete('votequestions/translations/{votequestionTranslation}', [VotequestionTranslationController::class, 'destroy'])->name('votequestion-translations.destroy');





        /*
        |--------------------------------------------------------------------------
        | Terms Routes
        |--------------------------------------------------------------------------
        */
        Route::get('terms', [TermController::class, 'index'])->name('terms.index');
        Route::get('terms/create', [TermController::class, 'create'])->name('terms.create');
        Route::post('terms', [TermController::class, 'store'])->name('terms.store');
        Route::delete('terms/{term}', [TermController::class, 'destroy'])->name('terms.destroy');

        Route::get('terms/translation/{language}', [TermTranslationController::class, 'showByLanguage'])->name('term-translations.showByLanguage');
        Route::get('terms/{term}/translation/create', [TermTranslationController::class, 'create'])->name('term-translations.create');
        Route::post('terms/{term}/translation', [TermTranslationController::class, 'store'])->name('term-translations.store');
        Route::get('terms/translations/{termTranslation}/edit', [TermTranslationController::class, 'edit'])->name('term-translations.edit');
        Route::put('terms/translations/{termTranslation}', [TermTranslationController::class, 'update'])->name('term-translations.update');
        Route::delete('terms/translations/{termTranslation}', [TermTranslationController::class, 'destroy'])->name('term-translations.destroy');


        /*
        |--------------------------------------------------------------------------
        | Policies Routes
        |--------------------------------------------------------------------------
        */
        Route::get('policies', [PolicieController::class, 'index'])->name('policies.index');
        Route::get('policies/create', [PolicieController::class, 'create'])->name('policies.create');
        Route::post('policies', [PolicieController::class, 'store'])->name('policies.store');
        Route::delete('policies/{policie}', [PolicieController::class, 'destroy'])->name('policies.destroy');

        Route::get('policies/translation/{language}', [PolicieTranslationController::class, 'showByLanguage'])->name('policie-translations.showByLanguage');
        Route::get('policies/{policie}/translation/create', [PolicieTranslationController::class, 'create'])->name('policie-translations.create');
        Route::post('policies/{policie}/translation', [PolicieTranslationController::class, 'store'])->name('policie-translations.store');
        Route::get('policies/translations/{policieTranslation}/edit', [PolicieTranslationController::class, 'edit'])->name('policie-translations.edit');
        Route::put('policies/translations/{policieTranslation}', [PolicieTranslationController::class, 'update'])->name('policie-translations.update');
        Route::delete('policies/translations/{policieTranslation}', [PolicieTranslationController::class, 'destroy'])->name('policie-translations.destroy');
        /*
        |--------------------------------------------------------------------------
        | About-Us Routes
        |--------------------------------------------------------------------------
        */
        Route::get('abouts', [AboutController::class, 'index'])->name('abouts.index');
        Route::get('abouts/create', [AboutController::class, 'create'])->name('abouts.create');
        Route::post('abouts', [AboutController::class, 'store'])->name('abouts.store');
        Route::delete('abouts/{about}', [AboutController::class, 'destroy'])->name('abouts.destroy');

        Route::get('abouts/translation/{language}', [AboutTranslationController::class, 'showByLanguage'])->name('about-translations.showByLanguage');
        Route::get('abouts/{about}/translation/create', [AboutTranslationController::class, 'create'])->name('about-translations.create');
        Route::post('abouts/{about}/translation', [AboutTranslationController::class, 'store'])->name('about-translations.store');
        Route::get('abouts/translations/{aboutTranslation}/edit', [AboutTranslationController::class, 'edit'])->name('about-translations.edit');
        Route::put('abouts/translations/{aboutTranslation}', [AboutTranslationController::class, 'update'])->name('about-translations.update');
        Route::delete('abouts/translations/{aboutTranslation}', [AboutTranslationController::class, 'destroy'])->name('about-translations.destroy');


        /*
        |--------------------------------------------------------------------------
        | About-Us Routes
        |--------------------------------------------------------------------------
        */
        Route::get('sponsers', [SponserController::class, 'index'])->name('sponsers.index');
        Route::get('sponsers/create', [SponserController::class, 'create'])->name('sponsers.create');
        Route::post('sponsers', [SponserController::class, 'store'])->name('sponsers.store');
        Route::delete('sponsers/{sponser}', [SponserController::class, 'destroy'])->name('sponsers.destroy');

        Route::get('sponsers/translation/{language}', [SponserTranslationController::class, 'showByLanguage'])->name('sponser-translations.showByLanguage');
        Route::get('sponsers/{sponser}/translation/create', [SponserTranslationController::class, 'create'])->name('sponser-translations.create');
        Route::post('sponsers/{sponser}/translation', [SponserTranslationController::class, 'store'])->name('sponser-translations.store');
        Route::get('sponsers/translations/{sponserTranslation}/edit', [SponserTranslationController::class, 'edit'])->name('sponser-translations.edit');
        Route::put('sponsers/translations/{sponserTranslation}', [SponserTranslationController::class, 'update'])->name('sponser-translations.update');
        Route::delete('sponsers/translations/{sponserTranslation}', [SponserTranslationController::class, 'destroy'])->name('sponser-translations.destroy');





        /*
        |--------------------------------------------------------------------------
        | Taskes-For-Point Routes
        |--------------------------------------------------------------------------
        */
        // Route::get('taskes-for-points', [TaskesForPointController::class, 'index'])->name('taskes-for-points.index');
        // Route::get('taskes-for-points/create', [TaskesForPointController::class, 'create'])->name('taskes-for-points.create');
        // Route::post('taskes-for-points', [TaskesForPointController::class, 'store'])->name('taskes-for-points.store');
        // Route::delete('taskes-for-points/{taskesforpoint}', [TaskesForPointController::class, 'destroy'])->name('taskes-for-points.destroy');

        // Route::get('taskes-for-points/translation/{language}', [TaskesForPointTranslationController::class, 'showByLanguage'])->name('taskes-for-point-translations.showByLanguage');
        // Route::get('taskes-for-points/{taskesforpoint}/translation/create', [TaskesForPointTranslationController::class, 'create'])->name('taskes-for-point-translations.create');
        // Route::post('taskes-for-points/{taskesforpoint}/translation', [TaskesForPointTranslationController::class, 'store'])->name('taskes-for-point-translations.store');
        // Route::get('taskes-for-points/translations/{taskesforpointTranslation}/edit', [TaskesForPointTranslationController::class, 'edit'])->name('taskes-for-point-translations.edit');
        // Route::put('taskes-for-points/translations/{taskesforpointTranslation}', [TaskesForPointTranslationController::class, 'update'])->name('taskes-for-point-translations.update');
        // Route::delete('taskes-for-points/translations/{taskesforpointTranslation}', [TaskesForPointTranslationController::class, 'destroy'])->name('taskes-for-point-translations.destroy');


    });
});
