<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Offer;
use App\Models\OfferTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferTranslationController extends Controller
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
    public function create(Offer $offer)
    {
        //

        $languages = Language::whereDoesntHave('OfferTranslations', function ($query) use ($offer) {
            $query->where('offer_id', '=', $offer->id);
        })->get();

        return response()->view('cms.offer.create-lang', ['languages' => $languages, 'offer' => $offer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Offer $offer)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3',

        ]);
        if (!$validator->fails()) {
            $offerTranslation = new OfferTranslation();
            $offerTranslation->title = $request->input('title');
            $offerTranslation->description = $request->input('description');
            $offerTranslation->language_id = $request->input('language');
            $offerTranslation->offer_id = $offer->id;
            $isSaved = $offerTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfferTranslation  $offerTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(OfferTranslation $offerTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfferTranslation  $offerTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferTranslation $offerTranslation)
    {
        //
        $languages = Language::whereDoesntHave('OfferTranslations', function ($query) use ($offerTranslation) {
            $query->where('offer_id', '=', $offerTranslation->id);
        })->get();

        return response()->view('cms.offer.edit', [
            'languages' => $languages,
            'offerTranslation' => $offerTranslation,
            'languages' => $languages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfferTranslation  $offerTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferTranslation $offerTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3',

        ]);
        if (!$validator->fails()) {
            $offerTranslation->title = $request->input('title');
            $offerTranslation->description = $request->input('description');
            $offerTranslation->language_id = $request->input('language');
            $isSaved = $offerTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfferTranslation  $offerTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferTranslation $offerTranslation)
    {
        //
        //
        $count = OfferTranslation::where('offer_id', $offerTranslation->offer_id)->count();
        if ($count != 1) {
            $deleted = $offerTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
