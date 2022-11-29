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



    public function translations()
    {

        return $this->hasMany(OfficeTranslation::class, 'office_id', 'id');
    }

    public function Days()
    {
        return $this->belongsToMany(Day::class, 'day_offices', 'office_id', 'day_id')->withPivot('work_from', 'work_to');
    }
}
