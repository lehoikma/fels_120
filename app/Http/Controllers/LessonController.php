<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonCreateRequest;
use App\Http\Requests\LessonEditRequest;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\LessonWord;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LessonController extends Controller
{
    public function getCreate($id)
    {
        DB::begintransaction();
        try
        {
            $userId = Auth::user()->id;
            $lessonCreate = Lesson::createLesson($userId, $id);
            $words = Word::randomWord($id);
            $lessonWords = LessonWord::createLessWord($words, $lessonCreate);
            $category = Category::find($id);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
        DB::commit();
        return view('user.lesson_word', compact('words', 'category', 'lessonWords', 'lessonCreate'));
    }

    public function postCreate()
    {
        $input = Input::all();
        if (!empty($input['result'])) {
            foreach ($input['result'] as $key => $value) {
                Lesson::updateLesson($key, $value);
            }
            return redirect()->action('LessonController@getResult', $input['lesson']);
        }
        return back()->withErrors(['msgLesson', trans('text.msgLesson')]);
    }

    public function getResult($id)
    {
        $lessonWords = Lesson::find($id)->lessonWords;
        return view('user.lesson_result', compact('lessonWords'));
    }
}
