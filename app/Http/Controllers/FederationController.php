<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Country;
use App\Models\Federation;
use App\Models\FederationTranslation;
use App\Models\Language;
use App\Models\Sport;
use Illuminate\Http\Request;

class FederationController extends Controller
{

    public function __construct()
    {

        $this->authorizeResource(Federation::class, 'federation');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (auth('admin')->check()) {
            $data = Federation::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.federation.index', ['data' => $data]);
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
        //
        $languages = Language::all();
        $Countrys = Country::where('active', '=', true)->get();
        $citys = City::where('active', '=', true)->get();
        $sports = Sport::where('active', '=', true)->get();

        return response()->view('cms.federation.create', [
            'languages' => $languages,
            'Countrys' => $Countrys,
            'citys' => $citys,
            'sports' => $sports,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:country_translations,id',
            'sport' => 'required|numeric|exists:sports,id',
            'name' => 'required|string|min:3|max:30',
            'website' => 'required|url|min:3',
            'mobile' => 'required|numeric',
            'twitter' => 'required|url|min:3',


        ]);
        if (!$validator->fails()) {
            $federation = new Federation();
            $federation->website = $request->input('website');
            $federation->mobile = $request->input('mobile');
            $federation->twitter = $request->input('twitter');
            $isSaved = $federation->save();
            if ($isSaved) {
                $translation = new FederationTranslation();
                $translation->name = $request->input('name');
                $translation->sport_id = $request->input('sport');
                $translation->country_id = $request->input('country');
                $translation->city_id = $request->input('city');
                $translation->language_id = $request->input('language');
                $translation->federation_id = $federation->id;
                $translation->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function show(Federation $federation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Federation $federation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:country_translations,id',
            'sport' => 'required|numeric|exists:sports,id',
            'name' => 'required|string|min:3|max:30',
            'website' => 'required|string|min:3|max:30',
            'mobile' => 'required|numeric',
            'twitter' => 'required|string|min:3|max:30',


        ]);
        if (!$validator->fails()) {
            $federation->website = $request->input('website');
            $federation->mobile = $request->input('mobile');
            $federation->twitter = $request->input('twitter');
            $isSaved = $federation->save();
            if ($isSaved) {
                $translation = new FederationTranslation();
                $translation->name = $request->input('name');
                $translation->sport_id = $request->input('sport');
                $translation->country_id = $request->input('country');
                $translation->city_id = $request->input('city');
                $translation->language_id = $request->input('language');
                $translation->federation_id = $federation->id;
                $translation->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Federation $federation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Federation $federation)
    {
        //
        $deleted = $federation->delete();
        if ($deleted) {
            $translations = FederationTranslation::where('federation_id', $federation->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
