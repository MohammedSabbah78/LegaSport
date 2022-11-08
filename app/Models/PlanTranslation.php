<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'language_id'];

    public function achievement()
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function language()
    {

        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
