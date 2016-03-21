<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function() {
    Route::controller('/user', 'UserController');
});
Route::group(['prefix' => '/user', 'middleware' => ['web', 'auth', 'role:'.App\Models\User::ROLE_MEMBER]], function () {
    Route::get('/index', 'UserController@getIndex');
});
Route::group(['prefix' => '/admin', 'middleware' => ['web', 'auth', 'role:'.App\Models\User::ROLE_ADMIN]], function () {
    Route::get('/index', 'AdminController@getIndex');
    Route::controller('/user', 'AdminController');
    Route::controller('/category', 'CategoryController');
});
