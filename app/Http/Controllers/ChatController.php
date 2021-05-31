<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Teman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $teman=Teman::where('users_id','=',Auth::user()->id)->first();

        
        if($teman != null){
            $pesan=Chat::where('teman_id','=',$teman->id)->with('user')->get();
            // $this->readpesan($teman->id);
            // dd($pesan->toArray());
        }else{
            $pesan=null;
        }
        $teman=Teman::where('users_id','=',Auth::user()->id)->pluck('id')->first();

        Chat::where('teman_id','=',$teman)->where('read','=',null)->whereHas('user',function($query){
          $query->where('role','=','admin');
        })->update(['read'=>1]);
        dd($pesan->toArray());
        // return view('front.dashboard.chat',compact('pesan'));
    }

    public function chatstore(Request $request)
    {
        $teman=Teman::where('users_id','=',Auth::user()->id)->first();

        if($teman == null){
            $teman=Teman::create([
                'users_id'=>Auth::user()->id,
            ]);
        }

        $chat=Chat::create([
            'users_id'=>Auth::user()->id,
            'teman_id'=>$teman->id,
            'pesan'=>$request->pesan
        ]);
        
        // dd($request->toArray());
        return redirect()->route('dashboard-pesan');
    }

    public function chatadmin()
    {
        $pesan=Teman::with(['chat'=>function($query){
            $query->where('read','=',null);
        }])->orderBy('created_at','desc')->get();

        // dd($pesan->toArray());
        return view('admin.pesan.index',compact('pesan'));
    }

    public function isichat($id)
    {
        $pesan=Chat::where('teman_id','=',$id)->get();
        $this->readpesan($id);

        return view('admin.pesan.edit',compact('pesan'));
    }

    public function storechatadmin(Request $request)    
    {
        Chat::create([
            'users_id'=>Auth::user()->id,
            'teman_id'=>$request->teman_id,
            'pesan'=>$request->pesan
        ]);

        return redirect()->back()->with('sukses-kirim','Pesan Berhasil DI Kirimkan');
    }

    public function pesanhapus($id)
    {
        Chat::where('teman_id','=',$id)->delete();
        Teman::find($id)->delete();

        return redirect()->back()->with('sukses-hapus','Pesan Berhasil Di Hapus');
    }
    
    public function pesanhapusall(Request $request)
    {
        $ids = $request->get('ids');
        
        foreach ($ids as $item) {
            Chat::where('teman_id','=',$item)->delete();
            Teman::find($item)->delete();
        }
        return redirect()->back()->with('sukses-hapus','Pesan Berhasil Di Hapus');
    }

    public function readpesan($id)
    {
       $chat=Chat::where('teman_id','=',$id)->where('read','=',null)->whereHas('user',function($query){
           $query->where('role','=','pendaftar');
       })->update(['read'=>1]);
       
    }

    public function readall()
    {
        Chat::where('read','=',null)->whereHas('user',function($query){
           $query->where('role','=','pendaftar');
       })->update(['read'=>1]);
        return redirect()->back();
    }

}
