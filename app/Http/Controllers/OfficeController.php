<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Country;
use App\Models\Day;
use App\Models\Language;
use App\Models\Office;
use App\Models\OfficeTranslation;
use Illuminate\Http\Request;

class OfficeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Office::class, 'office');
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
            $data = Office::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.office.index', ['data' => $data]);
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
        $citys = City::where('active', '=', true)->get();
        $Countrys = Country::where('active', '=', true)->get();
        $days = Day::all();
        return response()->view('cms.office.create', [
            'languages' => $languages,
            'citys' => $citys,
            'Countrys' => $Countrys,
            'days' => $days,
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
            'country' => 'required|numeric|exists:countries,id',
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email|unique:offices,email',
            'address1' => 'required|string|min:3',
            'address2' => 'required|string|min:3',
            'work_from' => 'required|string|min:3',
            'work_to' => 'required|string|min:3',
            'mobile' => 'required|numeric',
        ]);
        if (!$validator->fails()) {
            $office = new Office();
            $office->work_from = $request->input('work_from');
            $office->work_to = $request->input('work_to');
            $office->email = $request->input('email');
            $office->mobile = $request->input('mobile');
            $office->country_id = $request->input('country');
                $office->city_id = $request->input('city');
            $isSaved = $office->save();
            if ($isSaved) {
                $translation = new OfficeTranslation();
                $translation->name = $request->input('name');
                $translation->address1 = $request->input('address1');
                $translation->address2 = $request->input('address2');
                $translation->language_id = $request->input('language');
                $translation->Office_id = $office->id;
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
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:countries,id',
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email|unique:offices,email',
            'address1' => 'required|string|min:3',
            'address2' => 'required|string|min:3',
            'work_from' => 'required|string|min:3',
            'work_to' => 'required|string|min:3',
            'mobile' => 'required|numeric',
        ]);
        if (!$validator->fails()) {
            $office->work_from = $request->input('work_from');
            $office->work_to = $request->input('work_to');
            $office->email = $request->input('email');
            $office->mobile = $request->input('mobile');
            $office->country_id = $request->input('country');
                $office->city_id = $request->input('city');
            $isSaved = $office->save();
            if ($isSaved) {
                $translation = new OfficeTranslation();
                $translation->name = $request->input('name');
                $translation->address1 = $request->input('address1');
                $translation->address2 = $request->input('address2');
                
                $translation->language_id = $request->input('language');
                $translation->Office_id = $office->id;
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
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
        $deleted = $office->delete();
        if ($deleted) {
            $translations = OfficeTranslation::where('office_id', $office->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
