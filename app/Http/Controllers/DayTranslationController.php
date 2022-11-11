<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Day;
use App\Models\DayTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DayTranslationController extends Controller
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
    public function create(Day $day)
    {
        //
        $languages = Language::whereDoesntHave('dayTranslations', function ($query) use ($day) {
            $query->where('day_id', '=', $day->id);
        })->get();
        return view('cms.days.create', ['languages' => $languages, 'day' => $day]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Day $day)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $dayTranslation = new DayTranslation;
            $dayTranslation->name = $request->input('name');
            $dayTranslation->language_id = $request->input('language');
            $dayTranslation->day_id = $day->id;
            $isSaved = $dayTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DayTranslation  $dayTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(DayTranslation $dayTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DayTranslation  $dayTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(DayTranslation $dayTranslation)
    {
        //
        $languages = Language::all();
        return view('cms.days.edit', ['languages' => $languages, 'day' => $dayTranslation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DayTranslation  $dayTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DayTranslation $dayTranslation)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $dayTranslation->name = $request->input('name');
            $dayTranslation->language_id = $request->input('language');
            $isSaved = $dayTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DayTranslation  $dayTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DayTranslation $dayTranslation)
    {
        $count = DayTranslation::where('day_id', $dayTranslation->day_id)->count();

        if ($count != 1) {
            $deleted = $dayTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }

        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
