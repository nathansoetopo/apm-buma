<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Apm;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Location;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index()
    {
        // $last = DB::table('quiz_users')->where('user_id', Auth::user()->id)->latest('id')->first();
        $user = request()->user();
        $apm = Apm::where('user_id',$user->id)->orderBy('id','desc')->first();
        if($apm){
            $now = Carbon::parse(now())->format('Y:m:d');
            $latest = Carbon::parse($apm->created_at)->format('Y:m:d');
            return view('index', ['data' => $apm,'user' => $user, 'latest' => $latest, 'now' => $now]);
        }else{
            return view('index', ['data' => $apm,'user' => $user]);
        }
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
        if(!$user->locations()->where('range','!=',null)->whereDate('waktu_scan',Carbon::today())->exists())
        {
            return redirect('/')->with('status','anda belum melakukan scanning lokasi');
        }
        $now = Carbon::parse(now())->format('Y:m:d');
        if(Apm::where('user_id',$user->id)->where('test_date',$now)->whereNotNull(['updated_at'])->orderBy('id','desc')->exists())
        {
            return redirect('/')->with('status','User sudah mengisi test hari ini');
        }
        return view('form-tidur',compact('user'));
    }

    public function scanLokasiDetail($locationID)
    {
        $user = request()->user();
        if (!$user->hasRole('pegawai')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect('/satpam')->with('status','User tidak punya kewenangan');
        }
        $lokasi = Location::find($locationID);
        if(!$lokasi)
        {
            return redirect()->back()->with('status','Lokasi tidak ditemukan');
        }
        return view('detail-lokasi',compact('user','lokasi'));
    }

    public function scanLokasiSubmit($locationID)
    {
        $user = request()->user();
        if (!$user->hasRole('pegawai')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect('/satpam')->with('status','User tidak punya kewenangan');
        }
        $barcode = Location::find($locationID);
        // $dateNow = Carbon::now();
        // $now = Carbon::parse(now())->format('H:i:s');
        // $check = $user->barcodes()->where('barcodes.id',$barcodeID)->where('attachment','!=',null)->count();
        // return $check;
        if($user->locations()->where('locations.id',$locationID)->where('range','!=',null)->whereDate('waktu_scan',Carbon::today())->count() > 1)
        {
            return redirect('/')->with('status','anda sudah melakukan scanning di titik ini');
        }


        $earthRadius = 6371000;
        $myLatitude = request()->latitude;
        $myLongitude = request()->longitude;
        $latFrom = deg2rad($barcode->latitude);
        $lonFrom = deg2rad($barcode->longitude);
        $latTo = deg2rad($myLatitude);
        $lonTo = deg2rad($myLongitude);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        $range = $angle * $earthRadius;
        if ($range > 50) {
            $barcode->users()->attach($user->id, [
                'range' => $range,
                'status' => 'OUT OF RANGE',
                'waktu_scan' => Carbon::now(),
            ]);
            // return ResponseFormatter::success($barcode, 'Data laporan berhasil terupload');
            return redirect('/')->with('status', 'Data laporan berhasil terupload');
        } elseif ($range <= 50) {
            $barcode->users()->attach($user->id, [
                'range' => $range,
                'status' => 'IN RANGE',
                'waktu_scan' => Carbon::now(),
            ]);
            // return ResponseFormatter::success($barcode, 'Data laporan berhasil terupload');
            return redirect('/')->with('status', 'Data laporan berhasil terupload');
        }
    }
}
