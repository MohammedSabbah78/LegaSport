<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;


    public function name(): Attribute
    {

        return new Attribute(get: fn () => $this->translations->first()->name ?? '-');
    }


    public function address1(): Attribute
    {

        return new Attribute(get: fn () => $this->translations->first()->address1 ?? '-');
    }

    public function address2(): Attribute
    {

        return new Attribute(get: fn () => $this->translations->first()->address2 ?? '-');
    }
    public function translations()
    {

        return $this->hasMany(OfficeTranslation::class, 'office_id', 'id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }


    public function Days()
    {
        return $this->belongsToMany(Day::class, 'day_offices', 'office_id', 'day_id')->withPivot('work_from', 'work_to');
    }

    
}
