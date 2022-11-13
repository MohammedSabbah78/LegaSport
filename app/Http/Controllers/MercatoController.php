<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Mercato;
use App\Models\MercatoTranslation;
use Illuminate\Http\Request;

class MercatoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Mercato::class, 'mercato');
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
            $data = Mercato::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.mercato.index', ['data' => $data]);
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
        return response()->view('cms.mercato.create', [
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
            'title' => 'required|string|min:3|max:30',
            'type' => 'required|string|in:permanet,trmporary',
            'image' => 'required|image|mimes:jpg,png',
            'form' => 'required|numeric',
            'to' => 'required|numeric',
            'salary' => 'required|numeric',
            'start_date' => 'required|string',
            'end_date' => 'required|string|after:start_date',

        ]);
        if (!$validator->fails()) {
            $mercato = new Mercato();
            $mercato->type = $request->input('type');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $mercato->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('mercato', $imageName, ['disk' => 'public']);
                $mercato->image = 'mercato/' . $imageName;
            }
            $mercato->form = $request->input('form');
            $mercato->to = $request->input('to');
            $mercato->salary = $request->input('salary');
            $mercato->start_date = $request->input('start_date');
            $mercato->end_date = $request->input('end_date');
            $isSaved = $mercato->save();
            if ($isSaved) {
                $MercatoTranslation = new MercatoTranslation();
                $MercatoTranslation->title = $request->input('title');
                $MercatoTranslation->language_id = $request->input('language');
                $MercatoTranslation->mercato_id = $mercato->id;
                $MercatoTranslation->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mercato  $mercato
     * @return \Illuminate\Http\Response
     */
    public function show(Mercato $mercato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mercato  $mercato
     * @return \Illuminate\Http\Response
     */
    public function edit(Mercato $mercato)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mercato  $mercato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mercato $mercato)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'type' => 'required|string|in:permanet,trmporary',
            'image' => 'required|image|mimes:jpg,png',
            'form' => 'required|numeric',
            'to' => 'required|numeric',
            'salary' => 'required|numeric',
            'start_date' => 'required|string',
            'end_date' => 'required|string|after:start_date',

        ]);
        if (!$validator->fails()) {
            $mercato->type = $request->input('type');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $mercato->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('mercato', $imageName, ['disk' => 'public']);
                $mercato->image = 'mercato/' . $imageName;
            }
            $mercato->form = $request->input('form');
            $mercato->to = $request->input('to');
            $mercato->salary = $request->input('salary');
            $mercato->start_date = $request->input('start_date');
            $mercato->end_date = $request->input('end_date');
            $isSaved = $mercato->save();
            if ($isSaved) {
                $MercatoTranslation = new MercatoTranslation();
                $MercatoTranslation->title = $request->input('title');
                $MercatoTranslation->language_id = $request->input('language');
                $MercatoTranslation->mercato_id = $mercato->id;
                $MercatoTranslation->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mercato  $mercato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mercato $mercato)
    {
        $deleted = $mercato->delete();
        if ($deleted) {
            $translations = MercatoTranslation::where('mercato_id', $mercato->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
