<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Event;
use App\Models\EventTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventTranslationController extends Controller
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
    public function create(Event $event)
    {
        //
        if (auth('admin')->user()->can('Create-Event')) {
            $languages = Language::whereDoesntHave('eventTranslations', function ($query) use ($event) {
                $query->where('event_id', '=', $event->id);
            })->get();
            return response()->view('cms.eventss.create-lang', ['languages' => $languages, 'event' => $event]);
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
    public function store(Request $request, Event $event)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $EventTranslation = new EventTranslation();
            $EventTranslation->title = $request->input('title');
            $EventTranslation->description = $request->input('description');
            $EventTranslation->language_id = $request->input('language');
            $EventTranslation->event_id = $event->id;
            $isSaved = $EventTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventTranslation  $eventTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(EventTranslation $eventTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventTranslation  $eventTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(EventTranslation $eventTranslation)
    {
        if (auth('admin')->user()->can('Update-Event')) {
            $languages = Language::all();
            return response()->view('cms.eventss.edit', ['eventTranslation' => $eventTranslation, 'languages' => $languages]);
        } else {
            return abort(401);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventTranslation  $eventTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventTranslation $eventTranslation)
    {
        //
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3|max:30',

        ]);

        if (!$validator->fails()) {
            $eventTranslation->title = $request->input('title');
            $eventTranslation->description = $request->input('description');
            $eventTranslation->language_id = $request->input('language');
            $isSaved = $eventTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventTranslation  $eventTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventTranslation $eventTranslation)
    {
        //
        $sport = EventTranslation::where('event_id', $eventTranslation->event_id)->count();
        if ($sport != 1) {
            $deleted = $eventTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
