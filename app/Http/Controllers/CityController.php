<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\CityTranslation;
use App\Models\Language;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('admin')->check()) {
            $data = City::with(['translations', 'country'])->withCount(['translations'])->get();
            return response()->view('cms.cities.index', ['data' => $data]);
        } else {
            //
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::all();
        return response()->view('cms.cities.create', ['languages' => $languages]);
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
            'country' => 'required|numeric|exists:countries,id',
            'name' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $city = new City();
            $city->active = $request->input('active');
            $city->country_id = $request->input('country');
            $isSaved = $city->save();
            $isSaved ? $city->translations()->create([
                'name' => $request->input('name'),
                'language_id' => $request->input('language'),
            ]) : $city->delete();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $deleted = $city->delete();

        if ($deleted) {
            $translations = CityTranslation::where('city_id', $city->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }

        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
