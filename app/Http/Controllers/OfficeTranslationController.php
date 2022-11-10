<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Office;
use App\Models\OfficeTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfficeTranslationController extends Controller
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
    public function create(Office $office)
    {
        //
        $languages = Language::whereDoesntHave('OfficeTranslations', function ($query) use ($office) {
            $query->where('office_id', '=', $office->id);
        })->get();
        $citys = City::where('active', '=', true)->get();
        $countrys = Country::where('active', '=', true)->get();

        return response()->view('cms.office.create-lang', [
            'languages' => $languages,
            'office' => $office,
            'languages' => $languages,
            'citys' => $citys,
            'countrys' => $countrys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Office $office)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:countries,id',
            'name' => 'required|string|min:3|max:30',
            'address1' => 'required|string|min:3',
            'address2' => 'required|string|min:3',

        ]);
        if (!$validator->fails()) {
            $OfficeTranslation = new OfficeTranslation();
            $OfficeTranslation->name = $request->input('name');
            $OfficeTranslation->address1 = $request->input('address1');
            $OfficeTranslation->address2 = $request->input('address2');
            $OfficeTranslation->country_id = $request->input('country');
            $OfficeTranslation->city_id = $request->input('city');
            $OfficeTranslation->language_id = $request->input('language');
            $OfficeTranslation->office_id = $office->id;
            $isSaved = $OfficeTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeTranslation  $officeTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeTranslation $officeTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeTranslation  $officeTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeTranslation $OfficeTranslation)
    {
        //
        $languages = Language::whereDoesntHave('OfficeTranslations', function ($query) use ($OfficeTranslation) {
            $query->where('office_id', '=', $OfficeTranslation->id);
        })->get();
        $citys = City::where('active', '=', true)->get();
        $countrys = Country::where('active', '=', true)->get();

        return response()->view('cms.office.edit', [
            'languages' => $languages,
            'OfficeTranslation' => $OfficeTranslation,
            'languages' => $languages,
            'citys' => $citys,
            'countrys' => $countrys
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeTranslation  $officeTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeTranslation $OfficeTranslation)
    {
        //

        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:countries,id',
            'name' => 'required|string|min:3|max:30',
            'address1' => 'required|string|min:3',
            'address2' => 'required|string|min:3',

        ]);
        if (!$validator->fails()) {
            $OfficeTranslation->name = $request->input('name');
            $OfficeTranslation->address1 = $request->input('address1');
            $OfficeTranslation->address2 = $request->input('address2');
            $OfficeTranslation->country_id = $request->input('country');
            $OfficeTranslation->city_id = $request->input('city');
            $OfficeTranslation->language_id = $request->input('language');
            $isSaved = $OfficeTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeTranslation  $officeTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeTranslation $OfficeTranslation)
    {
        //
        $count = OfficeTranslation::where('office_id', $OfficeTranslation->office_id)->count();
        if ($count != 1) {
            $deleted = $OfficeTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
