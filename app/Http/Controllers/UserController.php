<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

    public function index(Request $request){

        $data = new User;

        if($request->input('id')){
            $data = $data->where('id',$request->id);
        }else{
            if(auth()->user()->level_id == '2'){
                $data = $data->where('id',auth()->id());
            }
        }

        if($request->input('status')){
            $data = $data->where('status',$request->status);
        }
        

        $data = $data->orderBy('id','desc')->get();

        if(auth()->user()->level_id == "1"){
            return view("admin.user",compact("data"));
        }

        if(auth()->user()->level_id == "2"){
            return view("user.user");
        }
    }

    public function profile(Request $request){

        $data = auth()->user();
        
        return view("user",compact("data"));
    }

    public function verifikasi(Request $request){

        $where["id"] = Auth::user()->id;

        if(!empty($request->id)){
            $where["id"] = $request->id;
        }

        if(!empty($request->status)){
            $where["status"] = $request->status;
        }

        $data = User::where($where)->orderBy("id","desc")->first();
        
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
        $user = User::find($id);
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

        User::find($id)->update($data);
        if(isset($data['media_digital'])){
            return redirect("user");
        }
        return redirect()->back()->withErrors(['error' => "Berhasil memperbarui data"]);

    }

    
    public function delete($id){
        User::find($id)->delete();

        return redirect()->back()->withErrors(['error' => "Berhasil menghapus data"]);
    }

}
