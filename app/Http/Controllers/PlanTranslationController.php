<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Plan;
use App\Models\PlanTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanTranslationController extends Controller
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
    public function create(Plan $plan)
    {
        //
        $languages = Language::whereDoesntHave('palnTranslation', function ($query) use ($plan) {
            $query->where('plan_id', '=', $plan->id);
        })->get();
        return response()->view('cms.plan.create-lang', ['languages' => $languages, 'plan' => $plan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plan $plan)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:3',

        ]);

        if (!$validator->fails()) {
            $sportTranslation = new PlanTranslation();
            $sportTranslation->title = $request->input('title');
            $sportTranslation->description = $request->input('description');
            $sportTranslation->language_id = $request->input('language');
            $sportTranslation->plan_id = $plan->id;
            $isSaved = $sportTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanTranslation  $planTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(PlanTranslation $planTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanTranslation  $planTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanTranslation $planTranslation)
    {
        //
        //
        $languages = Language::all();
        return response()->view('cms.plan.edit', ['planTranslation' => $planTranslation, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanTranslation  $planTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanTranslation $planTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'title' => 'required|string|min:3|',
            'description' => 'required|string|min:3',

        ]);

        if (!$validator->fails()) {
            $planTranslation->title = $request->input('title');
            $planTranslation->description = $request->input('description');
            $planTranslation->language_id = $request->input('language');
            $isSaved = $planTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanTranslation  $planTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanTranslation $planTranslation)
    {
        $count = PlanTranslation::where('plan_id', $planTranslation->plan_id)->count();
        if ($count != 1) {
            $deleted = $planTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
