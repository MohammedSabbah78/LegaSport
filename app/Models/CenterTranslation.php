<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];

    public function Center()
    {
        return $this->belongsTo(Center::class, 'center_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
