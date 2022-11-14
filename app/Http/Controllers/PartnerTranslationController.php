<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Partner;
use App\Models\PartnerTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerTranslationController extends Controller
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
    public function create(Partner $partner)
    {
        //
        $languages = Language::whereDoesntHave('partnerTranslations', function ($query) use ($partner) {
            $query->where('partner_id', '=', $partner->id);
        })->get();
        $Countrys = Country::where('active', '=', true)->get();
        $citys = City::where('active', '=', true)->get();
        return response()->view('cms.partner.create-lang', [
            'languages' => $languages,
            'partner' => $partner,
            'languages' => $languages,
            'Countrys' => $Countrys,
            'citys' => $citys,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Partner $partner)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:country_translations,id',
            'representative' => 'required|string|min:3|max:30',
            'name' => 'required|string|min:3|max:30',
        ]);
        if (!$validator->fails()) {
            $translation = new PartnerTranslation();
            $translation->name = $request->input('name');
            $translation->representative = $request->input('representative');
            $translation->country_id = $request->input('country');
            $translation->city_id = $request->input('city');
            $translation->language_id = $request->input('language');
            $translation->partner_id = $partner->id;
            $isSaved = $translation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartnerTranslation  $partnerTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerTranslation $partnerTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartnerTranslation  $partnerTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerTranslation $partnerTranslation)
    {
        //
        $languages = Language::all();
        $Countrys = Country::where('active', '=', true)->get();
        $citys = City::where('active', '=', true)->get();
        return response()->view('cms.Partner.edit', [
            'partnerTranslation' => $partnerTranslation,
            'languages' => $languages,
            'Countrys' => $Countrys,
            'citys' => $citys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartnerTranslation  $partnerTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerTranslation $partnerTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:country_translations,id',
            'representative' => 'required|string|min:3|max:30',
            'name' => 'required|string|min:3|max:30',
        ]);
        if (!$validator->fails()) {
            $partnerTranslation->name = $request->input('name');
            $partnerTranslation->city_id = $request->input('city');
            $partnerTranslation->country_id = $request->input('country');
            $partnerTranslation->representative = $request->input('representative');
            $partnerTranslation->language_id = $request->input('language');
            $isSaved = $partnerTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartnerTranslation  $partnerTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerTranslation $partnerTranslation)
    {
        //
        $count = PartnerTranslation::where('Partner_id', $partnerTranslation->federation_id)->count();
        if ($count != 1) {
            $deleted = $partnerTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
