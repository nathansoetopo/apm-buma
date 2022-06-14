<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function indexQuiz()
    {
        $quizzes = Quiz::all();
        return view('admin.index-quiz',compact('quizzes'));
    }
}
