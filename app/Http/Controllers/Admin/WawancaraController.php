<?php

namespace App\Http\Controllers\Admin;

use App\Exports\WawancaraExport;
use App\Http\Controllers\Controller;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WawancaraController extends Controller
{
    public function index()
    {
        $data=Wawancara::with(['tahun_ajaran'=> function($query){
            $query->where('status','=','aktif');
        },'user.biodata1'])->get();
        
        $wawancara=$data->where('tahun_ajaran','!=',null);
        return view('admin.wawancara.index',compact('wawancara'));
    }

    public function hapus($id)
    {
        Wawancara::find($id)->delete();
        return redirect()->route('wawancara.index')->with('sukses-hapus','data berhasil di hapus');
    }

    public function lolos($id)
    {
        Wawancara::find($id)->update(['status'=>'lolos']);
        return redirect()->route('wawancara.index')->with('sukses-edit','data berhasil di edit');
    }

    public function tidaklolos($id)
    {
        Wawancara::find($id)->update(['status'=>'tidak']);
        return redirect()->route('wawancara.index')->with('sukses-edit','data berhasil di edit');
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
            Wawancara::find($id)->delete();
            }
            return redirect()->route('wawancara.index')->with('sukses-hapus','Data Berhasil Di Hapus');
        }else{
            return redirect()->back();
        }
    }

    public function lolosall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
            Wawancara::find($id)->update(['status'=>'lolos']);
            }
            return redirect()->route('wawancara.index')->with('sukses-edit','Data Berhasil Di Update');
        }else{
            return redirect()->back();
        }
        
    }

    public function tidaklolosall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
            Wawancara::find($id)->update(['status'=>'tidak']);
            }
            return redirect()->route('wawancara.index')->with('sukses-edit','Data Berhasil Anda Update');
        }else{
            return redirect()->back();
        }
    }

    public function wawancaraExport()
    {
        return Excel::download(new WawancaraExport, 'data calon santri wawancara.xlsx');
    }
}
