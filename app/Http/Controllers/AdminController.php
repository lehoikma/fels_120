<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.home');
    }

    public function getCreateUser()
    {
        return view('admin.user_add');
    }

    public function postCreateUser(UserCreateRequest $request)
    {
        if (User::createUser($request)) {
            return redirect()->action('AdminController@getListUser');
        }
        return redirect()->action('AdminController@getCreateUser', ['messages'=>trans('user/messages.create_user_failed')]);
    }

    public function getListUser()
    {
        $userAll = User::all();
        return view('admin.user_list', ['getListUser' => $userAll]);
    }

    public function getEditUser($id)
    {
        $getUserId = User::find($id);
        if (empty($getUserId)) {
            return redirect()->action('AdminController@getListUser');
        }
        return view('admin.user_edit', ['editUserId' => $getUserId]);
    }

    public function postEditUser($id, UserEditRequest $request)
    {
        if (User::editUser($id, $request)) {
            return redirect()->action('AdminController@getListUser');
        }
        return redirect()->action('AdminController@getCreateUser', ['messages'=>trans('user/messages.edit_user_failed')]);
    }

    public function getDeleteUser($id)
    {
        if (User::deleteUser($id)) {
            return redirect()->action('AdminController@getListUser');
        }
        return redirect()->action('AdminController@getCreateUser', ['messages'=>trans('user/messages.delete_user_failed')]);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->action('UserController@getLogin');
    }
}
