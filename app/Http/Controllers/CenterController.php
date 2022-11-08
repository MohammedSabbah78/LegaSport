<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Center;
use App\Models\CenterTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (auth('admin')->check()) {
            $data = Center::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.center.index', ['data' => $data]);
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
        return response()->view('cms.center.create', ['languages' => $languages]);
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
            'name' => 'required|string|min:3|max:30',
            'subscribtion_price' => 'required|numeric',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'url_website' => 'required',
            'image' => 'required|image|mimes:jpg,png',
        ]);
        if (!$validator->fails()) {
            $center = new Center();
            $center->subscribtion_price = $request->input('subscribtion_price');
            $center->long = $request->input('long');
            $center->lat = $request->input('lat');
            $center->url_website = $request->input('url_website');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $center->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('center', $imageName, ['disk' => 'public']);
                $center->image = 'center/' . $imageName;
            }
            $isSaved = $center->save();
            if ($isSaved) {
                $translation = new CenterTranslation();
                $translation->name = $request->input('name');
                $translation->language_id = $request->input('language');
                $translation->center_id = $center->id;
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
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Center $center)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
            'subscribtion_price' => 'required|numeric',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'url_website' => 'required',
            'image' => 'required|image|mimes:jpg,png',
        ]);
        if (!$validator->fails()) {
            $center->subscribtion_price = $request->input('subscribtion_price');
            $center->long = $request->input('long');
            $center->lat = $request->input('lat');
            $center->url_website = $request->input('url_website');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $center->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('center', $imageName, ['disk' => 'public']);
                $center->image = 'center/' . $imageName;
            }
            $isSaved = $center->save();
            if ($isSaved) {
                $translation = new CenterTranslation();
                $translation->name = $request->input('name');
                $translation->language_id = $request->input('language');
                $translation->center_id = $center->id;
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
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {
        //
        $deleted = $center->delete();
        if ($deleted) {
            Storage::delete($center->image);
            $translations = CenterTranslation::where('center_id', $center->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
