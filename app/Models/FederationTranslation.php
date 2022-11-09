<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederationTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id', 'city_id', 'country_id', 'sport_id'];

    public function federation()
    {
        return $this->belongsTo(Federation::class, 'federation_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(CityTranslation::class, 'city_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
