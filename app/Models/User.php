<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    const ROLE_ADMIN = 1;
    const ROLE_MEMBER = 2;

    protected $fillable = ['name', 'email', 'password', 'avatar', 'role'];

    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
