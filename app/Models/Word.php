<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Word extends Model
{
    protected $table = 'words';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wordAnswers()
    {
        return $this->hasMany(WordAnswer::class);
    }

    public function lessonWords()
    {
        return $this->hasMany(Lesson::class);
    }

    public function learnedWords()
    {
        return $this->hasMany(LearnedWord::class);
    }

    public static function createWord($request)
    {
        $wordCreateInput = $request->only('category', 'content');
        $newWord = Word::create();
        $newWord->category_id = $wordCreateInput['category'];
        $newWord->content = $wordCreateInput['content'];
        $newWord->save();
        return $newWord->id;
    }

    public static function getWordById($id)
    {
        $word = Word::find($id);
        return $word;
    }

    public static function editWord($id, $request)
    {
        $wordList = $request->only('content', 'category');
        $wordbyId = Word::find($id);
        if ($wordbyId) {
            $wordbyId->content = $wordList['content'];
            $wordbyId->category_id = $wordList['category'];
            return $wordbyId->save();
        }
        return false();
    }

    public static function deleteWord($id)
    {
        $deleteWord = Word::destroy($id);
        return $deleteWord;
    }

    public static function randomWord($id )
    {
        $config = config('common.lesson');
        $words = Category::find($id)->words()
            ->orderByRaw("RAND()")
            ->take($config['take'])->get();
        return $words;
    }
}
