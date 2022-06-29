<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Apm;
use Illuminate\Http\Request;

class ApmController extends Controller
{
    public function index()
    {
        $user = request()->user();
        $now = Carbon::parse(now())->format('Y:m:d');
        if(Apm::where('user_id',$user->id)->where('test_date',$now)->whereNotNull('updated_at')->orderBy('id','desc')->exists())
        {
            return redirect('/')->with('status','User sudah mengisi test hari ini');
        }
        return view('apm');
    }

    public function testHistory()
    {
        $user = request()->user();
        $apm = Apm::where('user_id',$user->id)->whereNotNull('points')->paginate(10);
        return view('riwayat-test',compact('apm'));
    }

    public function showBarcode($apmID)
    {
        $user = request()->user();
        $apm = Apm::find($apmID);
        $now = Carbon::parse(now())->format('Y-m-d');
        // return $now;
        if($apm->test_date != $now)
        {
            return redirect('riwayat-test')->with('status','Tanggal Test sudah kadaluarsa');
        }
        elseif($apm->test_date == $now)
        {
            return view('barcode',compact('apm','user'));
        }
    }

    public function scanBarcode($apmID)
    {
        $user = request()->user();
        if($user->hasRole('pegawai'))
        {
            return redirect('/')->with('status','Anda tidak memiliki wewenang');
        }
        $apm = Apm::find($apmID);
        $now = Carbon::parse(now())->format('Y-m-d');
        if($apm->test_date != $now)
        {
            if($user->hasRole('admin'))
            {
                return redirect('admin')->with('status','Tanggal Test sudah kadaluarsa');
            }elseif($user->hasRole('kepala'))
            {
                return redirect('kepala')->with('status','Tanggal Test sudah kadaluarsa');
            }
        }
        return view('admin.test-result',compact('apm'));
    }
}
