<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller{

    public function index(Request $request){

        $data = Berita::with('user');
        if($request->input('id')){
            $data = $data->where('user_id',$request->id);
        }else{
            if(auth()->user()->level_id == 2){
                $data = $data->where('user_id',auth()->id());
            }
        }

        if($request->input('status')){
            $data = $data->where('status',$request->status);
        }

        $data = $data->orderBy('id','desc')->get();

        if(auth()->user()->level_id == "1"){
            return view("admin.berita", compact("data"));
        }

        if(auth()->user()->level_id == "2"){
            return view("user.berita", compact("data"));
        }
    }

    public function homepage(Request $request){
        $data = Berita::orderBy("id","desc")->with("user")->get();
        
        return view("home", compact("data"));
    }

    public function berita(Request $request){
        $data = Berita::orderBy("id","desc")->with("user")->get();
        
        return view("berita", compact("data"));
    }

    public function dashboard(Request $request){
        
        if(auth()->user()->level_id == 2){
            $where["user_id"] = auth()->id();
        }

        if(!empty($request->id)){
            $where["id"] = $request->id;
        }

        if(isset($request->status)){
            $where["status"] = $request->status;
        }

        $data = Berita::where($where)->orderBy("id","desc")->with("user")->get();
        $countActive = Berita::where('status',1)->count();

        if(auth()->user()->level_id == "1"){
            return view("admin.dashboard", compact("data"));
        }

        if(auth()->user()->level_id == "2"){
            return view("user.dashboard", compact("data",'countActive'));
        }
    }

    public function add(Request $request){
        $data = $request->all();
        $data['user_id'] = auth()->id();

        $file_path = $request->file('sampul')->store('public/sampul');

        if($file_path){
            $data['sampul'] = '/storage'.str_replace('public','',$file_path);
        }

        Berita::create($data);

        return redirect()->back()->withErrors(['error' => "Berhasil menambah data"]);
    }

    public function update(Request $request,$id){
        $data = $request->all();

        $file_path = false;
        if($request->file('sampul')){
            $file_path = $request->file('sampul')->store('public/sampul');
        }

        if($file_path){
            $data['sampul'] = '/storage'.str_replace('public','',$file_path);
        }

        Berita::find($id)
        ->update($data);

        return redirect()->back()->withErrors(['error' => "Berhasil memperbarui data"]);
    }

    public function delete($id){
        Berita::find($id)->delete();

        return redirect()->back()->withErrors(['error' => "Berhasil menghapus data"]);
    }
}
