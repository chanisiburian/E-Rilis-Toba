<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SentMail;
Use Alert;

class AuthController extends Controller{

    public function view_login(Request $request){
        return view('auth.login');    
    }

    public function view_register(Request $request){
        return view('auth.register');    
    }

    public function view_forgot_password(Request $request){
        return view('auth.forgot-password');    
    }

    public function view_recovery_password(Request $request){
        return view('auth.recovery-password');    
    }

    public function login(Request $request){
        $user = User::where(['email' => $request->email])->first();
        if(!$user){
            return redirect()->back()->withErrors(['error' => "User tidak ditemukan"]);
        }

        if(isset($request->password) && !Hash::check($request->password,$user->password)){
            return redirect()->back()->withErrors(['error' => "Password salah"]);
        }
        Auth::login($user);
        if($user->level_id == '1'){
            return redirect()->route("admin");
        }else{
            return redirect()->route("user");
        }
    }

    public function post_forgot_password(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        Mail::to($request->email)->send(new SentMail(["email" => $request->email]));
        return redirect()->route("login")->withErrors(['error' => "Berhasil kirim email"]);
    }

    public function post_recovery_password(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        User::where("email",$request->email)->update(['password' => Hash::make($request->password)]);
        // Alert::success('Password Berhasil Diubah');
        return redirect()->route("login")->withErrors(['error' => "Berhasil memperbarui password"]);
    }

}
