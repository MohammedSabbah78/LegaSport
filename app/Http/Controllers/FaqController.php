<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Language;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Faq::class, 'faq');
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
            $data = Faq::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.faqs.index', ['data' => $data]);
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

        return response()->view('cms.faqs.create', [
            'languages' => $languages,
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
            'qs' => 'required|string|min:3',
            'answer' => 'required|string|min:3',

        ]);
        if (!$validator->fails()) {
            $faq = new Faq();
            $isSaved = $faq->save();
            if ($isSaved) {
                $translation = new FaqTranslation();
                $translation->qs = $request->input('qs');
                $translation->answer = $request->input('answer');
                $translation->language_id = $request->input('language');
                $translation->faqs_id = $faq->id;
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
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        //
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'qs' => 'required|string|min:3',
            'answer' => 'required|string|min:3',

        ]);
        if (!$validator->fails()) {
            $faq = new Faq();
            $isSaved = $faq->save();
            if ($isSaved) {
                $translation = new FaqTranslation();
                $translation->qs = $request->input('qs');
                $translation->answer = $request->input('answer');
                $translation->language_id = $request->input('language');
                $translation->faqs_id = $faq->id;
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
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $deleted = $faq->delete();
        if ($deleted) {
            $translations = FaqTranslation::where('faqs_id', $faq->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
