<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicieTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];


    public function club()
    {
        return $this->belongsTo(Policie::class, 'policie_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
