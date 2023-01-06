<?php

namespace App\Http\Resources\General;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeResource extends JsonResource
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
            'name' => $this->name,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'work_time' => "{$this->work_from} - {$this->work_to}",
            'work_from' => $this->work_from,
            'work_to' => $this->work_to,
            'country' => [
                'id' => $this->country->id,
                'name' => $this->country->name,
            ]
        ];
    }
}
