<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Event;
use App\Models\EventTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('admin')->user()->can('Read_Events')) {
            if (auth('admin')->check()) {
                $data = Event::with('translations')->withCount(['translations'])->get();
                return response()->view('cms.eventss.index', ['data' => $data]);
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
        if (auth('admin')->user()->can('Create_Event')) {
            if (auth('admin')->check()) {
                $languages = Language::all();
                return response()->view('cms.eventss.create', ['languages' => $languages]);
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
            'description' => 'required|string|min:3|max:30',
            'isPrivate' => 'required|boolean',
            'isOnline' => 'required|boolean',
            'type' => 'required|string|in:Free,Paid',
            'poster' => 'required|image|mimes:jpg,png',
            'date' => 'required|string',
            'max_user' => 'required|numeric',
            'price' => 'required|numeric',
            'event_link' => 'required|string',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',



        ]);
        if (!$validator->fails()) {
            $event = new Event();
            $event->isPrivate = $request->input('isPrivate');
            $event->isOnline = $request->input('isOnline');
            $event->type = $request->input('type');
            $event->date = $request->input('date');
            $event->max_user = $request->input('max_user');
            $event->price = $request->input('price');
            $event->event_link = $request->input('event_link');
            $event->start = $request->input('start');
            $event->end = $request->input('end');
            if ($request->hasFile('poster')) {
                $posterName = time() . '_' . str_replace(' ', '', $event->name) . '.' . $request->file('poster')->extension();
                $request->file('poster')->storePubliclyAs('event', $posterName, ['disk' => 'public']);
                $event->poster = 'poster/' . $posterName;
            }
            $isSaved = $event->save();
            if ($isSaved) {
                $translation = new EventTranslation();
                $translation->title = $request->input('title');
                $translation->description = $request->input('description');
                $translation->language_id = $request->input('language');
                $translation->event_id = $event->id;
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
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        if (auth('admin')->user()->can('Delete_Event')) {
            if (auth('admin')->check()) {
                $deleted = $event->delete();
                if ($deleted) {
                    Storage::delete($event->poster);
                    $translations = EventTranslation::where('event_id', $event->id)->get();
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
