<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MercatoTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];


    public function mercato()
    {
        return $this->belongsTo(Mercato::class, 'mercato_id', 'id');
    }



    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
