<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ? 'Active' : 'In-Active');
    }

    public function isRtlKey(): Attribute
    {
        return new Attribute(get: fn () => $this->is_rtl ? 'RTL' : 'LTR');
    }

    public function countryTranslations()
    {
        return $this->hasMany(CountryTranslation::class, 'language_id', 'id');
    }


    public function cityTranslations()
    {
        return $this->hasMany(CityTranslation::class, 'language_id', 'id');
    }


    public function onBoardingScreenTranslations()
    {
        return $this->hasMany(OnBoardingScreenTranslation::class, 'language_id', 'id');
    }


    public function sportTranslations()
    {
        return $this->hasMany(SportTranslation::class, 'language_id', 'id');
    }
}
