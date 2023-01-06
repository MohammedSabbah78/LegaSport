<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->name ?? '-');
    }

    public function title(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->title ?? '-');
    }

    public function body(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->body ?? '-');
    }

    public function translations()
    {
        return $this->hasMany(TermTranslation::class, 'term_id', 'id');
    }
}
