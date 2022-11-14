<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Country;
use App\Models\Language;
use App\Models\Nationality;
use App\Models\NationalityTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NationalityTranslationController extends Controller
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
    public function create(Nationality $nationality)
    {
        $languages = Language::whereDoesntHave('nationalityTranslations', function ($query) use ($nationality) {
            $query->where('nationality_id', '=', $nationality->id);
        })->get();
        $countrys = Country::where('active', '=', true)->get();
        return response()->view('cms.nationalities.create', ['languages' => $languages, 'countrys' => $countrys, 'nationality' => $nationality]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Nationality $nationality)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
            'country' => 'required|numeric|exists:countries,id',
        ]);

        if (!$validator->fails()) {
            $nationalityTranslation = new NationalityTranslation();
            $nationalityTranslation->name = $request->input('name');
            $nationalityTranslation->country_id = $request->input('country');
            $nationalityTranslation->language_id = $request->input('language');
            $nationalityTranslation->nationality_id = $nationality->id;
            $isSaved = $nationalityTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalityTranslation  $nationalityTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(NationalityTranslation $nationalityTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NationalityTranslation  $nationalityTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalityTranslation $nationalityTranslation)
    {
        $languages = Language::all();
        $countrys = Country::where('active', '=', true)->get();
        return response()->view('cms.nationalities.edit', ['nationality' => $nationalityTranslation, 'countrys' => $countrys, 'languages' => $languages]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function showByLanguage(Language $language)
    {
        //
        if (auth('admin')->check()) {
            $nationalities = NationalityTranslation::where('language_id', '=', $language->id)->get();
            return response()->json(['nationalities' => $nationalities]);
        } else {
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalityTranslation  $nationalityTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NationalityTranslation $nationalityTranslation)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
            'country' => 'required|numeric|exists:countries,id',
        ]);

        if (!$validator->fails()) {
            $nationalityTranslation->country_id = $request->input('country');
            $nationalityTranslation->name = $request->input('name');
            $nationalityTranslation->language_id = $request->input('language');
            $isSaved = $nationalityTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalityTranslation  $nationalityTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(NationalityTranslation $nationalityTranslation)
    {
        $count = NationalityTranslation::where('nationality_id', $nationalityTranslation->nationality_id)->count();
        if ($count != 1) {
            $deleted = $nationalityTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
