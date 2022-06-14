<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $table = "quiz_questions";
    protected $guarded = ['id'];

    public function question_options()
    {
        return $this->hasMany(QuestionOption::class, 'quiz_question_id');
    }

    public function quizzes()
    {
        return $this->belongsTo(Quiz::class,'quiz_id');
    }
}
