<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Event;
use App\Models\Language;
use App\Models\Partner;
use App\Models\Sponser;
use App\Models\SponserTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SponserTranslationController extends Controller
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
    public function create(Sponser $sponser)
    {
        //
        //
        $languages = Language::whereDoesntHave('SponserTranslations', function ($query) use ($sponser) {
            $query->where('sponser_id', '=', $sponser->id);
        })->get();
        $partners = Partner::all();
        $events = Event::all();

        return response()->view('cms.sponser.create-lang', [
            'languages' => $languages,
            'sponser' => $sponser,
            'languages' => $languages,
            'events' => $events,
            'partners' => $partners,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sponser $sponser)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'event' => 'required|numeric|exists:events,id',
            'partner' => 'required|numeric|exists:partners,id',
            'cost' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $sponserTranslation = new SponserTranslation();
            $sponserTranslation->partner_id = $request->input('partner');
            $sponserTranslation->event_id = $request->input('event');
            $sponserTranslation->language_id = $request->input('language');
            $sponserTranslation->sponser_id = $sponser->id;
            $isSaved = $sponserTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponserTranslation  $sponserTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(SponserTranslation $sponserTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponserTranslation  $sponserTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(SponserTranslation $sponserTranslation)
    {
        //
        $languages = Language::all();
        $partners = Partner::all();
        $events = Event::all();
        return response()->view('cms.sponser.edit', [
            'sponserTranslation' => $sponserTranslation,
            'languages' => $languages,
            'events' => $events,
            'partners' => $partners,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponserTranslation  $sponserTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponserTranslation $sponserTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'event' => 'required|numeric|exists:events,id',
            'partner' => 'required|numeric|exists:partners,id',
            'cost' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $sponserTranslation->cost = $request->input('cost');
            $sponserTranslation->partner_id = $request->input('partner');
            $sponserTranslation->event_id = $request->input('event');
            $sponserTranslation->language_id = $request->input('language');
            $isSaved = $sponserTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponserTranslation  $sponserTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponserTranslation $sponserTranslation)
    {
        //
        $sponser = SponserTranslation::where('sponser_id', $sponserTranslation->sponser_id)->count();
        if ($sponser != 1) {
            $deleted = $sponserTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
