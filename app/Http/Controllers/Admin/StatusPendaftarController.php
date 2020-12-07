<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata2;
use App\Models\Quis;
use Illuminate\Http\Request;
use App\Exports\BiodataExport;
use Maatwebsite\Excel\Facades\Excel;

class StatusPendaftarController extends Controller
{
    public function index()
    {
        $data=Biodata2::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1'])->orderBy('created_at','desc');
        
        if(request()->get('umur') && request()->get('umur') != null){
            $data=$data->whereHas('user',function($query){
                $query->whereHas('biodata1',function($query2){
                    $query2->where('umur','=', request()->get('umur'));
                });
            });
        }

        if(request()->get('orang_tua') && request()->get('orang_tua') != null){
            $data=$data->where('orang_tua','=',request()->get('orang_tua'));
        }

        if(request()->get('pendidikan_terakhir') && request()->get('pendidikan_terakhir') != null){
            $data=$data->where('pendidikan_terakhir','=',request()->get('pendidikan_terakhir'));
        }

        if(request()->get('perokok') && request()->get('perokok') != null){
            $data=$data->where('perokok','=',request()->get('perokok'));
        }

        if(request()->get('punya_pacar') && request()->get('punya_pacar') != null){
            $data=$data->where('punya_pacar','=',request()->get('punya_pacar'));
        }

        if(request()->get('suka_game') && request()->get('suka_game') != null){
            $data=$data->where('suka_game','=',request()->get('suka_game'));
        }

        if((request()->get('penghasilan_ortu_min') && request()->get('penghasilan_ortu_min') != null) && (request()->get('penghasilan_ortu_max') && request()->get('penghasilan_ortu_max') != null)){
            $data=$data->whereBetween('penghasilan_ortu',[request()->get('penghasilan_ortu_min'),request()->get('penghasilan_ortu_max')]);
        }

        if(request()->get('keluarga') && request()->get('keluarga') != null){
            $data=$data->whereHas('user',function($query){
                $query->whereHas('biodata1',function($query2){
                    $query2->where('keluarga','=', request()->get('keluarga'));
                });
            });
        }
        $data=$data->get();

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
        if ($ids != null) {
            foreach ($ids as $id) {
                Biodata2::find($id)->update(['status'=>'lolos']);
            }

            return redirect()->route('status-pendaftar');
        }else{
            return redirect()->back();
        }
    }

    public function tidaklolos(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Biodata2::find($id)->update(['status'=>'tidak']);
            }

            return redirect()->route('status-pendaftar');
        }else{
            return redirect()->back();
        }
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Biodata2::find($id)->delete();
            }

            return redirect()->route('status-pendaftar');
        }else{
            return redirect()->back();
        }
    }

    public function filterreset()
    {
        return redirect()->route('status-pendaftar');
    }

    public function biodataexport()
    {
        return Excel::download(new BiodataExport,'data Biodata.xlsx');
    }

}
