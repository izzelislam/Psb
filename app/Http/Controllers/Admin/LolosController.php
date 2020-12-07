<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LolosExport;
use App\Http\Controllers\Controller;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LolosController extends Controller
{
    public function index()
    {
        $lolos=Wawancara::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1','user.biodata2.kabupaten','user.biodata2.provinsi'])->where('status','=','lolos')->get();
        return view('admin.lolos.index',compact('lolos'));
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');
        if($ids != null){
            foreach ($ids as $id) {
                Wawancara::find($id)->delete();
            }
            return redirect()->back()->with('sukses-hapus','Data Berhasil Di Hapus');
        }else{
            return redirect()->back();
        }
    }

    public function exportlolos()
    {
        return Excel::download(new LolosExport,'calon santri baru.xlsx');
    }
}
