<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\CityTranslation;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityTranslationController extends Controller
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
    public function create(City $city)
    {
        $languages = Language::whereDoesntHave('cityTranslations', function ($query) use ($city) {
            $query->where('city_id', '=', $city->id);
        })->get();
        return response()->view('cms.cities.create', ['languages' => $languages, 'city' => $city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $cityTranslation = new CityTranslation();
            $cityTranslation->name = $request->input('name');
            $cityTranslation->language_id = $request->input('language');
            $cityTranslation->city_id = $city->id;
            $isSaved = $cityTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function showByCountry(Language $language, Country $country)
    {
        //
        if (auth('admin')->check()) {
            $cities = CityTranslation::whereHas('city', function ($query) use ($country) {
                $query->where('country_id', '=', $country->id);
            })->where('language_id', '=', $language->id)
                ->get();
            return response()->json(['cities' => $cities]);
        } else {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CityTranslation  $cityTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(CityTranslation $cityTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CityTranslation  $cityTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(CityTranslation $cityTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.cities.edit', ['city' => $cityTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CityTranslation  $cityTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityTranslation $cityTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $cityTranslation->name = $request->input('name');
            $cityTranslation->language_id = $request->input('language');
            $isSaved = $cityTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CityTranslation  $cityTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityTranslation $cityTranslation)
    {

        $count = CityTranslation::where('city_id', $cityTranslation->city_id)->count();
        if ($count != 1) {
            $deleted = $cityTranslation->delete();

            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;

        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
