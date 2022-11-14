<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Day;
use App\Models\DayTranslation;
use Illuminate\Http\Request;

class DayController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Day::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Day::with('translations')->withCount('translations')->get();
        return view('cms.days.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $languages = Language::all();
        // return view('cms.days.create',['languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $day = new Day;
            $isSaved = $day->save();
            $isSaved ? $day->translations()->create([
                'name' => $request->input('name'),
                'language_id' => $request->input('language')
            ]) : $day->delete();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(Day $day)
    {

        $deleted = $day->delete();
        if ($deleted) {
            $translations = DayTranslation::where('day_id', $day->id)->get();
            foreach ($translations as $translation) {
                $translation->delete();
            }
        }
        return ControllersService::generateProcessResponse($deleted, 'DELETE');
    }
}
