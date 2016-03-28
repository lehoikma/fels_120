<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
