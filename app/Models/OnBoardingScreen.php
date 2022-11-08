<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnBoardingScreen extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->title ?? '-');
    }

    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ? __('cms.active_model') : __('cms.inActive_model'));
    }
    public function translations()
    {
        return $this->hasMany(OnBoardingScreenTranslation::class, 'on_boarding_screen_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'on_boarding_screen_id', 'id');
    }
}
