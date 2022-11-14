<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Votequestion;
use App\Models\VotequestionTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VotequestionTranslationController extends Controller
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
    public function create(Votequestion $votequestion)
    {
        //
        $languages = Language::whereDoesntHave('VotequestionTranslations', function ($query) use ($votequestion) {
            $query->where('votequestion_id', '=', $votequestion->id);
        })->get();
        return response()->view('cms.votequestion.create-lang', ['languages' => $languages, 'votequestion' => $votequestion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Votequestion $votequestion)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $votequestionTranslation = new VotequestionTranslation();
            $votequestionTranslation->title = $request->input('title');
            $votequestionTranslation->language_id = $request->input('language');
            $votequestionTranslation->votequestion_id = $votequestion->id;
            $isSaved = $votequestionTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VotequestionTranslation  $votequestionTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(VotequestionTranslation $votequestionTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VotequestionTranslation  $votequestionTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(VotequestionTranslation $votequestionTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.votequestion.edit', ['votequestionTranslation' => $votequestionTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VotequestionTranslation  $votequestionTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VotequestionTranslation $votequestionTranslation)
    {
        //
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $votequestionTranslation->title = $request->input('title');
            $votequestionTranslation->language_id = $request->input('language');
            $isSaved = $votequestionTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VotequestionTranslation  $votequestionTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VotequestionTranslation $votequestionTranslation)
    {
        //
        $votequestion = VotequestionTranslation::where('votequestion_id', $votequestionTranslation->votequestion_id)->count();
        if ($votequestion != 1) {
            $deleted = $votequestionTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
