<?php

namespace App\Http\Controllers;

use App\Models\Apm;
use Carbon\Carbon;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    public function storeQuiz()
    {
        $validator = Validator::make(request()->all(),[
            'name' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d H:i|after_or_equal:today',
            'end_date' => 'required|date_format:Y-m-d H:i|after:start_date',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        Quiz::create([
            'name' => request('name'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
        ]);
        return redirect()->back()->with('status','Data quiz berhasil dibuat');
    }

    public function updateQuiz($quizID)
    {
        $validator = Validator::make(request()->all(),[
            'name' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d H:i|after_or_equal:today',
            'end_date' => 'required|date_format:Y-m-d H:i|after:start_date',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $quiz = Quiz::find($quizID);
        if(!$quiz)
        {
            return redirect()->back()->with('status','Data quiz tidak ditemukan');
        }
        $quiz->update([
            'name' => request('name'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
        ]);
        return redirect()->back()->with('status','Data quiz berhasil diupdate');
    }

    public function deleteQuiz($quizID)
    {
        $quiz = Quiz::find($quizID);
        if(!$quiz)
        {
            return redirect()->back()->with('status','Data quiz tidak ditemukan');
        }
        Quiz::destroy($quizID);
        return redirect()->back()->with('status','Data quiz berhasil dihapus');
    }

    public function updateQuizStatus($quizID)
    {
        $quiz = Quiz::find($quizID);
        if(!$quiz)
        {
            return redirect()->back()->with('status','Data quiz tidak ditemukan');
        }
        $quiz->status == 'Published' ? $quiz->update(['status' => 'Draft']) : $quiz->update(['status' => 'Published']);
        return redirect()->back()->with('status','Data quiz berhasil diupdate');
    }

    public function quizQuestions($quizID)
    {
        $quiz = Quiz::find($quizID);
        if(!$quiz)
        {
            return redirect()->back()->with('status','Data quiz tidak ditemukan');
        }
        $questions = QuizQuestion::where('quiz_id',$quizID)->get();
        return view('admin.quiz-question',compact('questions','quizID'));
    }

    public function storeQuestion($quizID)
    {
        $quiz = Quiz::find($quizID);
        if(!$quiz)
        {
            return redirect()->back()->with('status','Data quiz tidak ditemukan');
        }
        $validator = Validator::make(request()->all(),[
            'question' => 'required|string',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        QuizQuestion::create([
            'question' => request('question'),
            'quiz_id' => $quizID,
        ]);
        return redirect()->back()->with('status','Data question berhasil dibuat');
    }

    public function updateQuestion($questionID)
    {
        $question = QuizQuestion::find($questionID);
        if(!$question)
        {
            return redirect()->back()->with('status','Data question tidak ditemukan');
        }
        $validator = Validator::make(request()->all(),[
            'question' => 'required|string',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $question->update([
            'question' => request('question'),
        ]);
        return redirect()->back()->with('status','Data question berhasil diupdate');
    }

    public function deleteQuestion($questionID)
    {
        $question = QuizQuestion::find($questionID);
        if(!$question)
        {
            return redirect()->back()->with('status','Data question tidak ditemukan');
        }
        QuizQuestion::destroy($questionID);
        return redirect()->back()->with('status','Data question berhasil dihapus');
    }

    public function questionOptions($questionID)
    {
        $question = QuizQuestion::find($questionID);
        if(!$question)
        {
            return redirect()->back()->with('status','Data question tidak ditemukan');
        }
        $options = QuestionOption::where('quiz_question_id',$questionID)->get();
        return view('admin.question-options',compact('options','questionID'));
    }

    public function storeOption($questionID)
    {
        $question = QuizQuestion::find($questionID);
        if(!$question)
        {
            return redirect()->back()->with('status','Data question tidak ditemukan');
        }
        if(QuestionOption::where('quiz_question_id',$questionID)->count() > 3)
        {
            return redirect()->back()->with('status','Data options sudah terpenuhi');
        }
        if(request('status') > 4)
        {
            return redirect()->back()->with('status','Data status melebihi batas');
        }
        if(QuestionOption::where('quiz_question_id',$questionID)->where('status',request('status'))->exists())
        {
            return redirect()->back()->with('status','Data status options sudah ada');
        }
        $validator = Validator::make(request()->all(),[
            'option' => 'required|string',
            'status' => 'required|integer',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        QuestionOption::create([
            'option' => request('option'),
            'status' => request('status'),
            'quiz_question_id' => $questionID,
        ]);
        return redirect()->back()->with('status','Data options berhasil ditambahkan');
    }

    public function updateOption($optionID)
    {
        $option = QuestionOption::find($optionID);
        if(!$option)
        {
            return redirect()->back()->with('status','Data option tidak ditemukan');
        }
        if(QuestionOption::where('quiz_question_id',request('questionID'))->where('status',request('status'))->exists())
        {
            return redirect()->back()->with('status','Data status options sudah ada');
        }
        $validator = Validator::make(request()->all(),[
            'option' => 'required|string',
            // 'status' => 'required|integer',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $option->update([
            'option' => request('option'),
            // 'status' => request('status'),
        ]);
        return redirect()->back()->with('status','Data options berhasil diupdate');
    }

    public function deleteOption($optionID)
    {
        $option = QuestionOption::find($optionID);
        if(!$option)
        {
            return redirect()->back()->with('status','Data option tidak ditemukan');
        }
        QuestionOption::destroy($optionID);
        return redirect()->back()->with('status','Data options berhasil dihapus');
    }

    public function isUserHasTakeTheQuiz($user, $quizID){
        return $user->quiz_grade()->where('quiz_id', $quizID)->where('quiz_users.status', '===', 'Finished')->exists();
    }
    public function saveUserAnswers($user, $answer, $option){
        $user->quiz_answer()->attach($answer['option_id'], [
            'status' => $option->status,
        ]);

        return $user;
    }

    public function checkUserAnswer($user, $quiz, $answers){
        $totalTrueAnswer = 0;

        foreach ($answers as $answer) {
            $question = $quiz->quiz_questions()->where('id', $answer['question_id'])->first();
            $option = $question->question_options()->where('id', $answer['option_id'])->first();

            $this->saveUserAnswers($user, $answer, $option);

            $totalTrueAnswer += $option ? (int)$option->status : 0;
        }

        return $totalTrueAnswer;
    }

    public function submitAnswer($quizID)
    {
        $totalTrueAnswer = 0;
        $user = request()->user();
        $quiz = Quiz::find($quizID);
        if(!$quiz)
        {
            return redirect()->back()->with('status','Quiz tidak ditemukan');
        }
        if ($this->isUserHasTakeTheQuiz($user, $quizID)) {
            return redirect()->back()->with('status','Anda tidak tergabung dalam quiz manapun');
        }
        // $answers=array();
        // $questions=array();
        for($i = 0; $i < request('panjang'); $i++)
        {
            // array_push($answers,request('options').$i);
            // array_push($questions,request('questions').$i);
            $question = $quiz->quiz_questions()->where('id', request('questions'.$i))->first();
            // return $question;
            $option = $question->question_options()->where('id', request('options'.$i))->first();
            $user->quiz_answer()->attach(request('options'.$i), [
                'question_id' => $question->id,
            ]);
            $totalTrueAnswer += $option ? (int)$option->status : 0;
            $user->quiz_grade()->updateExistingPivot($quizID, ['grade' => $totalTrueAnswer, 'status' => 'Finished']);
        }

        return redirect('/riwayat-quiz')->with('status','Quiz berhasil diselesaikan');
    }

    public function storeSleepKuisioner()
    {
        $user = request()->user();
        $validator = Validator::make(request()->all(), [
            'sleep_start' => 'required|date',
            'sleep_end' => 'required|date|after:sleep_start',
        ]);
        $sleep_start = Carbon::parse(request('sleep_start'));
        $sleep_end = Carbon::parse(request('sleep_end'));
        $duration = $sleep_end->diffInHours($sleep_start, true);
        $time = Carbon::parse(now())->format('H:i:s');
        Apm::create([
            'user_id' => $user->id,
            'sleep_start' => $sleep_start,
            'sleep_end' => $sleep_end,
            'duration' => $duration.' jam',
            'test_date' => now(),
            'test_time' => $time,
            'created_at' => Carbon::now(),
            'updated_at' => NULL,
        ]);
        return redirect('/apm');
    }
}
