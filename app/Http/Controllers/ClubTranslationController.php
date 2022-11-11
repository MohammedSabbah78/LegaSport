<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Club;
use App\Models\ClubTranslation;
use App\Models\Country;
use App\Models\Language;
use App\Models\SportTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClubTranslationController extends Controller
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
    public function create(Club $club)
    {
        //
        $languages = Language::whereDoesntHave('clubTranslations', function ($query) use ($club) {
            $query->where('club_id', '=', $club->id);
        })->get();
        $citys = City::where('active', '=', true)->get();
        return response()->view('cms.club.create-lang', [
            'languages' => $languages,
            'club' => $club,
            'languages' => $languages,
            'citys' => $citys,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Club $club)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'name' => 'required|string|min:3|max:30',
            'name_manger' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $clubTranslation = new ClubTranslation();
            $clubTranslation->name = $request->input('name');
            $clubTranslation->name_manger = $request->input('name_manger');
            $clubTranslation->city_id = $request->input('city');
            $clubTranslation->language_id = $request->input('language');
            $clubTranslation->club_id = $club->id;
            $isSaved = $clubTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClubTranslation  $clubTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(ClubTranslation $clubTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClubTranslation  $clubTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(ClubTranslation $clubTranslation)
    {
        //
        $languages = Language::all();
        $citys = City::where('active', '=', true)->get();
        return response()->view('cms.club.edit', [
            'clubTranslation' => $clubTranslation,
            'languages' => $languages,
            'citys' => $citys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClubTranslation  $clubTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClubTranslation $clubTranslation)
    {
        //

        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'name' => 'required|string|min:3|max:30',
            'name_manger' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $clubTranslation->name = $request->input('name');
            $clubTranslation->name_manger = $request->input('name_manger');
            $clubTranslation->city_id = $request->input('city');
            $clubTranslation->language_id = $request->input('language');
            $isSaved = $clubTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClubTranslation  $clubTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClubTranslation $clubTranslation)
    {
        //
        $count = ClubTranslation::where('club_id', $clubTranslation->club_id)->count();
        if ($count != 1) {
            $deleted = $clubTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
