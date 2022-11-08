<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];

    public function achievement()
    {
        return $this->belongsTo(Achievement::class, 'achievement_id', 'id');
    }

    public function language()
    {

        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
