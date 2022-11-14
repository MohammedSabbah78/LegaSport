<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Offer;
use App\Models\OfferTranslation;
use Illuminate\Http\Request;

class OfferController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (auth('admin')->user()->can('Read-Offers')) {
            if (auth('admin')->check()) {
                $data = Offer::with('translations')->withCount(['translations'])->get();
                return response()->view('cms.offer.index', ['data' => $data]);
            }
        } else {
            return abort(401);
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
        if (auth('admin')->user()->can('Create-Offer')) {
            if (auth('admin')->check()) {
                $languages = Language::all();
                return response()->view('cms.offer.create', ['languages' => $languages]);
            }
        } else {
            return abort(401);
        }
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
            'description' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $offer = new Offer();
            $isSaved = $offer->save();
            if ($isSaved) {
                $translation = new OfferTranslation();
                $translation->title = $request->input('title');
                $translation->description = $request->input('description');

                $translation->language_id = $request->input('language');
                $translation->offer_id = $offer->id;
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
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $offer = new Offer();
            $isSaved = $offer->save();
            if ($isSaved) {
                $offer->title = $request->input('title');
                $offer->description = $request->input('description');
                $offer->language_id = $request->input('language');
                $offer->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        if (auth('admin')->user()->can('Delete-Offer')) {
            if (auth('admin')->check()) {
                $deleted = $offer->delete();
                if ($deleted) {
                    $translations = OfferTranslation::where('offer_id', $offer->id)->get();
                    foreach ($translations as $translation) {
                        $translation->delete();
                    }
                }
                return ControllersService::generateProcessResponse($deleted, 'DELETE');
            }
        } else {
            return abort(401);
        }
    }
}
