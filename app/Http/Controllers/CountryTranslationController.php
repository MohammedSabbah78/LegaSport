<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Country;
use App\Models\CountryTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryTranslationController extends Controller
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
    public function create(Country $country)
    {
        $languages = Language::whereDoesntHave('countryTranslations', function ($query) use ($country) {
            $query->where('country_id', '=', $country->id);
        })->get();
        return response()->view('cms.countries.create', ['languages' => $languages, 'country' => $country]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Country $country)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $countryTranslation = new CountryTranslation();
            $countryTranslation->name = $request->input('name');
            $countryTranslation->language_id = $request->input('language');
            $countryTranslation->country_id = $country->id;
            $isSaved = $countryTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryTranslation  $countryTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(CountryTranslation $countryTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CountryTranslation  $countryTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(CountryTranslation $countryTranslation)
    {
        $languages = Language::all();
        return response()->view('cms.countries.edit', ['country' => $countryTranslation, 'languages' => $languages]);
   
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
     * @param  \App\Models\CountryTranslation  $countryTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountryTranslation $countryTranslation)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $countryTranslation->name = $request->input('name');
            $countryTranslation->language_id = $request->input('language');
            $isSaved = $countryTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryTranslation  $countryTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryTranslation $countryTranslation)
    {
        $count = CountryTranslation::where('country_id', $countryTranslation->country_id)->count();
        if ($count != 1) {
            $deleted = $countryTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
