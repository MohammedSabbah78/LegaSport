<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Plan;
use App\Models\PlanTranslation;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Plan::class, 'plan');
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
            $data = Plan::with('translations')->withCount(['translations'])->get();
            return response()->view('cms.plan.index', ['data' => $data]);
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
        return response()->view('cms.plan.create', ['languages' => $languages]);
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
            'price' => 'required|numeric',
            'max_month' => 'required|string',
            'type' => 'required|string|in:player,coach,academy',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $plan = new Plan();
            $plan->price = $request->input('price');
            $plan->max_month = $request->input('max_month');
            $plan->type = $request->input('type');
            $plan->active = $request->input('active');
            $isSaved = $plan->save();
            if ($isSaved) {
                $translation = new PlanTranslation();
                $translation->title = $request->input('title');
                $translation->description = $request->input('description');
                $translation->language_id = $request->input('language');
                $translation->plan_id = $plan->id;
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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3',
            'price' => 'required|numeric',
            'max_month' => 'required|string|min:3|max:30',
            'type' => 'required|string|in:player,coach,academy',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $plan->price = $request->input('price');
            $plan->max_month = $request->input('max_month');
            $plan->type = $request->input('type');
            $plan->active = $request->input('active');
            $isSaved = $plan->save();
            if ($isSaved) {
                $translation = new PlanTranslation();
                $translation->title = $request->input('title');
                $translation->description = $request->input('description');
                $translation->language_id = $request->input('language');
                $translation->plan_id = $plan->id;
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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
        $deleted = $plan->delete();
        if ($deleted) {
            $translations = PlanTranslation::where('plan_id', $plan->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
