<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];


    public function about()
    {
        return $this->belongsTo(About::class, 'about_id', 'id');
    }



    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
