<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "type" => $this->type,
            "certification_account" => boolval($this->certification_account),
            "name" => $this->name,
            "email" => $this->email,
            "mobile" => $this->mobile,
            "language_id" => [
                'id' => $this->language->id,
                'code' => $this->language->code,
                'name' => $this->language->name
            ],
            'token' => $this->token,
        ];
    }
}
