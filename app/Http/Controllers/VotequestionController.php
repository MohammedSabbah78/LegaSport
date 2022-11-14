<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Votequestion;
use App\Models\VotequestionTranslation;
use Illuminate\Http\Request;

class VotequestionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Votequestion::class, 'votequestion');
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
            // dd(Votequestion::all());
            $data = Votequestion::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.votequestion.index', ['data' => $data]);
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
        return response()->view('cms.votequestion.create', ['languages' => $languages]);
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
            'title' => 'required|string|min:3|max:30',
            'type' => 'required|string|in:player,coach',

        ]);
        if (!$validator->fails()) {
            $votequestion = new Votequestion();
            $votequestion->type = $request->input('type');
            $isSaved = $votequestion->save();
            if ($isSaved) {
                $translation = new VotequestionTranslation();
                $translation->title = $request->input('title');
                $translation->language_id = $request->input('language');
                $translation->votequestion_id = $votequestion->id;
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
     * @param  \App\Models\Votequestion  $votequestion
     * @return \Illuminate\Http\Response
     */
    public function show(Votequestion $votequestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Votequestion  $votequestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Votequestion $votequestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Votequestion  $votequestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votequestion $votequestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Votequestion  $votequestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votequestion $votequestion)
    {
        $deleted = $votequestion->delete();
        if ($deleted) {
            $count = VotequestionTranslation::where('votequestion_id', $votequestion->id)->get();
            foreach ($count as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
