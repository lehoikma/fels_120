<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Lesson extends Model
{
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
}
