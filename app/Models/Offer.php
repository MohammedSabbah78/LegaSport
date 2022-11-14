<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public function name(): Attribute
    {

        return new Attribute(get: fn () => $this->translations->first()->title ?? '-');
    }



    public function translations()
    {

        return $this->hasMany(OfferTranslation::class, 'offer_id', 'id');
    }
}
