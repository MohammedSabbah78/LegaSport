<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Partner;
use App\Models\PartnerTranslation;
use Illuminate\Http\Request;

class PartnerController extends Controller
{


    public function __construct()
    {

        $this->authorizeResource(Partner::class, 'partner');
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
            $data = Partner::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.partner.index', ['data' => $data]);
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

        return response()->view('cms.partner.create', [
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
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:country_translations,id',
            'name' => 'required|string|min:3|max:30',
            'representative' => 'required|string|min:3|max:30',
            'logo' => 'nullable', 'logo|mimes:jpg,png',
            'webiste' => 'required|string|min:3',
            'num_branch' => 'required|numeric',
            'representative_mobile' => 'required|numeric',
            'compony_record' => 'required|string|min:3|max:30',
            'incorporation_date' => 'required|string',


        ]);
        if (!$validator->fails()) {
            $partner = new Partner();
            $partner->webiste = $request->input('webiste');
            $partner->num_branch = $request->input('num_branch');
            $partner->representative_mobile = $request->input('representative_mobile');
            $partner->compony_record = $request->input('compony_record');
            $partner->incorporation_date = $request->input('incorporation_date');
            if ($request->hasFile('logo')) {
                $logoName = time() . '_' . str_replace(' ', '', $partner->name) . '.' . $request->file('logo')->extension();
                $request->file('logo')->storePubliclyAs('partner', $logoName, ['disk' => 'public']);
                $partner->logo = 'partner/' . $logoName;
            }
            $isSaved = $partner->save();
            if ($isSaved) {
                $translation = new PartnerTranslation();
                $translation->name = $request->input('name');
                $translation->representative = $request->input('representative');
                $translation->country_id = $request->input('country');
                $translation->city_id = $request->input('city');
                $translation->language_id = $request->input('language');
                $translation->partner_id = $partner->id;
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
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:country_translations,id',
            'name' => 'required|string|min:3|max:30',
            'representative' => 'required|string|min:3|max:30',
            'logo' => 'nullable', 'logo|mimes:jpg,png',
            'webiste' => 'required|string|min:3',
            'num_branch' => 'required|numeric',
            'representative_mobile' => 'required|numeric',
            'compony_record' => 'required|string|min:3|max:30',
            'incorporation_date' => 'required|string',


        ]);
        if (!$validator->fails()) {
            $partner->webiste = $request->input('webiste');
            $partner->num_branch = $request->input('num_branch');
            $partner->representative_mobile = $request->input('representative_mobile');
            $partner->compony_record = $request->input('compony_record');
            $partner->incorporation_date = $request->input('incorporation_date');
            if ($request->hasFile('logo')) {
                $logoName = time() . '_' . str_replace(' ', '', $partner->name) . '.' . $request->file('logo')->extension();
                $request->file('logo')->storePubliclyAs('partner', $logoName, ['disk' => 'public']);
                $partner->logo = 'partner/' . $logoName;
            }
            $isSaved = $partner->save();
            if ($isSaved) {
                $translation = new PartnerTranslation();
                $translation->name = $request->input('name');
                $translation->representative = $request->input('representative');
                $translation->country_id = $request->input('country');
                $translation->city_id = $request->input('city');
                $translation->language_id = $request->input('language');
                $translation->partner_id = $partner->id;
                $translation->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
        $deleted = $partner->delete();
        if ($deleted) {
            $translations = PartnerTranslation::where('partner_id', $partner->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
