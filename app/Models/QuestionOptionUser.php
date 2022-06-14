<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOptionUser extends Model
{
    use HasFactory;
    protected $table = 'question_option_user';
    protected $guarded = ['id'];
    // protected $hidden = ['status'];
}
