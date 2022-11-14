<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Achievement;
use App\Models\AchievementTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AchievementController extends Controller
{

    public  function __construct()
    {
        $this->authorizeResource(Achievement::class, 'achievement');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth('admin')->check()) {
            $data = Achievement::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.achievement.index', ['data' => $data]);
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
        return response()->view('cms.achievement.create', ['languages' => $languages]);
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
            'name' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,png',
        ]);
        if (!$validator->fails()) {
            $achievement = new Achievement();
            $achievement->active = $request->input('active');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $achievement->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('achievement', $imageName, ['disk' => 'public']);
                $achievement->image = 'achievement/' . $imageName;
            }
            $isSaved = $achievement->save();
            if ($isSaved) {
                $translation = new AchievementTranslation();
                $translation->name = $request->input('name');
                $translation->language_id = $request->input('language');
                $translation->achievement_id = $achievement->id;
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
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'image' => 'nullable', 'image|mimes:jpg,png',
        ]);
        if (!$validator->fails()) {
            $achievement->active = $request->input('active');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $achievement->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('achievement', $imageName, ['disk' => 'public']);
                $achievement->image = 'achievement/' . $imageName;
            }
            $isSaved = $achievement->save();
            if ($isSaved) {
                $translation = new AchievementTranslation();
                $translation->name = $request->input('name');
                $translation->language_id = $request->input('language');
                $translation->achievement_id = $achievement->id;
                $translation->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        //
        $deleted = $achievement->delete();
        if ($deleted) {
            Storage::delete($achievement->image);
            $translations = AchievementTranslation::where('achievement_id', $achievement->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
