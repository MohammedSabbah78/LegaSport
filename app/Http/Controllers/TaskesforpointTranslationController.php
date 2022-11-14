<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Taskesforpoint;
use App\Models\TaskesforpointTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskesforpointTranslationController extends Controller
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
    public function create(Taskesforpoint $taskesforpoint)
    {
        //
        $languages = Language::whereDoesntHave('TaskesforpointTranslations', function ($query) use ($taskesforpoint) {
            $query->where('taskesforpoint_id', '=', $taskesforpoint->id);
        })->get();
        return response()->view('cms.taskes-for-point.create-lang', ['languages' => $languages, 'taskesforpoint' => $taskesforpoint]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Taskesforpoint $taskesforpoint)
    {
        //

        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',

        ]);

        if (!$validator->fails()) {
            $taskesforpointTranslation = new TaskesforpointTranslation();
            $taskesforpointTranslation->title = $request->input('title');
            $taskesforpointTranslation->language_id = $request->input('language');
            $taskesforpointTranslation->taskesforpoint_id  = $taskesforpoint->id;
            $isSaved = $taskesforpointTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskesforpointTranslation  $taskesforpointTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(TaskesforpointTranslation $taskesforpointTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskesforpointTranslation  $taskesforpointTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskesforpointTranslation $taskesforpointTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.taskes-for-point.edit', ['taskesforpointTranslation' => $taskesforpointTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskesforpointTranslation  $taskesforpointTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskesforpointTranslation $taskesforpointTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',

        ]);

        if (!$validator->fails()) {
            $taskesforpointTranslation->title = $request->input('title');
            $taskesforpointTranslation->language_id = $request->input('language');
            $isSaved = $taskesforpointTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskesforpointTranslation  $taskesforpointTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskesforpointTranslation $taskesforpointTranslation)
    {
        //
        $taskes = TaskesforpointTranslation::where('taskesforpoint_id', $taskesforpointTranslation->taskesforpoint_id)->count();
        if ($taskes != 1) {
            $deleted = $taskesforpointTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
