<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Apm;
use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        // $last = DB::table('quiz_users')->where('user_id', Auth::user()->id)->latest('id')->first();
        $user = request()->user();
        $apm = Apm::where('user_id',$user->id)->orderBy('id','desc')->first();
        $now = Carbon::parse(now())->format('Y:m:d');
        $latest = Carbon::parse($apm->created_at)->format('Y:m:d');
        return view('index', ['data' => $apm,'user' => $user, 'latest' => $latest, 'now' => $now]);
    }

    public function indexQuiz()
    {
        $user = request()->user();
        $quizzes = $user->quiz_grade()->where('quizzes.status', 'Published')->paginate(10);
        return view('riwayat-quiz', compact('quizzes'));
    }

    public function showApm(Request $request)
    {
        $nilai = $request->get('nilai');

    }

    public function showQuiz($quizID)
    {
        $user = request()->user();
        $quiz = Quiz::find($quizID);
        if (!$quiz) {
            return redirect()->back()->with('status', 'Data quiz tidak ditemukan');
        }
        if($quiz->users()->where('status','Finished')->exists())
        {
            return redirect()->back()->with('status', 'Anda sudah mengisi quiz tersebut');
        }
        $questions = QuizQuestion::where('quiz_id', $quizID)->get();
        // $options = array();
        foreach ($questions as $q) {
            // array_push($options,$q->id);
            $options[$q->id] = array();
            $opt = QuestionOption::where('quiz_question_id', $q->id)->get();
            foreach ($opt as $key => $o) {
                $options[$q->id][] = $o;
            }
        }

        // return $options;
        return view('form', compact('questions', 'options','user','quizID'));
    }

    public function riwayatTest()
    {
        $users = User::find(Auth::user()->id)->quiz_grade()->get();
        // return $users;
        return view('riwayat', compact('users'));
    }

    public function showSleepKuisioner()
    {
        $user = request()->user();
        $now = Carbon::parse(now())->format('Y:m:d');
        if(Apm::where('user_id',$user->id)->where('test_date',$now)->whereNotNull('points')->orderBy('id','desc')->exists())
        {
            return redirect('/')->with('status','User sudah mengisi test hari ini');
        }
        return view('form-tidur',compact('user'));
    }
}
