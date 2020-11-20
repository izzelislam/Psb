<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PendaftarExport;
use App\Http\Controllers\Controller;
use App\Models\Biodata1;
use PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataPendaftarController extends Controller
{
    public function index()
    {
        $data=Biodata1::TahunAjaran();

        if (request()->get('umur') ) {
            $data=$data->where('umur','=',request()->get('umur'));
        }
        
        if (request()->get('keluarga') ) {
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
        $data->delete();
        
        return redirect()->route('data-pendaftar')->with('hapus','Data Berhasil Dihapus');
    }
}
