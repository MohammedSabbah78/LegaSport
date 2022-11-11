<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponserTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];


    public function Sponser()
    {
        return $this->belongsTo(Sponser::class, 'sponser_id', 'id');
    }


    public function Partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function Event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }


    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
