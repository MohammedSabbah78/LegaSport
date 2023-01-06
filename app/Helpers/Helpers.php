<?php

namespace App\Helpers;
use App\Http\Resources\ErrorResponse;
use App\Http\Resources\SuccessResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

if(!function_exists('uploadFile')){
    function uploadFile($file,$path = 'general'): string
    {
        $fileName = Str::random(4) . time() .explode('.',$file->hashName())[0]. "." . $file->getClientOriginalExtension();
        $file->storePubliclyAs('upload/'.$path.'/', $fileName);
        return 'upload/'.$path.'/' . $fileName;
    }
}

if(!function_exists('successRespons')){
    function successRespons($msg,$data = null){
        return response()->json(new SuccessResponse($msg,$data,!is_null($data)),Response::HTTP_OK);
    }
}

if(!function_exists('errorRespons')){
    function errorRespons($msg,){
        return response()->json(new ErrorResponse($msg),Response::HTTP_BAD_REQUEST);
    }
}

if(!function_exists('res')){
    function res($msg,$isSuccess,$data = null){
        if($isSuccess ){
            return successRespons($msg,$data);
        }
        return errorRespons($msg);
    }
}