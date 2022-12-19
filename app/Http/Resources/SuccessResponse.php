<?php

namespace App\Http\Resources;

use App\Helpers\Messages;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResponse extends JsonResource
{

    public $msg,$data,$isData;
    public function __construct($msg,$data = null,$isData = true)
    {
        $this->msg = $msg;
        $this->data = $data;
        $this->isData = $isData;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // dd(parent::toArray($request));
        // if (parent::toArray($request)) {
        //     return [
        //         'status' => true,
        //         'message' => Messages::getMessage($this->msg),
        //         'data' => []
        //     ];
        // }
        return [
            'status' => true,
            'message' => Messages::getMessage($this->msg),
            'data' => $this->when($this->isData,$this->data)
        ];
    }
}
