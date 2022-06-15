<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $guarded = ['id'];

    public function quiz_questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'quiz_users', 'quiz_id', 'user_id')->withPivot(['grade', 'start_time', 'status'])->withTimestamps();
    }
}
