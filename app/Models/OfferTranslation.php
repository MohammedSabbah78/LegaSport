<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];


    public function Offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }


    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
