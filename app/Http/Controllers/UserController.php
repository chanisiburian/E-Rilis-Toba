<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

    public function index(Request $request){
        $where["dihapus"] = 0;

        if(Auth::user()->level_id == 2){
            $where["user_id"] = Auth::user()->id;
        }

        if(!empty($request->id)){
            $where["user_id"] = $request->id;
        }

        if(!empty($request->status)){
            $where["status"] = $request->status;
        }

        $data = User::where($where)->orderBy("user_id","desc")->get();
        if(Auth::user()->level_id == "1"){
            return view("admin.user",compact("data"));
        }

        if(Auth::user()->level_id == "2"){
            return view("user.user");
        }
    }

    public function profile(Request $request){
        $where["dihapus"] = 0;
        $where["user_id"] = Auth::user()->user_id;

        if(!empty($request->id)){
            $where["user_id"] = $request->id;
        }

        if(!empty($request->status)){
            $where["status"] = $request->status;
        }

        $data = User::where($where)->orderBy("user_id","desc")->first();
        
        return view("user",compact("data"));
    }

    public function verifikasi(Request $request){
        $where["dihapus"] = 0;
        $where["user_id"] = Auth::user()->user_id;

        if(!empty($request->id)){
            $where["user_id"] = $request->id;
        }

        if(!empty($request->status)){
            $where["status"] = $request->status;
        }

        $data = User::where($where)->orderBy("user_id","desc")->first();
        
        return view("user/verifikasi",compact("data"));
    }

    public function add(Request $request){
        $data = $request->all();

        $request->validate(['email' => 'unique:users,email']);

        if($request->password != null){
            $request->validate([
                'password' => 'required|min:5',
                'password_confirmation' => 'required|same:password',
            ]);
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data["password"]);
            unset($data["password_confirmation"]);
        }

        User::create($data);
        return redirect()->route("login")->withErrors(['error' => "Berhasil Registrasi, Silahkan Login"]);
    }

    public function update(Request $request, $id){
        $user = User::where('user_id',$id)->first();
        $password = $user->password;
        $data = $request->all();

        if(!empty($request->email) && $request->email != $user->email){
            $request->validate(['email' => 'unique:users,email']);
        }

        if($request->password != null){
            $request->validate([
                'password' => 'required|min:5',
                'password_confirmation' => 'required|same:password',
            ]);
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data["password"]);
            unset($data["password_confirmation"]);
        }

        $file_path = false;
        if($request->file('foto')){
            $file_path = $request->file('foto')->store('public/foto');
        }

        if($file_path){
            $data['foto'] = '/storage'.str_replace('public','',$file_path);
        }

        if($request->file('ktp')){
            $file_path = $request->file('ktp')->store('public/ktp');

            if($file_path){
                $data['ktp'] = '/storage'.str_replace('public','',$file_path);
            }
        }

        if($request->file('kta')){
            $file_path = $request->file('kta')->store('public/kta');

            if($file_path){
                $data['kta'] = '/storage'.str_replace('public','',$file_path);
            }
        }

        if($request->file('npwp')){
            $file_path = $request->file('npwp')->store('public/npwp');

            if($file_path){
                $data['npwp'] = '/storage'.str_replace('public','',$file_path);
            }
        }

        unset($data["_token"]);
        unset($data["password_confirmation"]);

        User::where("user_id", $id)->update($data);
        if(isset($data['media_digital'])){
            return redirect("user");
        }
        return redirect()->back()->withErrors(['error' => "Berhasil memperbarui data"]);

    }

    
    public function delete($id){
        User::where("user_id", $id)->update([
            "dihapus" => 1
        ]);

        return redirect()->back()->withErrors(['error' => "Berhasil menghapus data"]);
    }

}
