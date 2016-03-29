<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class UserCategoryController extends Controller
{
    public function getList()
    {
        $categoryList = Category::all();
        return view('user.category', ['categoryList' => $categoryList]);
    }
}
