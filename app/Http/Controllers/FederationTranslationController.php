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
use Symfony\Component\HttpFoundation\Response;

class FederationTranslationController extends Controller
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
    public function create(Federation $federation)
    {
        $languages = Language::whereDoesntHave('federationTranslations', function ($query) use ($federation) {
            $query->where('federation_id', '=', $federation->id);
        })->get();
        $Countrys = Country::where('active', '=', true)->get();
        $citys = City::where('active', '=', true)->get();
        $sports = Sport::where('active', '=', true)->get();
        return response()->view('cms.federation.create-lang', [
            'languages' => $languages,
            'federation' => $federation,
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
    public function store(Request $request, Federation $federation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);
        if (!$validator->fails()) {
            

            $translation = new FederationTranslation();
            $translation->name = $request->input('name');
            // $translation->sport_id = $request->input('sport');
            // $translation->country_id = $request->input('country');
            // $translation->city_id = $request->input('city');
            $translation->language_id = $request->input('language');
            $translation->federation_id = $federation->id;
            $isSaved = $translation->save();

            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FederationTranslation  $federationTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(FederationTranslation $federationTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FederationTranslation  $federationTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(FederationTranslation $federationTranslation)
    {
        //
        $languages = Language::all();
        $Countrys = Country::where('active', '=', true)->get();
        $citys = City::where('active', '=', true)->get();
        $sports = Sport::where('active', '=', true)->get();
        return response()->view('cms.federation.edit', [
            'federationTranslation' => $federationTranslation,
            'languages' => $languages,
            'Countrys' => $Countrys,
            'citys' => $citys,
            'sports' => $sports,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FederationTranslation  $federationTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FederationTranslation $federationTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);
        if (!$validator->fails()) {
            $federationTranslation->name = $request->input('name');
            $federationTranslation->language_id = $request->input('language');
            $isSaved = $federationTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederationTranslation  $federationTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FederationTranslation $federationTranslation)
    {
        $count = FederationTranslation::where('federation_id', $federationTranslation->federation_id)->count();
        if ($count != 1) {
            $deleted = $federationTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
