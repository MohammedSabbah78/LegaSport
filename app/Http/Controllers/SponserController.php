<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Event;
use App\Models\Language;
use App\Models\Partner;
use App\Models\Sponser;
use App\Models\SponserTranslation;
use Illuminate\Http\Request;

class SponserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Sponser::class, 'sponser');
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
            $data = Sponser::with(['translations'])->withCount(['translations'])->get();
            return response()->view('cms.sponser.index', ['data' => $data]);
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
        $partners = Partner::all();
        $events = Event::all();

        return response()->view('cms.sponser.create', [
            'languages' => $languages,
            'partners' => $partners,
            'events' => $events,
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
            'event' => 'required|numeric|exists:events,id',
            'partner' => 'required|numeric|exists:partners,id',
            'cost' => 'required|string|min:3|max:30',
        ]);
        if (!$validator->fails()) {
            $sponser = new Sponser();
            $isSaved = $sponser->save();
            if ($isSaved) {
                $translation = new SponserTranslation();
                $translation->cost = $request->input('cost');
                $translation->partner_id = $request->input('partner');
                $translation->event_id = $request->input('event');
                $translation->language_id = $request->input('language');
                $translation->sponser_id = $sponser->id;
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
     * @param  \App\Models\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function show(Sponser $sponser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponser $sponser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponser $sponser)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'event' => 'required|numeric|exists:events,id',
            'partner' => 'required|numeric|exists:partners,id',
            'cost' => 'required|string|min:3|max:30',
        ]);
        if (!$validator->fails()) {
            $isSaved = $sponser->save();
            if ($isSaved) {
                $translation = new SponserTranslation();
                $translation->cost = $request->input('cost');
                $translation->partner_id = $request->input('partner');
                $translation->event_id = $request->input('event');
                $translation->language_id = $request->input('language');
                $translation->sponser_id = $sponser->id;
                $translation->save();
            }
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponser  $sponser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponser $sponser)
    {
        //
        $deleted = $sponser->delete();
        if ($deleted) {
            $translations = SponserTranslation::where('sponser_id', $sponser->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
