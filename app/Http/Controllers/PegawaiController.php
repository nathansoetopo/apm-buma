<?php

namespace App\Http\Controllers;

use App\Models\QuestionOption;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function indexQuiz()
    {
        $user = request()->user();
        $quizzes = $user->quiz_grade()->where('quizzes.status','Published')->paginate(10);
        return view('riwayat-quiz',compact('quizzes'));
        // $quizzes = Quiz::where('status','Published')->paginate(10);
    }

    public function showQuiz($quizID)
    {
        $quiz = Quiz::find($quizID);
        if(!$quiz)
        {
            return redirect()->back()->with('status','Data quiz tidak ditemukan');
        }
        $questions = QuizQuestion::where('quiz_id',$quizID)->get();
        // $options = array();
        foreach($questions as $q)
        {
            // array_push($options,$q->id);
            $options[$q->id] = array();
            $opt = QuestionOption::where('quiz_question_id',$q->id)->get();
            foreach($opt as $key => $o)
            {
                $options[$q->id][] = $o;
            }
        }
        
        // return $options;
        return view('form',compact('questions','options'));
    }
    
    public function riwayatTest(){
        $user = User::find(Auth::user()->id)->quiz_grade()->get();
        return view("riwayat", ["user"=>$user]);
     }
}
