<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Country;
use App\Models\Language;
use App\Models\Nationality;
use App\Models\NationalityTranslation;
use Illuminate\Http\Request;

class NationalityController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Nationality::class, 'nationality');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('admin')->check()) {
            $data = Nationality::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.nationalities.index', ['data' => $data]);
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
        $countrys = Country::where('active', '=', true)->get();
        return response()->view('cms.nationalities.create', ['languages' => $languages, 'countrys' => $countrys]);
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
            $nationality = new Nationality();
            $nationality->active = $request->input('active');
            $isSaved = $nationality->save();
            if ($isSaved) {
                $translation = new NationalityTranslation();
                $translation->name = $request->input('name');
                $translation->country_id = $request->input('country');
                $translation->language_id = $request->input('language');
                $translation->nationality_id = $nationality->id;
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
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(Nationality $nationality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(Nationality $nationality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nationality $nationality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nationality $nationality)
    {
        $deleted = $nationality->delete();
        if ($deleted) {
            $translations = NationalityTranslation::where('nationality_id', $nationality->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
