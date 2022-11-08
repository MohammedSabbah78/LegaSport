<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    public function name(): Attribute
    {
        return new Attribute(get: fn () => $this->translations->first()->name ?? '-');
    }

    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ? __('cms.active_model') : __('cms.inActive_model'));
    }

    public function translations()
    {
        return $this->hasMany(NationalityTranslation::class, 'nationality_id', 'id');
    }
}
