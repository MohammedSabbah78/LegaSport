<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\City;
use App\Models\Club;
use App\Models\ClubTranslation;
use App\Models\Language;
use Illuminate\Http\Request;

class ClubController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Club::class, 'club');
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
            $data = Club::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.club.index', ['data' => $data]);
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

        return response()->view('cms.club.create', [
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
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'image' => 'nullable', 'image|mimes:jpg,png',
            'name' => 'required|string|min:3|max:30',
            'name_manger' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'member_num' => 'required|numeric',
        ]);
        if (!$validator->fails()) {
            $club = new Club();
            $club->active = $request->input('active');
            $club->member_num = $request->input('member_num');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $club->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('club', $imageName, ['disk' => 'public']);
                $club->image = 'club/' . $imageName;
            }
            $isSaved = $club->save();
            if ($isSaved) {
                $translation = new ClubTranslation();
                $translation->name = $request->input('name');
                $translation->name_manger = $request->input('name_manger');
                $translation->city_id = $request->input('city');
                $translation->language_id = $request->input('language');
                $translation->club_id = $club->id;
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
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'city' => 'required|numeric|exists:cities,id',
            'image' => 'nullable', 'image|mimes:jpg,png',
            'name' => 'required|string|min:3|max:30',
            'name_manger' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'member_num' => 'required|numeric',
        ]);
        if (!$validator->fails()) {
            $club->active = $request->input('active');
            $club->member_num = $request->input('member_num');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $club->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('club', $imageName, ['disk' => 'public']);
                $club->image = 'club/' . $imageName;
            }
            $isSaved = $club->save();
            if ($isSaved) {
                $translation = new ClubTranslation();
                $translation->name = $request->input('name');
                $translation->name_manger = $request->input('name_manger');
                $translation->city_id = $request->input('city');
                $translation->language_id = $request->input('language');
                $translation->club_id = $club->id;
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
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
        $deleted = $club->delete();
        if ($deleted) {
            $translations = ClubTranslation::where('club_id', $club->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
