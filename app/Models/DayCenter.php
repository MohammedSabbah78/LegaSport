<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayCenter extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'close_time', 'day_id', 'store_id'];
    protected $casts = ['start_time' => 'datetime', 'close_time' => 'datetime',];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function startStoreTime(): Attribute
    {
        return new Attribute(get: fn () => $this->start_time);
    }
}
