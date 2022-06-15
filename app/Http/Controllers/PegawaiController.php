<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function riwayatTest(){
        $user = User::find(Auth::user()->id)->quiz_grade()->get();
        return view("riwayat", ["user"=>$user]);
    }
}
