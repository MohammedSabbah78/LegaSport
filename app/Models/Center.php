<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->name ?? '-');
    }

    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ? 'Active' : 'In-Active');
    }

    public function translations()
    {
        return $this->hasMany(CenterTranslation::class, 'center_id', 'id');
    }


    public function Days()
    {
        return $this->belongsToMany(Day::class, 'day_centers', 'center_id', 'day_id')->withPivot('start_time', 'close_time');
    }

    public function dayWorks()
    {
        return $this->hasMany(DayCenter::class);
    }
}
