<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordAnswer extends Model
{
    protected $table = 'word_answers';

    const STATUS_FALSE = 0;
    const STATUS_TRUE = 1;
    const KEY_CORRECT = 0;

    public function word()
    {
        return WordAnswer::belongsTo('App\Models\Word');
    }

    public static function createWordAnswer($request, $id)
    {
        $words  = $request->input('content_option');
        $correct = $request->input('correct');
        foreach ($words as $key => $word) {
            $newWordAnswer = WordAnswer::create();
            $newWordAnswer->word_id = $id;
            $newWordAnswer->content = $word;
            $newWordAnswer->status = WordAnswer::STATUS_FALSE;
            if ($key == $correct[WordAnswer::KEY_CORRECT]) {
               $newWordAnswer->status = WordAnswer::STATUS_TRUE;
            }
            $newWordAnswer->save();
        }
    }
}
