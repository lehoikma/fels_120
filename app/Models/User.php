<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
use Auth;

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

    public static function createUser($request)
    {
        $userCreateInput = $request->only('name', 'email', 'password', 'role');
        $newUser = new User;
        $newUser->name = $userCreateInput['name'];
        $newUser->email = $userCreateInput['email'];
        $newUser->password = $userCreateInput['password'];
        $newUser->role = $userCreateInput['role'];
        return $newUser->save();
    }

    public static function editUser($id, $request)
    {
        $listUser = $request->all();
        $name = $listUser['name'];
        $pass = $listUser['password'];
        $newUser = new User();
        $listUserbyId = $newUser->find($id);
        if (empty($listUserbyId)) {
            return false;
        }
        $listUserbyId->name = $name;
        $listUserbyId->password = $pass;
        return $listUserbyId->save();
    }

    public static function registerUser($request)
    {
        $pass = $request->input('password');
        $email = $request->input('email');
        $newUser = new User;
        $newUser->password = $pass;
        $newUser->email = $email;
        $newUser->role = User::ROLE_MEMBER;
        return $newUser->save();
    }

    public static function deleteUser($id)
    {
        $deleteUser = User::find($id);
        if (empty($deleteUser)) {
            return false;
        }
        return $deleteUser->delete();
    }
}
