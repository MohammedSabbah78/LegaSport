<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Policie;
use App\Models\PolicieTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PolicieTranslationController extends Controller
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
    public function create(Policie $policie)
    {
        //
        $languages = Language::whereDoesntHave('PolicieTranslations', function ($query) use ($policie) {
            $query->where('policie_id', '=', $policie->id);
        })->get();
        return response()->view('cms.policie.create-lang', ['languages' => $languages, 'policie' => $policie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Policie $policie)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'body' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $policieTranslation = new PolicieTranslation();
            $policieTranslation->title = $request->input('title');
            $policieTranslation->body = $request->input('body');
            $policieTranslation->language_id = $request->input('language');
            $policieTranslation->policie_id = $policie->id;
            $isSaved = $policieTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicieTranslation  $policieTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(PolicieTranslation $policieTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicieTranslation  $policieTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicieTranslation $policieTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.policie.edit', ['policieTranslation' => $policieTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicieTranslation  $policieTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolicieTranslation $policieTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'body' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $policieTranslation->title = $request->input('title');
            $policieTranslation->body = $request->input('body');
            $policieTranslation->language_id = $request->input('language');
            $isSaved = $policieTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicieTranslation  $policieTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicieTranslation $policieTranslation)
    {
        //
        $policie = PolicieTranslation::where('policie_id', $policieTranslation->policie_id)->count();
        if ($policie != 1) {
            $deleted = $policieTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
