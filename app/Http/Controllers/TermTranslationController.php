<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Term;
use App\Models\TermTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TermTranslationController extends Controller
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
    public function create(Term $term)
    {
        $languages = Language::whereDoesntHave('TermTranslations', function ($query) use ($term) {
            $query->where('term_id', '=', $term->id);
        })->get();
        return response()->view('cms.term.create-lang', ['languages' => $languages, 'term' => $term]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Term $term)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'body' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $termTranslation = new TermTranslation();
            $termTranslation->title = $request->input('title');
            $termTranslation->body = $request->input('body');
            $termTranslation->language_id = $request->input('language');
            $termTranslation->term_id = $term->id;
            $isSaved = $termTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermTranslation  $termTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(TermTranslation $termTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermTranslation  $termTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(TermTranslation $termTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.term.edit', ['termTranslation' => $termTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermTranslation  $termTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermTranslation $termTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'body' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $termTranslation->title = $request->input('title');
            $termTranslation->body = $request->input('body');
            $termTranslation->language_id = $request->input('language');
            $isSaved = $termTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermTranslation  $termTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermTranslation $termTranslation)
    {
        //
        $term = TermTranslation::where('term_id', $termTranslation->term_id)->count();
        if ($term != 1) {
            $deleted = $termTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
