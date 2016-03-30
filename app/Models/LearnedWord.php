<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnedWord extends Model
{
    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
