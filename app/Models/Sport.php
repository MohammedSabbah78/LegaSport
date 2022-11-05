<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->title ?? '-');
    }

    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ? 'Active' : 'In-Active');
    }
    
    public function translations()
    {
        return $this->hasMany(SportTranslation::class, 'sport_id', 'id');
    }
}
