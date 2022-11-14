<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\About;
use App\Models\AboutTranslation;
use App\Models\Language;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(About::class, 'about');
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
            $data = About::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.about.index', ['data' => $data]);
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
        return response()->view('cms.about.create', [
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
            'vision' => 'required|string|min:3',
            'mission' => 'required|string|min:3',
            'message' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $about = new About();
            $isSaved = $about->save();
            if ($isSaved) {
                $translation = new AboutTranslation();
                $translation->vision = $request->input('vision');
                $translation->mission = $request->input('mission');
                $translation->message = $request->input('message');
                $translation->language_id = $request->input('language');
                $translation->about_id = $about->id;
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'vision' => 'required|string|min:3',
            'mission' => 'required|string|min:3',
            'message' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $isSaved = $about->save();
            if ($isSaved) {
                $translation = new AboutTranslation();
                $translation->vision = $request->input('vision');
                $translation->mission = $request->input('mission');
                $translation->message = $request->input('message');
                $translation->language_id = $request->input('language');
                $translation->about_id = $about->id;
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
        $deleted = $about->delete();
        if ($deleted) {
            $translations = AboutTranslation::where('about_id', $about->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
