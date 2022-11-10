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
        return new Attribute(get: fn () => $this->active ? __('cms.active_model') : __('cms.inActive_model'));
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

    public function achievementTranslation()
    {
        return $this->hasMany(AchievementTranslation::class, 'language_id', 'id');
    }

    public function palnTranslation()
    {
        return $this->hasMany(PlanTranslation::class, 'language_id', 'id');
    }


    public function centerTranslation()
    {
        return $this->hasMany(CenterTranslation::class, 'language_id', 'id');
    }
    public function nationalityTranslations()
    {
        return $this->hasMany(NationalityTranslation::class, 'language_id', 'id');
    }

    public function eventTranslations()
    {
        return $this->hasMany(EventTranslation::class, 'language_id', 'id');
    }

    public function federationTranslations()
    {
        return $this->hasMany(FederationTranslation::class, 'language_id', 'id');
    }

    public function partnerTranslations()
    {
        return $this->hasMany(PartnerTranslation::class, 'language_id', 'id');
    }

    public function clubTranslations()
    {
        return $this->hasMany(ClubTranslation::class, 'language_id', 'id');
    }
}
