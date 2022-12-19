<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class OnBordingResource extends JsonResource
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
            'id' => $this->onBoardingScreen->id,
            'title' => $this->title,
            'body' => $this->body,
            'order' => $this->onBoardingScreen->ordering_screen,
            'image' => Storage::url($this->onBoardingScreen->image),
            'ads' => AdsResource::collection($this->onBoardingScreen->ads)
        ];
    }

}
