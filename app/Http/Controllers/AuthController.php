<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function storeLogin()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'min:8|required',
        ]);
        if ($validator->fails()) {
            return redirect('login')->withInput()->withErrors($validator);
        }
        $user = User::where('email',request('email'))->first();
        if($user)
        {
            if(Hash::check(request('password'),$user->password))
            {
                if($user->hasRole('admin'))
                {
                    Auth::login($user);
                    return redirect('/admin');
                }
                if($user->hasRole('kepala'))
                {
                    Auth::login($user);
                    return redirect('/kepala');
                }
                if($user->hasRole('pegawai'))
                {
                    Auth::login($user);
                    return redirect('/');
                }
            }
            return redirect('login')->with('status','Password anda salah');
        }
        return redirect('login')->with('status','Email tidak ditemukan');
    }

    public function logout()
    {
        Auth::logout(request()->user());
        return redirect('/');
    }
}
