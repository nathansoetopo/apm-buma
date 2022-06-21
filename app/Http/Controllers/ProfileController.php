<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function viewProfileAdmin(){
        $user = User::find(Auth::user()->id);
        return view('admin.profile', compact('user'));
    }

    public function storeProfileAdmin(Request $request){
        if($request->password == NULL && $request->profile == NULL){
            $validated = $request->validate([
                'name' => 'required', 'string', 'max:255',
                'email' => 'required',
            ]);
            if(!$validated){
                return redirect()->back()->withInput()->withError($validated);
            }
            User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
            ]);
        }elseif($request->password == NULL){
            $validated = $request->validate([
                'name' => 'required', 'string', 'max:255',
                'email' => 'required',
                'profile' => 'mimes:jpeg,png,jpg',
            ]);
            if(!$validated){
                return redirect()->back()->withInput()->withError($validated);
            }
            $old_image = User::find(Auth::user()->id)->profile;
            $name = time()."_".$request->profile->getClientOriginalName();
            $request->profile->move(public_path('data_user/'.Auth::user()->id.'/profile'), $name);
            User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'profile' => $name,
            ]);
            if($old_image != NULL){
                unlink('data_user/'.Auth::user()->id.'/profile/'.$old_image);
            }
        }elseif($request->profile == NULL){
            $validated = $request->validate([
                'name' => 'required', 'string', 'max:255',
                'email' => 'required',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required',
            ]);
            User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required', 'string', 'max:255',
                'email' => 'required',
                'profile' => 'mimes:jpeg,png,jpg',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required',
            ]);
            $old_image = User::find(Auth::user()->id)->profile;
            $name = time()."_".$request->profile->getClientOriginalName();
            $request->profile->move(public_path('data_user/'.Auth::user()->id.'/profile'), $name);
            User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'profile' => $name,
                'password' => Hash::make($request->password),
            ]);
            if($old_image != NULL){
                unlink('data_user/'.Auth::user()->id.'/profile/'.$old_image);
            }
        }
        return redirect('profile');
    }
}
