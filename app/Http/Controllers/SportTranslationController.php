<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Sport;
use App\Models\SportTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SportTranslationController extends Controller
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
    public function create(Sport $sport)
    {
        //
        $languages = Language::whereDoesntHave('sportTranslations', function ($query) use ($sport) {
            $query->where('sport_id', '=', $sport->id);
        })->get();
        $citys = City::where('active', '=', true)->get();
        $countrys = Country::where('active', '=', true)->get();
        return response()->view('cms.sport.create', [
            'languages' => $languages,
            'sport' => $sport,
            'citys' => $citys,
            'countrys' => $countrys,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sport $sport)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:countries,id',
        ]);

        if (!$validator->fails()) {
            $sportTranslation = new SportTranslation();
            $sportTranslation->title = $request->input('title');
            $sportTranslation->city_id = $request->input('city');
            $sportTranslation->country_id = $request->input('country');
            $sportTranslation->language_id = $request->input('language');
            $sportTranslation->sport_id = $sport->id;
            $isSaved = $sportTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SportTranslation  $sportTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(SportTranslation $sportTranslation)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SportTranslation  $sportTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(SportTranslation $sportTranslation)
    {
        //
        $languages = Language::all();
        $citys = City::where('active', '=', true)->get();
        $countrys = Country::where('active', '=', true)->get();
        return response()->view('cms.sport.edit', [
            'sportTranslation' => $sportTranslation,
            'languages' => $languages,
            'citys' => $citys,
            'countrys' => $countrys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SportTranslation  $sportTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SportTranslation $sportTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'city' => 'required|numeric|exists:cities,id',
            'country' => 'required|numeric|exists:countries,id',
        ]);

        if (!$validator->fails()) {
            $sportTranslation->title = $request->input('title');
            $sportTranslation->city_id = $request->input('city');
            $sportTranslation->country_id = $request->input('country');
            $sportTranslation->language_id = $request->input('language');
            $isSaved = $sportTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SportTranslation  $sportTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportTranslation $sportTranslation)
    {
        //
        $sport = SportTranslation::where('sport_id', $sportTranslation->sport_id)->count();
        if ($sport != 1) {
            $deleted = $sportTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
