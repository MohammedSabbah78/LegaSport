<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayOffice extends Model
{
    use HasFactory;


    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function startStoreTime(): Attribute
    {
        return new Attribute(get: fn () => $this->start_time);
    }
}
