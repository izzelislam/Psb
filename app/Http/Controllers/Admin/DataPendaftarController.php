<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PendaftarExport;
use App\Http\Controllers\Controller;
use App\Models\Biodata1;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataPendaftarController extends Controller
{
    public function index()
    {
        
        $data=Biodata1::whereHas('user',function($query){
            $query->where('role','=','pendaftar');
        })->TahunAjaran()->orderBy('created_at','desc');

      
        if (request()->get('umur') && request()->get('umur') != null ) {
            $data=$data->where('umur','=',request()->get('umur'));
        }   
        
        if (request()->get('keluarga') && request()->get('keluarga') != null ) {
            $data=$data->where('keluarga','=',request()->get('keluarga'));
        }

        $data=$data->get();

        $biodata1=$data->where('tahun_ajaran','!=',null);
        return view('admin.pendaftar.index',compact('biodata1'));
    }

    public function export()
    {   
       return Excel::download(new PendaftarExport,'data pendaftar.xlsx');
    }


    public function destroy($id)
    {   
        $data=Biodata1::find($id);
        User::where('id','=',$data->users_id)->delete();
        $data->delete();
        
        return redirect()->route('data-pendaftar')->with('hapus','Data Berhasil Dihapus');
    }

    public function deleteall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
                $data=Biodata1::find($id);
                User::where('id','=',$data->users_id)->delete();
                $data->delete();
            }
            return redirect()->route('data-pendaftar')->with('hapus','Data Berhasil Dihapus');
        }else{
            return redirect()->back();
        }
    }

    public function resetfilter()
    {
        return redirect()->route('data-pendaftar');
    }
}
    