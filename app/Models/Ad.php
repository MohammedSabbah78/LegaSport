<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Ad extends Model
{
    use HasFactory;

    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ?__('cms.active_model') : __('cms.inActive_model'));
    }


    public function onBoarding()
    {
        return $this->belongsTo(OnBoardingScreen::class, 'on_boarding_screen_id', 'id');
    }
}
