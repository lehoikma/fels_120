<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UserWordController extends Controller
{
    public function getList()
    {
        return view('user.wordlist');
    }
}
