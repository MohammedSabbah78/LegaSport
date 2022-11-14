<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Mercato;
use App\Models\MercatoTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MercatoTranslationController extends Controller
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
    public function create(Mercato $mercato)
    {
        //
        $languages = Language::whereDoesntHave('MercatoTranslations', function ($query) use ($mercato) {
            $query->where('mercato_id', '=', $mercato->id);
        })->get();
        return response()->view('cms.mercato.create-lang', ['languages' => $languages, 'mercato' => $mercato]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Mercato $mercato)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',

        ]);

        if (!$validator->fails()) {
            $mercatoTranslation = new MercatoTranslation();
            $mercatoTranslation->title = $request->input('title');
            $mercatoTranslation->language_id = $request->input('language');
            $mercatoTranslation->mercato_id = $mercato->id;
            $isSaved = $mercatoTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MercatoTranslation  $mercatoTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(MercatoTranslation $mercatoTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MercatoTranslation  $mercatoTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(MercatoTranslation $mercatoTranslation)
    {
        //
        //
        $languages = Language::whereDoesntHave('MercatoTranslations', function ($query) use ($mercatoTranslation) {
            $query->where('mercato_id', '=', $mercatoTranslation->id);
        })->get();

        return response()->view('cms.mercato.edit', [
            'languages' => $languages,
            'mercatoTranslation' => $mercatoTranslation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MercatoTranslation  $mercatoTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MercatoTranslation $mercatoTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',

        ]);

        if (!$validator->fails()) {
            $mercatoTranslation->title = $request->input('title');
            $mercatoTranslation->language_id = $request->input('language');
            $isSaved = $mercatoTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MercatoTranslation  $mercatoTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(MercatoTranslation $mercatoTranslation)
    {
        //
        $count = MercatoTranslation::where('mercato_id', $mercatoTranslation->mercato_id)->count();
        if ($count != 1) {
            $deleted = $mercatoTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
