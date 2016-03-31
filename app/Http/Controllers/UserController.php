<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

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

    public function getUpdateProfile()
    {
        $user = User::getCurrentUser();
        return view('user.setting', compact('user'));
    }

    public function postUpdateProfile(UserUpdateRequest $request)
    {
        if (User::updateUser($request)) {
            return redirect()->action('UserController@getIndex');
        }
        return redirect()->action('UserController@getUpdateProfile', ['messages' => trans('user/messages.edit_user_failed')]);
    }

    public function getList()
    {
        $users = User::all();
        return view('user.users', compact('users'));
    }

    public function getFollow($id)
    {
        $user = User::find($id);
        $userId = Auth::user()->id;
        $isFollowing = Follow::isFollowing($id, $userId);
        $arrfollow = ([
            'following_id' => $id,
            'follower_id' => Auth::user()->id,
        ]);
        $followCount = Follow::countFollowUser($arrfollow);
        return view('user.follow', ['user' => $user, 'isFollowing' => $isFollowing, 'followCount' => $followCount]);
    }

    public function postUnfollow(Request $request)
    {
        try {
            $followingIdExisting= $request->only('follower_id', 'following_id');
            Follow::unFollow($request);
            $isFollowingIdExisting = User::where('id', $followingIdExisting['following_id'])->count();
            $isFollowerIdExisting = User::where('id', $followingIdExisting['follower_id'])->count();
            if($isFollowingIdExisting && $isFollowerIdExisting) {
                $arrFollow = Follow::countFollowUser($request);
                return response()->json([
                    'success' => true,
                    'follower_count' => $arrFollow['follower_count'],
                    'following_count' => $arrFollow['following_count']
                ]);
            }
        }
        catch(Exception $e) {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function postFollow(Request $request)
    {
        try {
            $follow = Follow::follow($request);
            if($follow) {
                $arrFollow = Follow::countFollowUser($request);
                $isFollowingIdExisting = User::where('id', $follow['following_id'])->count();
                $isFollowerIdExisting = User::where('id', $follow['follower_id'])->count();
                if ($isFollowingIdExisting && $isFollowerIdExisting) {
                    return response()->json([
                        'success' => true,
                        'follower_count' => $arrFollow['follower_count'],
                        'following_count' => $arrFollow['following_count'],
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } catch(Exception $e) {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
