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
        $addUser = new User;
        $addUser->name = $userCreateInput['name'];
        $addUser->email = $userCreateInput['email'];
        $addUser->password = $userCreateInput['password'];
        $addUser->role = $userCreateInput['role'];
        return $addUser->save();
    }

    public static function editUser($id, $request)
    {
        $getUser = $request->all();
        $name = $getUser['name'];
        $pass = $getUser['password'];
        $editUser = new User();
        $getUserbyId = $editUser->find($id);
        if (empty($getUserbyId)) {
            return false;
        }
        $getUserbyId->name = $name;
        $getUserbyId->password = $pass;
        return $getUserbyId->save();
    }

    public static function registerUser($request)
    {
        $pass = $request->input('password');
        $email = $request->input('email');
        $register = new User;
        $register->password = $pass;
        $register->email = $email;
        $register->role = User::ROLE_MEMBER;
        return $register->save();
    }
    public static function deleteUser($id)
    {
        $deleteUser = User::find($id);
        if (empty($deleteUser)) {
            return redirect()->action('UserController@getLogin');
        }
        return $deleteUser->delete();
    }
}
