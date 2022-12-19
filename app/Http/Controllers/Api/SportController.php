<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResponse;
use App\Http\Resources\SuccessResponse;
use App\Http\Resources\SportResource;
use App\Models\Language;
use App\Models\Sport;
use App\Models\SportTranslation;
use App\Models\SportUser;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function sports(Request $request){
        $selectLang = $request->header('lang') ?? config('app.locale');
        $lang = Language::where('code', $selectLang)->first();
        $data = SportTranslation::where('language_id',$lang->id)->get();
        return response()->json(new SuccessResponse('SUCCESS_GET',SportResource::collection($data)));
    }

    public function sportsChoose(Request $request){
        $validator = Validator($request->all(), [
            'sport_id' => 'required|string|exists:sports,id',
        ]);

        if (!$validator->fails()) {
            $sportUser = new SportUser();
            $sportUser->user_id = auth()->user()->id;
            $sportUser->sport_id = $request->input('sport_id');
            $sportUser->save();
            return response()->json(new SuccessResponse('SUCCESS_SEND',[],false));
        } else {
            return response()->json(new ErrorResponse('ERROR_SEND'));
        }

    }
}
