<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];


    public function Office()
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }


    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
