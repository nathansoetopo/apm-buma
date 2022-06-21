<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function indexQuiz()
    {
        $quizzes = Quiz::all();
        return view('admin.index-quiz',compact('quizzes'));
    }

    public function viewPegawai(){
        $users = User::role('pegawai')->get();
        return view('admin.data-pegawai', compact('users'));
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
        return redirect('admin/data-pegawai');
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
        return redirect('admin/data-pegawai');
    }

    public function destroyPegawai($id){
        User::destroy($id);
        return redirect('admin/data-pegawai');
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
        return redirect('admin/data-pegawai');
    }

    public function viewKepala(){
        $users = User::role('kepala')->get();
        return view('admin.data-kepala', compact('users'));
    }

    public function storeKepala(Request $request){
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
        $user->assignRole('kepala');
        return redirect('admin/data-kepala');
    }

    public function updateKepala(Request $request, $id){
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
        return redirect('admin/data-kepala');
    }

    public function destroyKepala($id){
        User::destroy($id);
        return redirect('admin/data-kepala');
    }

    public function statusKepala($id){
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
        return redirect('admin/data-kepala');
    }
}
