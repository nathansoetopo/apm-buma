<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Apm;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function update()
    {
        $user = request()->user();
        $now = Carbon::parse(now())->format('Y:m:d');
        $apm = Apm::where('user_id',$user->id)->where('test_date',$now)->whereNull('points')->orderBy('id','desc')->first();
        // return $apm;
        $apm->update([
            'points' => 110,
        ]);
        return $apm;
    }
}
