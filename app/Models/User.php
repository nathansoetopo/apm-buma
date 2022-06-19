<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function quiz_grade()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_users', 'user_id', 'quiz_id')->withPivot('grade', 'status', 'start_time')->withTimestamps();
    }

    public function quiz_answer()
    {
        return $this->belongsToMany(QuestionOption::class, 'question_option_users', 'user_id', 'option_id')->withPivot('question_id')->withTimestamps();
    }

    public function apm()
    {
        return $this->hasMany(Apm::class);
    }
}
