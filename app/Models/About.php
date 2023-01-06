<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->name ?? '-');
    }
    
    public function vision(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->vision ?? '-');
    }

    public function mission(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->mission ?? '-');
    }

    public function message(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->message ?? '-');
    }
    

    public function translations()
    {
        return $this->hasMany(AboutTranslation::class, 'about_id', 'id');
    }
}
