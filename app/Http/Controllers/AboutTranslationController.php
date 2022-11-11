<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\About;
use App\Models\AboutTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutTranslationController extends Controller
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
    public function create(About $about)
    {
        //

        $languages = Language::whereDoesntHave('AboutTranslations', function ($query) use ($about) {
            $query->where('about_id', '=', $about->id);
        })->get();
        return response()->view('cms.about.create-lang', [
            'languages' => $languages,
            'about' => $about
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, About $about)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'vision' => 'required|string|min:3',
            'mission' => 'required|string|min:3',
            'message' => 'required|string|min:3',
        ]);

        if (!$validator->fails()) {
            $aboutTranslation = new AboutTranslation();
            $aboutTranslation->vision = $request->input('vision');
            $aboutTranslation->mission = $request->input('mission');
            $aboutTranslation->message = $request->input('message');
            $aboutTranslation->language_id = $request->input('language');
            $aboutTranslation->about_id = $about->id;
            $isSaved = $aboutTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutTranslation  $aboutTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(AboutTranslation $aboutTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutTranslation  $aboutTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutTranslation $aboutTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.about.edit', ['aboutTranslation' => $aboutTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutTranslation  $aboutTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutTranslation $aboutTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'vision' => 'required|string|min:3',
            'mission' => 'required|string|min:3',
            'message' => 'required|string|min:3',
        ]);

        if (!$validator->fails()) {
            $aboutTranslation->vision = $request->input('vision');
            $aboutTranslation->mission = $request->input('mission');
            $aboutTranslation->message = $request->input('message');
            $aboutTranslation->language_id = $request->input('language');
            $isSaved = $aboutTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutTranslation  $aboutTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutTranslation $aboutTranslation)
    {

        $about = AboutTranslation::where('about_id', $aboutTranslation->about_id)->count();
        if ($about != 1) {
            $deleted = $aboutTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
