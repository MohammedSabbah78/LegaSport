<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubTranslation extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['name', 'language_id'];

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }


    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
