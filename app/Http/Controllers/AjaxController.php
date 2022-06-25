<?php

namespace App\Http\Controllers;

use App\Models\Apm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        // return $apm;
        if($points < 240.0)
        {
            $apm->update([
                'points' => $points,
                'status' => 'N',
            ]);
        }
        elseif($points >= 240.0 && $points < 410.0)
        {
            $apm->update([
                'points' => $points,
                'status' => 'KKR',
            ]);
        }
        elseif($points >= 410.0 && $points < 580.0)
        {
            $apm->update([
                'points' => $points,
                'status' => 'KKS',
            ]);
        }
        elseif($points >= 580.0 )
        {
            $apm->update([
                'points' => $points,
                'status' => 'KKB',
            ]);
        }
        // Apm::create([
        //     'user_id' => $user->id,
        //     'sleep_start' => '10:00:00',
        //     'sleep_end' => '11:00:00',
        //     'duration' => '60 menit',
        //     'test_date' => now(),
        //     'points' => $output / 10,
        // ]);
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
}
