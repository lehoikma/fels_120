<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function getIndex()
    {
        return view('user.home');
    }

    public function getLogin()
    {
        return view('user.login');
    }

    public function postLogin(UserLoginRequest $request)
    {
        $input = $request->only('email', 'password');
        if (Auth::attempt($input)) {
            if (Auth::user()->role == User::ROLE_ADMIN) {
                return redirect()->action('AdminController@getIndex');
            }
            return redirect()->action('UserController@getIndex');
        }
        return view('user.login', ['messages' => trans('user/messages.login_failed')]);
    }

    public function getRegister()
    {
        return view('user.register');
    }

    public function postRegister(UserRegisterRequest $request)
    {
        if (User::registerUser($request)) {
            return redirect()->action('UserController@getLogin');
        }
        return redirect()->action('UserController@getRegister', ['messages' => trans('user/messages.regiter_user_failed')]);
    }
}
