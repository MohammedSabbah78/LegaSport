<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];


    public function faqs()
    {
        return $this->belongsTo(Faq::class, 'faqs_id', 'id');
    }
    
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
