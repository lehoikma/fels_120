<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\LessonWord;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\FilterRequest;
use Auth;

class UserWordController extends Controller
{
    public function getList()
    {
        $category = Category::all();
        return view('user.word_list', compact('category'));
    }

    public function postList(FilterRequest $request)
    {
        $config = config('common.lesson');
        $category = Category::all();
        $dataFilter = $request->only('categoryId', 'conditional');
        $userId = Auth::user()->id;
        if ($dataFilter['conditional'] == $config['conditionalAll']) {
            $words = Category::find($dataFilter['categoryId'])->words;
        } else {
            $words = Word::isLearned($userId, $dataFilter['categoryId'], $dataFilter['conditional'] );
        }
        return view('user.word_list', compact('category', 'words', 'dataFilter'));
    }
}

