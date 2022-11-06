<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Country;
use App\Models\CountryTranslation;
use App\Models\Language;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('admin')->check()) {
            $data = Country::with('translations')->withCount(['translations', 'cities'])->get();
            return response()->view('cms.countries.index', ['data' => $data]);
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
        return response()->view('cms.countries.create', ['languages' => $languages]);
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
            'name' => 'required|string|min:3|max:30',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'active' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,png',

        ]);

        if (!$validator->fails()) {
            $country = new Country();
            $country->active = $request->input('active');
            $country->latitude = $request->input('latitude');
            $country->longitude = $request->input('longitude');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $country->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('countries', $imageName, ['disk' => 'public']);
                $country->image = 'countries/' . $imageName;
            }
            $isSaved = $country->save();
            $isSaved ? $country->translations()->create([
                'name' => $request->input('name'),
                'language_id' => $request->input('language'),
            ]) : $country->delete();
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
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $deleted = $country->delete();
        if ($deleted) {
            $translations = CountryTranslation::where('country_id', $country->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
