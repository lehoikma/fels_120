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
    public function getIndex() {
        return view('user.home');
    }

    public function getLogin() {
        return view('user.login');
    }

    public function postLogin(UserLoginRequest $request) {
        $input = $request->only('email', 'password');
        // check email & pasword
        if (Auth::attempt($input)) {
            // Check role
            if (Auth::user()->role == User::ROLE_ADMIN) {
                return redirect()->action('AdminController@getIndex');
            }
                return redirect()->action('UserController@getIndex');
        }
        return view('user.login', ['messages' => trans('user/messages.login_failed')]);
    }

    // Đăng ký tài khoản
    public function getRegister() {
        return view('user.register');
    }

    public function postRegister(UserRegisterRequest $request) {
        $pass = $request->input('password');
        $email = $request->input('email');
        $register = new User;
        $register->password = $pass;
        $register->email = $email;
        $register->role = User::ROLE_MEMBER;
        $register->save();
        return redirect()->action('UserController@getLogin');
    }
}
