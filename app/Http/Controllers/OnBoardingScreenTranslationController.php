<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\CountryTranslation;
use App\Models\Language;
use App\Models\OnBoardingScreen;
use App\Models\OnBoardingScreenTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnBoardingScreenTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OnBoardingScreen $onBoardingScreen)
    {
        $languages = Language::whereDoesntHave('onBoardingScreenTranslations', function ($query) use ($onBoardingScreen) {
            $query->where('on_boarding_screen_id', '=', $onBoardingScreen->id);
        })->get();
        return response()->view('cms.onBoarding.create', ['languages' => $languages, 'screen' => $onBoardingScreen]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OnBoardingScreen $onBoardingScreen)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'body' => 'required|string|min:3|max:255',

        ]);

        if (!$validator->fails()) {
            $onBoardingTraslation = new OnBoardingScreenTranslation();
            $onBoardingTraslation->title = $request->input('title');
            $onBoardingTraslation->body = $request->input('body');
            $onBoardingTraslation->language_id = $request->input('language');
            $onBoardingTraslation->on_boarding_screen_id = $onBoardingScreen->id;
            $isSaved = $onBoardingTraslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnBoardingScreenTranslation  $onBoardingScreenTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(OnBoardingScreenTranslation $onBoardingScreenTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnBoardingScreenTranslation  $onBoardingScreenTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(OnBoardingScreenTranslation $onBoardingScreenTranslation)
    {
        $languages = Language::all();
        return response()->view('cms.onBoarding.edit', ['screen' => $onBoardingScreenTranslation, 'languages' => $languages]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function showByLanguage(Language $language)
    {
        //
        if (auth('admin')->check()) {
            $countries = CountryTranslation::where('language_id', '=', $language->id)->get();
            return response()->json(['countries' => $countries]);
        } else {
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnBoardingScreenTranslation  $onBoardingScreenTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnBoardingScreenTranslation $onBoardingScreenTranslation)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'body' => 'required|string|min:3|max:255',

        ]);

        if (!$validator->fails()) {
            $onBoardingScreenTranslation->title = $request->input('title');
            $onBoardingScreenTranslation->body = $request->input('body');

            $onBoardingScreenTranslation->language_id = $request->input('language');
            $isSaved = $onBoardingScreenTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnBoardingScreenTranslation  $onBoardingScreenTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnBoardingScreenTranslation $onBoardingScreenTranslation)
    {
        $count = OnBoardingScreenTranslation::where('on_boarding_screen_id', $onBoardingScreenTranslation->on_boarding_screen_id)->count();
        if ($count != 1) {
            $deleted = $onBoardingScreenTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
