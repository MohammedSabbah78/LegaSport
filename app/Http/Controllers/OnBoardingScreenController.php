<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\OnBoardingScreen;
use App\Models\OnBoardingScreenTranslation;
use Illuminate\Http\Request;

class OnBoardingScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('admin')->check()) {
            $data = OnBoardingScreen::with('translations')->withCount(['translations', 'ads'])->get();
            return response()->view('cms.onBoarding.index', ['data' => $data]);
        } else {
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return response()->view('cms.onBoarding.create', ['languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'country_id' => 'required|numeric|exists:countries,id',
            'ordering' => 'required|numeric|min:1|unique:on_boarding_screens,ordering_screen',
            'title' => 'required|string|min:3|max:30',
            'body' => 'required|string|min:3|max:255',
            'image' => 'required|image|mimes:jpg,png',
            'active' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $onBoardingScreen = new OnBoardingScreen();
            $onBoardingScreen->active = $request->input('active');
            $onBoardingScreen->ordering_screen = $request->input('ordering');
            $onBoardingScreen->country_id = $request->input('country_id');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $onBoardingScreen->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('onBoardingScreens', $imageName, ['disk' => 'public']);
                $onBoardingScreen->image = 'onBoardingScreens/' . $imageName;
            }
            $isSaved = $onBoardingScreen->save();
            // $isSaved ? $onBoardingScreen->translations()->create([
            //     'title' => $request->input('title'),
            //     'body' => $request->input('body'),
            //     'language_id' => $request->input('language'),
            // ]) : $onBoardingScreen->delete();


            if ($isSaved) {
                $translation = new OnBoardingScreenTranslation();
                $translation->title = $request->input('title');
                $translation->body = $request->input('body');
                $translation->language_id = $request->input('language');
                $translation->on_boarding_screen_id = $onBoardingScreen->id;
                $translation->save();
            } else {
                $onBoardingScreen->delete();
            }

            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnBoardingScreen  $onBoardingScreen
     * @return \Illuminate\Http\Response
     */
    public function show(OnBoardingScreen $onBoardingScreen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnBoardingScreen  $onBoardingScreen
     * @return \Illuminate\Http\Response
     */
    public function edit(OnBoardingScreen $onBoardingScreen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnBoardingScreen  $onBoardingScreen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnBoardingScreen $onBoardingScreen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnBoardingScreen  $onBoardingScreen
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnBoardingScreen $onBoardingScreen)
    {
        $deleted = $onBoardingScreen->delete();
        if ($deleted) {
            $translations = OnBoardingScreenTranslation::where('on_boarding_screen_id', $onBoardingScreen->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
