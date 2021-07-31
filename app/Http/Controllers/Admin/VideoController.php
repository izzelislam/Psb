<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VideoExport;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VideoController extends Controller
{
    public function index()
    {
        if (request()->get('gelombang') && request()->get('gelombang') != null){
            $data=Video::with(['tahun_ajaran'=>function($query){
                $query->where('gelombang','=', request()->get('gelombang'));
            },'user.biodata1'])->orderBy('created_at','desc')->get();
        }else {
            $data=Video::with(['tahun_ajaran'=>function($query){
                $query->where('status','=','aktif');
            },'user.biodata1'])->orderBy('created_at','desc')->get();
        }
        
        $video=$data->where('tahun_ajaran','!=',null);
        return view('admin.video.index',compact('video'));
    }

    public function hapus($id)
    {
        $data=Video::findOrFail($id);

        $cek=Wawancara::where('users_id','=',$data->users_id)->get();
        if (isset($cek)) {
            Wawancara::where('users_id','=',$data->users_id)->delete();
        }

        $data->delete();

        return redirect()->route('video.index')->with('sukses-hapus','Data Berhasil Di Hapus');
    }

    public function lolos($id)
    {
        $data=Video::findOrFail($id);
        $data->update(['status'=>'lolos']);
        
        Wawancara::create([
            'users_id'=>$data->users_id,
            'tahun_ajaran_id'=>$data->tahun_ajaran_id,
        ]);

        return redirect()->route('video.index')->with('sukses-edit','Status Berhasil Di Update');
    }

    public function tidaklolos($id)
    {
        $data=Video::findOrFail($id);
        $data->update(['status'=>'tidak']);

        $cek=Wawancara::where('users_id','=',$data->users_id)->get();
        if (isset($cek)) {
            Wawancara::where('users_id','=',$data->users_id)->delete();
        }

        return redirect()->route('video.index')->with('sukses-edit','Status Berhasil Di Update');
    }

    public function lolosall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach($ids as $id){
                $data=Video::findOrFail($id);
                $data->update(['status'=>'lolos']);
                Wawancara::create([
                    'users_id'=>$data->users_id,
                    'tahun_ajaran_id'=>$data->tahun_ajaran_id,
                ]);

            }
            return redirect()->route('video.index')->with('sukses-edit','Status Berhasil Di Update');
        }else{
            return redirect()->back();
        }
    }

    public function tidaklolosall(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                $data=Video::findOrFail($id);
                $data->update(['status'=>'tidak']);
                
                $cek=Wawancara::where('users_id','=',$data->users_id)->get();
                if (isset($cek)) {
                    Wawancara::where('users_id','=',$data->users_id)->delete();
                }
            }

            return redirect()->route('video.index')->with('sukses-edit','Status Berhasil Di Update');
        }else{
            return redirect()->back();
        }
    }

    public function hapusall(Request $request)
    {
        $ids = $request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id){
                Video::findOrFail($id)->delete();
            }
            return redirect()->route('video.index')>with('sukses-hapus','Data Berhasil Di Hapus');
        }else{
            return redirect()->back();
        }
    }

    public function videoExport()
    {
        return Excel::download(new VideoExport, 'data video.xlsx');
    }

    public function filterreset()
    {
        return redirect()->route('video.index');
    }
}
