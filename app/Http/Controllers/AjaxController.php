<?php

namespace App\Http\Controllers;

use App\Models\Apm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function getValue(Request $request)
    {
        $user = request()->user();
        $nilai = $request->get('nilai');
        $data = json_decode($nilai, true);
        $output = 0;
        foreach ($data as $value) {
            $output += $value;
        }
        $points = $output / 10;
        $now = Carbon::parse(now())->format('Y:m:d');
        $apm = Apm::where('user_id',$user->id)->where('test_date',$now)->whereNull('points')->orderBy('id','desc')->first();
        if($points < 240.0)
        {
            $apm->update([
                'points' => $points,
                'status' => 'N',
                'updated_at' => Carbon::now(),
            ]);
        }
        elseif($points >= 240.0 && $points < 410.0)
        {
            $apm->update([
                'points' => $points,
                'status' => 'KKR',
                'updated_at' => Carbon::now(),
            ]);
        }
        elseif($points >= 410.0 && $points < 580.0)
        {
            $apm->update([
                'points' => $points,
                'status' => 'KKS',
                'updated_at' => Carbon::now(),
            ]);
        }
        elseif($points >= 580.0 )
        {
            $apm->update([
                'points' => $points,
                'status' => 'KKB',
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect('/');
    }

    public function getPegawai(Request $request){
        $query = $request->get('query');
        $output = '';
        $no = 1;
        if($query != ''){
            $users = User::role('pegawai')->where('name', 'like', '%'.$query.'%')->get();
        }else{
            $users = User::role('pegawai')->get();
        }
        foreach($users as $user){
            if($user->status == 1){
                $badge = '<div class="badge badge-success">Active</div>';
            }else{
                $badge = '<div class="badge badge-danger">Non</div>';
            }
            $output .= '
            <tr>
                <td>'.$no++.'</td>
                <td>'.$user->name.'</td>
                <td>'.$user->created_at.'</td>
                <td>
                    '.$badge.'
                </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal"
                        data-target="#edit'.$user->id.'" type="button">Edit</button>
                    <a href="#" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete'.$user->id.'">Hapus</a>
                    <a href="#" class="btn btn-secondary" data-toggle="modal"
                        data-target="#non'.$user->id.'">Status</a>
                </td>
            </tr>
            ';
        }
        return $output;
    }

    public function getKepala(Request $request){
        $query = $request->get('query');
        $output = '';
        $no = 1;
        if($query != ''){
            $users = User::role('kepala')->where('name', 'like', '%'.$query.'%')->get();
        }else{
            $users = User::role('kepala')->get();
        }
        foreach($users as $user){
            if($user->status == 1){
                $badge = '<div class="badge badge-success">Active</div>';
            }else{
                $badge = '<div class="badge badge-danger">Non</div>';
            }
            $output .= '
            <tr>
                <td>'.$no++.'</td>
                <td>'.$user->name.'</td>
                <td>'.$user->created_at.'</td>
                <td>
                    '.$badge.'
                </td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal"
                        data-target="#edit'.$user->id.'" type="button">Edit</button>
                    <a href="#" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete'.$user->id.'">Hapus</a>
                    <a href="#" class="btn btn-secondary" data-toggle="modal"
                        data-target="#non'.$user->id.'">Status</a>
                </td>
            </tr>
            ';
        }
        return $output;
    }

    public function updateStatusTest(Request $request){
        $now = Carbon::parse(now())->format('Y:m:d');
        $apm = Apm::where('user_id',Auth::user()->id)->where('test_date',$now)->whereNull('points')->orderBy('id','desc')->first();
        $apm->update([
            'updated_at' => Carbon::now(),
        ]);
    }
}
