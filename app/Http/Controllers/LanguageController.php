<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Language::class, 'language');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        if (auth('admin')->check()) {
            return response()->view('cms.languages.index', ['data' => $languages]);
        } else {
            return ControllersService::generateArraySuccessResponse($languages, 'Success');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.languages.create');
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
            'name' => 'required|string|max:40|unique:languages,name',
            'code' => 'required|string|max:5|unique:languages,code',
            'active' => 'required|boolean',
            'is_rtl' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $language = new Language();
            $language->name = $request->input('name');
            $language->code = $request->input('code');
            $language->active = $request->input('active');
            $language->is_rtl = $request->input('is_rtl');
            $saved = $language->save();
            return ControllersService::generateProcessResponse($saved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return response()->view('cms.languages.edit', ['language' => $language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:40|unique:languages,name,' . $language->id,
            'code' => 'required|string|max:5|unique:languages,code,' . $language->id,
            'is_rtl' => 'required|boolean',
            'active' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $language->name = $request->input('name');
            $language->code = $request->input('code');
            $language->active = $request->input('active');
            $saved = $language->save();
            return ControllersService::generateProcessResponse($saved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $deleted = $language->delete();
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
