<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FaqTranslationController extends Controller
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
    public function create(Faq $faq)
    {
        //
        $languages = Language::whereDoesntHave('FaqsTranslations', function ($query) use ($faq) {
            $query->where('faqs_id', '=', $faq->id);
        })->get();
        return response()->view('cms.faqs.create-lang', [
            'languages' => $languages,
            'faq' => $faq,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faq $faq)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'qs' => 'required|string|min:3|max:30',
            'answer' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $faqTranslation = new FaqTranslation();
            $faqTranslation->qs = $request->input('qs');
            $faqTranslation->answer = $request->input('answer');
            $faqTranslation->language_id = $request->input('language');
            $faqTranslation->faqs_id = $faq->id;
            $isSaved = $faqTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FaqTranslation  $faqTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(FaqTranslation $faqTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FaqTranslation  $faqTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqTranslation $faqTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.faqs.edit', [
            'faqTranslation' => $faqTranslation,
            'languages' => $languages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FaqTranslation  $faqTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaqTranslation $faqTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'qs' => 'required|string|min:3|max:30',
            'answer' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $faqTranslation->qs = $request->input('qs');
            $faqTranslation->answer = $request->input('answer');
            $faqTranslation->language_id = $request->input('language');
            $isSaved = $faqTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FaqTranslation  $faqTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqTranslation $faqTranslation)
    {
        //

        $count = FaqTranslation::where('faqs_id', $faqTranslation->faqs_id)->count();
        if ($count != 1) {
            $deleted = $faqTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
