<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Taskesforpoint;
use App\Models\TaskesforpointTranslation;
use Illuminate\Http\Request;

class TaskesforpointController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Taskesforpoint::class, 'taskesforpoint_id  ');
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
            $data = Taskesforpoint::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.taskes-for-point.index', ['data' => $data]);
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
        return response()->view('cms.taskes-for-point.create', ['languages' => $languages]);
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
            'type' => 'required|string|in:player,coach,academy',
            'point' => 'required|string',

        ]);
        if (!$validator->fails()) {
            $taskesforpoint = new Taskesforpoint();
            $taskesforpoint->type = $request->input('type');
            $taskesforpoint->point = $request->input('point');

            $isSaved = $taskesforpoint->save();
            if ($isSaved) {
                $translation = new TaskesforpointTranslation();
                $translation->title = $request->input('title');
                $translation->language_id = $request->input('language');
                $translation->taskesforpoint_id = $taskesforpoint->id;
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
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Http\Response
     */
    public function show(Taskesforpoint $taskesforpoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Http\Response
     */
    public function edit(Taskesforpoint $taskesforpoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taskesforpoint $taskesforpoint)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'type' => 'required|string|in:player,coach,academy',
            'point' => 'required|string',

        ]);
        if (!$validator->fails()) {
            $taskesforpoint->type = $request->input('type');
            $taskesforpoint->point = $request->input('point');

            $isSaved = $taskesforpoint->save();
            if ($isSaved) {
                $translation = new TaskesforpointTranslation();
                $translation->title = $request->input('title');
                $translation->language_id = $request->input('language');
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
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taskesforpoint $taskesforpoint)
    {

        if (auth('admin')->user()->can('Delete-Taskes_For_Point')) {
            $deleted = $taskesforpoint->delete();
            if ($deleted) {
                $translations = TaskesforpointTranslation::where('taskesforpoint_id', $taskesforpoint->id)->get();
                foreach ($translations as $translation) {
                    $translation->delete();
                }
            }
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        } else {
            return abort(401);
        }
    }
}
