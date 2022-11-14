<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Policie;
use App\Models\PolicieTranslation;
use Illuminate\Http\Request;

class PolicieController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Policie::class, 'policie');
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
            $data = Policie::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.policie.index', ['data' => $data]);
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
        return response()->view('cms.policie.create', ['languages' => $languages]);
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
            'title' => 'required|string|min:3',
            'body' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $policie = new Policie();
            $isSaved = $policie->save();
            if ($isSaved) {
                $translation = new PolicieTranslation();
                $translation->title = $request->input('title');
                $translation->body = $request->input('body');
                $translation->language_id = $request->input('language');
                $translation->policie_id = $policie->id;
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
     * @param  \App\Models\Policie  $policie
     * @return \Illuminate\Http\Response
     */
    public function show(Policie $policie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policie  $policie
     * @return \Illuminate\Http\Response
     */
    public function edit(Policie $policie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policie  $policie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policie $policie)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3',
            'body' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $isSaved = $policie->save();
            if ($isSaved) {
                $translation = new PolicieTranslation();
                $translation->title = $request->input('title');
                $translation->body = $request->input('body');
                $translation->language_id = $request->input('language');
                $translation->policie_id = $policie->id;
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
     * @param  \App\Models\Policie  $policie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policie $policie)
    {
        //
        $deleted = $policie->delete();
        if ($deleted) {
            $translations = PolicieTranslation::where('policie_id', $policie->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
