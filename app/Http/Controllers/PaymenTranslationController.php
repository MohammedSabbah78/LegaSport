<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Models\Language;
use App\Models\Paymen;
use App\Models\PaymenTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymenTranslationController extends Controller
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
    public function create(Paymen $paymen)
    {
        //
        $languages = Language::whereDoesntHave('PaymenTranslations', function ($query) use ($paymen) {
            $query->where('paymen_id', '=', $paymen->id);
        })->get();
        return response()->view('cms.paymen.create-lang', [
            'languages' => $languages,
            'paymen' => $paymen,
            'languages' => $languages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paymen $paymen)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $paymenTranslation = new PaymenTranslation();
            $paymenTranslation->name = $request->input('name');
            $paymenTranslation->language_id = $request->input('language');
            $paymenTranslation->paymen_id = $paymen->id;
            $isSaved = $paymenTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'CREATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymenTranslation  $paymenTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(PaymenTranslation $paymenTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymenTranslation  $paymenTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymenTranslation $paymenTranslation)
    {
        //
        $languages = Language::all();
        return response()->view('cms.paymen.edit', [
            'paymenTranslation' => $paymenTranslation,
            'languages' => $languages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymenTranslation  $paymenTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymenTranslation $paymenTranslation)
    {
        //
        $validator = Validator($request->all(), [
            'language' => 'required|numeric|exists:languages,id',
            'name' => 'required|string|min:3|max:30',
        ]);

        if (!$validator->fails()) {
            $paymenTranslation->name = $request->input('name');
            $paymenTranslation->language_id = $request->input('language');
            $isSaved = $paymenTranslation->save();
            return ControllersService::generateProcessResponse($isSaved, 'UPDATE');
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymenTranslation  $paymenTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymenTranslation $paymenTranslation)
    {
        //
        $count = PaymenTranslation::where('paymen_id', $paymenTranslation->paymen_id)->count();
        if ($count != 1) {
            $deleted = $paymenTranslation->delete();
            return ControllersService::generateProcessResponse($deleted, 'DELETE');
        }
        $deleted = false;
        return response()->json(
            ['status' => $deleted, 'message' => 'you can\'t delete,it have one translation'],
            Response::HTTP_BAD_REQUEST
        );
    }
}
