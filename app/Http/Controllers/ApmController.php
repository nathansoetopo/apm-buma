<?php

namespace App\Http\Controllers;

use App\Models\Apm;
use Illuminate\Http\Request;

class ApmController extends Controller
{
    public function index()
    {
        $user = request()->user();
        $apm = Apm::where('user_id',$user->id)->orderBy('id','desc')->first();
        return view('apm',compact('apm'));
    }
}
