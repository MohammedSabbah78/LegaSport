<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Paymen;
use App\Models\PaymenTranslation;
use Illuminate\Http\Request;

class PaymenController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Paymen::class, 'paymen');
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
            $data = Paymen::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.paymen.index', ['data' => $data]);
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
        return response()->view('cms.paymen.create', [
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
            'image' => 'nullable', 'image|mimes:jpg,png',
            'name' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $Paymen = new Paymen();
            $Paymen->active = $request->input('active');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $Paymen->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('Paymen', $imageName, ['disk' => 'public']);
                $Paymen->image = 'Paymen/' . $imageName;
            }
            $isSaved = $Paymen->save();
            if ($isSaved) {
                $translation = new PaymenTranslation();
                $translation->name = $request->input('name');
                $translation->language_id = $request->input('language');
                $translation->paymen_id = $Paymen->id;
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
     * @param  \App\Models\Paymen  $paymen
     * @return \Illuminate\Http\Response
     */
    public function show(Paymen $paymen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymen  $paymen
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymen $paymen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paymen  $paymen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paymen $paymen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymen  $paymen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymen $paymen)
    {
        //
        $deleted = $paymen->delete();
        if ($deleted) {
            $translations = PaymenTranslation::where('paymen_id', $paymen->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
