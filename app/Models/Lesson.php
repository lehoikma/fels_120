<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = ['user_id','category_id'];

    public function activies()
    {
        return $this->hasMany(Activies::class);
    }

    public function lessonWords()
    {
        return $this->hasMany(LessonWord::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createLesson($userId, $categoryId)
    {
        return Lesson::create([
            'user_id' => $userId,
            'category_id' => $categoryId,
        ]);
    }

    public static function updateLesson($key, $value)
    {
        return LessonWord::where('id', $key)
            ->update(['word_answer_id' => $value]);
    }
}
