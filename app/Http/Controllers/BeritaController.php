<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller{

    public function index(Request $request){
        $where["dihapus"] = 0;
        if(Auth::user()->level_id == 2){
            $where["user_id"] = Auth::user()->user_id;
        }

        if(!empty($request->id)){
            $where["user_id"] = $request->id;
        }

        if(!empty($request->status)){
            $where["status"] = $request->status;
        }
        $data = Berita::where($where)->orderBy("berita_id","desc")->with("user")->get();
        
        if(Auth::user()->level_id == "1"){
            return view("admin.berita", compact("data"));
        }

        if(Auth::user()->level_id == "2"){
            return view("user.berita", compact("data"));
        }
    }

    public function homepage(Request $request){
        $where["dihapus"] = 0;
        $data = Berita::where($where)->orderBy("berita_id","desc")->with("user")->get();
        
        return view("home", compact("data"));
    }

    public function berita(Request $request){
        $where["dihapus"] = 0;
        $data = Berita::where($where)->orderBy("berita_id","desc")->with("user")->get();
        
        return view("berita", compact("data"));
    }

    public function dashboard(Request $request){
        $where["dihapus"] = 0;
        
        if(Auth::user()->level_id == 2){
            $where["user_id"] = Auth::user()->user_id;
        }

        if(!empty($request->id)){
            $where["id"] = $request->id;
        }

        if(isset($request->status)){
            $where["status"] = $request->status;
        }

        $data = Berita::where($where)->orderBy("berita_id","desc")->with("user")->get();
        $countActive = 0;

        foreach($data as $value){
            if($value->status == '1'){
                $countActive += 1;
            }
        }

        if(Auth::user()->level_id == "1"){
            return view("admin.dashboard", compact("data"));
        }

        if(Auth::user()->level_id == "2"){
            return view("user.dashboard", compact("data",'countActive'));
        }
    }

    public function add(Request $request){
        $data = $request->all();
        $data['user_id'] = Auth::user()->user_id;
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

        unset($data["_token"]);

        Berita::where("berita_id", $id)
        ->update($data);

        return redirect()->back()->withErrors(['error' => "Berhasil memperbarui data"]);
    }

    public function delete($id){
        Berita::where("berita_id", $id)->update(["dihapus" => 1]);

        return redirect()->back()->withErrors(['error' => "Berhasil menghapus data"]);
    }
}
