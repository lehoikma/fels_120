<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonWord extends Model
{
    protected $table = 'lesson_words';

    protected $fillable = ['word_id', 'lesson_id', 'word_answer_id'];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function wordAnswer()
    {
        return $this->belongsTo(WordAnswer::class);
    }

    public static function createLessWord($words, $lessonCreate)
    {
        $lessonWords = [];
        foreach($words as $word) {
            $lessonWords[] = LessonWord::create([
                'word_id' => $word->id,
                'lesson_id' => $lessonCreate->id,
            ]);
        }
        return $lessonWords;
    }
}
