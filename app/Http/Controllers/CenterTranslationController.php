<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Center;
use App\Models\CenterTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CenterTranslationController extends Controller
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
    public function create(Center $center)
    {
        //
        $languages = Language::whereDoesntHave('centerTranslation', function ($query) use ($center) {
            $query->where('center_id', '=', $center->id);
        })->get();
        return response()->view('cms.center.create-lang', ['languages' => $languages, 'center' => $center]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Center $center)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',

        ]);

        if (!$validator->fails()) {
            $centerTranslation = new CenterTranslation();
            $centerTranslation->name = $request->input('name');
            $centerTranslation->language_id = $request->input('language');
            $centerTranslation->center_id = $center->id;
            $isSaved = $centerTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CenterTranslation  $centerTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(CenterTranslation $centerTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CenterTranslation  $centerTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(CenterTranslation $centerTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.center.edit', ['centerTranslation' => $centerTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CenterTranslation  $centerTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CenterTranslation $centerTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',

        ]);

        if (!$validator->fails()) {
            $centerTranslation->name = $request->input('name');
            $centerTranslation->language_id = $request->input('language');
            $isSaved = $centerTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CenterTranslation  $centerTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CenterTranslation $centerTranslation)
    {
        //
        $count = CenterTranslation::where('center_id', $centerTranslation->center_id)->count();
        if ($count != 1) {
            $deleted = $centerTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
