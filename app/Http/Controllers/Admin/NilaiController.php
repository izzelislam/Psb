<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata2;
use App\Models\Quis;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $data=Quis::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1'])->orderBy('id','desc');

        if((request()->get('nilai_tes_iq_min') && request()->get('nilai_tes_iq_min') != null) && (request()->get('nilai_tes_iq_max') && request()->get('nilai_tes_iq_max') != null)){
            $data=$data->whereBetween('nilai_tes_iq',[request()->get('nilai_tes_iq_min'),request()->get('nilai_tes_iq_max')]);
        }

        if((request()->get('nilai_tes_kepribadian_min') && request()->get('nilai_tes_kepribadian_min') != null) && (request()->get('nilai_tes_kepribadian_max') && request()->get('nilai_tes_kepribadian_max') != null)){
            $data=$data->whereBetween('nilai_tes_kepribadian',[request()->get('nilai_tes_kepribadian_min'),request()->get('nilai_tes_kepribadian_max')]);
        }

        $data=$data->get();
        $nilai = $data->where('tahun_ajaran','!=',null);
        return view('admin.nilai.index',compact('nilai'));
    }

    public function nilailolos($id)
    {
        $nilai=Quis::find($id);
        $nilai->update(['status'=>'lolos']);
        return redirect()->route('nilai.index')->with('sukses-edit','Status Berhasil Di Update');
    }
    
    public function nilaitidaklolos($id)
    {
        $nilai=Quis::find($id);
        $nilai->update(['status'=>'tidak']);
        return redirect()->route('nilai.index')->with('sukses-edit','Status Berhasil Di Update');
    }

    public function nilaihapus($id)
    {
        Quis::find($id)->delete();
        return redirect()->route('nilai.index')->with('sukses-hapus','Data Berhasil Di hapus');
    }

    public function nilaihapusall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
            Quis::find($id)->delete();
            }
            return redirect()->route('nilai.index')->with('sukses-hapus','Berhasil Hapus'.' '.count($ids).' '.'Data');
        }else{
            return redirect()->back();
        }
    }

    public function nilailolosall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
            $nilai=Quis::find($id);
            $nilai->update(['status'=>'lolos']);
            }
            return redirect()->route('nilai.index')->with('sukses-edit','Status Berhasil Di Update');
        }else{
            return redirect()->back();
        }
    }

    public function nilaitidaklolosall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
            $nilai=Quis::find($id);
            $nilai->update(['status'=>'tidak']);
            }
            return redirect()->route('nilai.index')->with('sukses-edit','Status Berhasil Di Update');
        }else{
            return redirect()->back();
        }
    }

    public function filterreset()
    {
        return redirect()->route('nilai.index');
    }
}
