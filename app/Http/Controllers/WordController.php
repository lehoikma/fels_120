<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Word;
use App\Models\WordAnswer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\WordCreateRequest;
use App\Http\Requests\WordEditRequest;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    public function getCreate()
    {
        $categoryList = Category::all();
        return view('admin.word_add', ['categoryList' => $categoryList]);
    }

    public function postCreate(WordCreateRequest $request)
    {
        DB::begintransaction();
        try
        {
            $wordId = Word::createWord($request);
            if ($wordId) {
                $createWordAnswer = WordAnswer::createWordAnswer($request, $wordId);
                if ($createWordAnswer) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }
            } else {
                DB::rollBack();
            }
        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
        return redirect()->action('WordController@getList');
    }

    public function getList()
    {
        $wordAll = Word::all();
        return view('admin/word_list', ['wordAll' => $wordAll]);
    }

    public function getEdit($id)
    {
        $word = Word::getWordById($id);
        $categoryAll = Category::all();
        return view('admin/word_edit', ['word' => $word, 'categoryAll'=> $categoryAll]);
    }

    public function postEdit($id, WordEditRequest $request)
    {
        if (Word::editWord($id, $request)) {
            return redirect()->action('WordController@getList');
        }
        return redirect()->action('WordController@getCreate', ['messages' => trans('word/messages.edit_word_failed')]);
    }

    public function getDelete($id)
    {
        if (Word::deleteWord($id)) {
            return redirect()->action('WordController@getList');
        }
        return redirect()->action('WordController@getList', ['messages' => trans('word/messages.delete_word_failed')]);
    }
}
