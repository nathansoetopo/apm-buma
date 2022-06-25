<?php

namespace App\Http\Controllers;

use App\Models\Apm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KepalaController extends Controller
{
    public function index()
    {
        $pegawai = User::role('pegawai')->get()->count();
        $total_test = Apm::all()->count();
        return view('kepala.index', compact('pegawai', 'total_test'));
    }

    public function viewPegawai(){
        $users = User::role('pegawai')->get();
        return view('kepala.data-pegawai', compact('users'));
    }

    public function storePegawai(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required',
        ]);
        if(!$validated){
            return redirect()->back()->withInput()->withError($validated);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => 1,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('pegawai');
        return redirect('kepala/data-pegawai');
    }

    public function updatePegawai(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required',
        ]);
        if(!$validated){
            return redirect()->back()->withInput()->withError($validated);
        }
        User::where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect('kepala/data-pegawai');
    }

    public function destroyPegawai($id){
        User::destroy($id);
        return redirect('kepala/data-pegawai');
    }

    public function statusPegawai($id){
        $user = User::where('id', $id)->first();
        if($user->status == 1){
            $user->update(
                ['status' => 0]
            );
        }elseif($user->status == 0){
            $user->update(
                ['status' => 1]
            );
        }
        return redirect('kepala/data-pegawai');
    }
}
