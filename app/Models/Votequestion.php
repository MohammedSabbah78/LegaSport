<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votequestion extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->title ?? '-');
    }


    public function translations()
    {
        return $this->hasMany(VotequestionTranslation::class, 'votequestion_id', 'id');
    }
}
