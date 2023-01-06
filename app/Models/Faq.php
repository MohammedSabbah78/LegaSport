<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->qs ?? '-');
    }

    public function qs(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->qs ?? '-');
    }

    public function answer(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->answer ?? '-');
    }
    public function translations()
    {
        return $this->hasMany(FaqTranslation::class, 'faqs_id', 'id');
    }
}
