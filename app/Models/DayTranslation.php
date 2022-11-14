<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'language_id'];
    public function day()
    {
        return $this->belongsTo(Day::class);
    }


    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
