<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotequestionTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id', 'votequestion_id'];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function votequestion()
    {
        return $this->belongsTo(Votequestion::class, 'votequestion_id', 'id');
    }
}
