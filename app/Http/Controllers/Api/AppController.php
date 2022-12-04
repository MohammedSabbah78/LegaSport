<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\LangResource;
use App\Http\Resources\NationalityResource;
use App\Http\Resources\OnBordingResource;
use App\Http\Resources\SuccessResponse;
use App\Models\CityTranslation;
use App\Models\Country;
use App\Models\CountryTranslation;
use App\Models\Language;
use App\Models\NationalityTranslation;
use App\Models\OnBoardingScreenTranslation;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    public function countries(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $data = CountryTranslation::where('language_id',$lang->id)->get();
        return response()->json(new SuccessResponse('SUCCESS_GET',CountryResource::collection($data)));
    }

    public function cities(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();
        $data = CityTranslation::where('language_id',$lang->id)->get();

        return response()->json(new SuccessResponse('SUCCESS_GET',CityResource::collection($data)));
    }

    public function languages(Request $request){

        $data = Language::where('active', true)->get();
        return response()->json(new SuccessResponse('SUCCESS_GET',LangResource::collection($data)));
    }

    public function nationalites(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();
        $data = NationalityTranslation::where('language_id', $lang->id)->get();
        return response()->json(new SuccessResponse('SUCCESS_GET',NationalityResource::collection($data)));
    }

    public function analyticsUser(Request $request){
        $player = User::where('type', 'player')->count();
        $coach = User::where('type', 'coach')->count();
        $academy = User::where('type', 'academy')->count();
        return response()->json(new SuccessResponse('SUCCESS_GET',[
            'player' => $player,
            'coach' => $coach,
            'academy' => $academy
        ]));
    }

    public function onBording(Request $request, Country $country){
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();
        $data = OnBoardingScreenTranslation::where('language_id', $lang->id)->whereHas('onBoardingScreen',function($q) use($country){
            $q->where('country_id',$country->id);
        })->get();
        return response()->json(new SuccessResponse('SUCCESS_GET',OnBordingResource::collection($data)));
    }
}
