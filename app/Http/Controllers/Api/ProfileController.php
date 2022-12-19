<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllersService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResponse;
use App\Http\Resources\SuccessResponse;
use App\Http\Trait\CustomTrait;
use App\Models\Academy;
use App\Models\Coach;
use App\Models\Plan;
use App\Models\Player;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    use CustomTrait;
    public function player(Request $request){

        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        $valiidator = [
            'nationality_id' => 'required|numeric|exists:nationalities,id',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'birth_date' => 'required|date:Y-m-d',
            'gender' => 'required|string|in:M,F',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'position' => 'required|string',
            'max_fees' => 'required|numeric',
            'classefication' => 'required|string|in:pro,amateur',
            'isHaveClub' => 'required|boolean',
            'club_name' => 'nullable|string',
            'city_id' => 'required|numeric|exists:cities,id',
            'country_id' => 'required|numeric|exists:countries,id',
        ];

        $validator = Validator($request->all(),$valiidator);
        if (!$validator->fails()) {
            $user = auth()->user();
            $user->city_id = $request->get('city_id');
            $user->country_id = $request->get('country_id');
            $user->save();

            Player::updateOrCreate([
                'user_id' => $user->id
            ],[
                'nationality_id' => $request->get('nationality_id'),
                'image' => $this->uploadFile($request->file('image')),
                'birth_date' => $request->get('birth_date'),
                'gender' => $request->get('gender'),
                'height' => $request->get('height'),
                'width' => $request->get('width'),
                'position' => $request->get('position'),
                'max_fees' => $request->get('max_fees'),
                'classefication' => $request->get('classefication'),
                'isHaveClub' => $request->get('isHaveClub'),
                'club_name' => $request->get('club_name')
            ]);

            return response()->json(new SuccessResponse('SUCCESS_SEND',null,false));
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());

        }

    }


    public function coach(Request $request){


        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        $valiidator = [
            'nationality_id' => 'required|numeric|exists:nationalities,id',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'birth_date' => 'required|date:Y-m-d',
            'gender' => 'required|string|in:M,F',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'max_fees' => 'required|numeric',
            'classefication' => 'required|string|in:pro,amateur',
            'isHaveClub' => 'required|boolean',
            'club_name' => 'nullable|string',
            'Preferred_plan_type' => 'required|string',
            'traingin_type' => 'required|string',
            'traingin_certificates' => 'required|string',
            'city_id' => 'required|numeric|exists:cities,id',
            'country_id' => 'required|numeric|exists:countries,id',
        ];

        $validator = Validator($request->all(),$valiidator);
        if (!$validator->fails()) {
            $user = auth()->user();
            $user->city_id = $request->get('city_id');
            $user->country_id = $request->get('country_id');
            $user->save();

            Coach::updateOrCreate([
                'user_id' => $user->id
            ],[
                'nationality_id' => $request->get('nationality_id'),
                'image' => $this->uploadFile($request->file('image')),
                'birth_date' => $request->get('birth_date'),
                'gender' => $request->get('gender'),
                'height' => $request->get('height'),
                'width' => $request->get('width'),
                'max_fees' => $request->get('max_fees'),
                'classefication' => $request->get('classefication'),
                'isHaveClub' => $request->get('isHaveClub'),
                'Preferred_plan_type' => $request->get('Preferred_plan_type'),
                'traingin_type' => $request->get('traingin_type'),
                'traingin_certificates' => $request->get('traingin_certificates'),
                'club_name' => $request->get('club_name')
            ]);

            return response()->json(new SuccessResponse('SUCCESS_SEND',null,false));
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());

        }
        
    }

    public function academy(Request $request){

        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        $valiidator = [
            'nationality_id' => 'required|numeric|exists:nationalities,id',
            'date_establishment' => 'required|date:Y-m-d',
            'accept_gender' => 'required|string|in:M,F',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'num_sports' => 'required|numeric',
            'accrediation' => 'required|file|:pdf,docs,docx',
            'accdemy_conditions' => 'required|file|:pdf,docs,docx',
            'city_id' => 'required|numeric|exists:cities,id',
            'country_id' => 'required|numeric|exists:countries,id',

        ];
        $validator = Validator($request->all(),$valiidator);

        if (!$validator->fails()) {
            $user = auth()->user();
            $user->city_id = $request->get('city_id');
            $user->country_id = $request->get('country_id');
            $user->save();

            Academy::updateOrCreate([
                'user_id' => $user->id
            ],[
                'nationality_id' => $request->get('nationality_id'),
                'date_establishment' => $request->get('date_establishment'),
                'accept_gender' => $request->get('accept_gender'),
                'latitude' => $request->get('latitude'),
                'longitude' => $request->get('longitude'),
                'num_sports' => $request->get('num_sports'),
                'accrediation' => $this->uploadFile($request->file('accrediation')),
                'accdemy_conditions' => $this->uploadFile($request->file('accdemy_conditions')),
            ]);

            return response()->json(new SuccessResponse('SUCCESS_SEND',null,false));
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());

        }
        
    }


    public function card(){
        
    }

}
