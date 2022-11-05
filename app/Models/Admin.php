<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles;
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
        return new Attribute(get: fn () => $this->active ? 'Active' : 'In-Active');
    }

    public function genderKey(): Attribute
    {
        return new Attribute(get: fn () => $this->gender == 'M' ? 'Male' : 'Female');
    }
}
