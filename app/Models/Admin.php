<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        // 'password',
    ];


    public function userName(): Attribute
    {
        return new Attribute(get: fn () => $this->name);
    }


    public function activeKey(): Attribute
    {
        return new Attribute(get: fn () => $this->active ? __('cms.active_model') : __('cms.inActive_model'));
    }
    public function genderKey(): Attribute
    {
        return new Attribute(get: fn () => $this->gender == 'M' ? 'Male' : 'Female');
    }
}
