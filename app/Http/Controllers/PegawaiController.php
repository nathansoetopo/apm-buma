<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        //return view('index');
        //$user = User::find(Auth::user()->id)->orderBy('created_at')->first();
        $last = DB::table('quiz_users')->where('user_id', Auth::user()->id)->latest('id')->first();
        return view('index', ['data' => $last]);
    }

    public function riwayatTest(){
        $user = User::find(Auth::user()->id)->quiz_grade()->paginate(5);
        return view("riwayat", ["user"=>$user]);
    }
}
