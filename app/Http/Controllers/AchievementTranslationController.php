<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Achievement;
use App\Models\AchievementTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AchievementTranslationController extends Controller
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
    public function create(Achievement $achievement)
    {
        //

        $languages = Language::whereDoesntHave('achievementTranslation', function ($query) use ($achievement) {
            $query->where('achievement_id', '=', $achievement->id);
        })->get();
        return response()->view('cms.achievement.create', ['languages' => $languages, 'achievement' => $achievement]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Achievement $achievement)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $achievementTranslation = new AchievementTranslation();
            $achievementTranslation->name = $request->input('name');
            $achievementTranslation->language_id = $request->input('language');
            $achievementTranslation->achievement_id = $achievement->id;
            $isSaved = $achievementTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AchievementTranslation  $achievementTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(AchievementTranslation $achievementTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AchievementTranslation  $achievementTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(AchievementTranslation $achievementTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.achievement.edit', ['achievementTranslation' => $achievementTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AchievementTranslation  $achievementTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AchievementTranslation $achievementTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $achievementTranslation->name = $request->input('name');
            $achievementTranslation->language_id = $request->input('language');
            $isSaved = $achievementTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AchievementTranslation  $achievementTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(AchievementTranslation $achievementTranslation)
    {
        //

        $count = AchievementTranslation::where('achievement_id', $achievementTranslation->achievement_id)->count();
        if ($count != 1) {
            $deleted = $achievementTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
