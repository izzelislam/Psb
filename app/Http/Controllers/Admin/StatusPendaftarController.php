<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata2;
use App\Models\IndonesiaCity;
use App\Models\Quis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusPendaftarController extends Controller
{
    public function index()
    {
        $data=Biodata2::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1'])->get();
        
        $data2=Quis::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1'])->get();

        $nilai = $data2->where('tahun_ajaran','!=',null);
        $biodata2=$data->where('tahun_ajaran','!=',null);
        return view('admin.statusdaftar.index',compact('biodata2','nilai'));
    }

    public function show($id)   
    {
        $biodata2=Biodata2::find($id);
        return view('admin.statusdaftar.detail',compact('biodata2'));
    }

    public function lolos($id)
    {
        $data=Biodata2::find($id);
        $data->update(['status'=>'lolos']);
        return redirect()->route('status-pendaftar');
    }

    public function tidak($id)
    {
        $data=Biodata2::find($id);
        $data->update(['status'=>'tidak']);
        return redirect()->route('status-pendaftar');
    }

    public function lolosall(Request $request)
    {
        $ids=$request->get('ids');
        foreach ($ids as $id) {
            Biodata2::find($id)->update(['status'=>'lolos']);
        }

        return redirect()->route('status-pendaftar');
    }

    public function tidaklolos(Request $request)
    {
        $ids=$request->get('ids');
        foreach ($ids as $id) {
            Biodata2::find($id)->update(['status'=>'tidak']);
        }

        return redirect()->route('status-pendaftar');
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');
        foreach ($ids as $id) {
            Biodata2::find($id)->delete();
        }

        return redirect()->route('status-pendaftar');
    }
}
