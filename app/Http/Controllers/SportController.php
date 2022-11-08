<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Sport;
use App\Models\SportTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Sport::class, 'sport');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth('admin')->check()) {
            $data = Sport::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.sport.index', ['data' => $data]);
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
        return response()->view('cms.sport.create', ['languages' => $languages]);
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
            'title' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,png',
        ]);
        if (!$validator->fails()) {
            $sport = new Sport();
            $sport->active = $request->input('active');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $sport->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('sport', $imageName, ['disk' => 'public']);
                $sport->image = 'sport/' . $imageName;
            }
            $isSaved = $sport->save();
            if ($isSaved) {
                $translation = new SportTranslation();
                $translation->title = $request->input('title');
                $translation->language_id = $request->input('language');
                $translation->sport_id = $sport->id;
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
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'image' => 'nullable', 'image|mimes:jpg,png',
        ]);
        if (!$validator->fails()) {
            $sport->active = $request->input('active');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $sport->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('sport', $imageName, ['disk' => 'public']);
                $sport->image = 'sport/' . $imageName;
            }
            $isSaved = $sport->save();
            if ($isSaved) {
                $translation = new SportTranslation();
                $translation->title = $request->input('title');
                $translation->language_id = $request->input('language');
                $translation->sport_id = $sport->id;
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
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        //
        $deleted = $sport->delete();
        if ($deleted) {
            Storage::delete($sport->image);
            $translations = SportTranslation::where('sport_id', $sport->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
