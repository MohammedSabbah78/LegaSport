<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->name ?? '-');
    }

    public function translations()
    {
        return $this->hasMany(DayTranslation::class, 'day_id', 'id');
    }

    public function center()
    {
        return $this->belongsToMany(Center::class, 'day_centers', 'day_id', 'center_id');
    }
}
