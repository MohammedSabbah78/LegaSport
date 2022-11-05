<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnBoardingScreenTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'language_id'];

    public function onBoardingScreen()
    {
        return $this->belongsTo(OnBoardingScreen::class, 'on_boarding_screen_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
