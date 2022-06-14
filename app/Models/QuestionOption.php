<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;
    protected $table = 'question_options';
    protected $guarded = ['id'];

    // protected $hidden = ['status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'question_option_users', 'option_id', 'user_id')->withPivot('status', 'question_id')->withTimestamps();
    }

    public function quiz_questions()
    {
        return $this->belongsTo(QuizQuestion::class,'quiz_question_id');
    }

}
