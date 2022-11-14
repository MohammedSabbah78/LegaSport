<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ? __('cms.active_model') : __('cms.inActive_model'));
    }

    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->name ?? '-');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function translations()
    {
        return $this->hasMany(CityTranslation::class, 'city_id', 'id');
    }


    public function office()
    {
        return $this->belongsTo(OfficeTranslation::class, 'city_id', 'id');
    }
}
