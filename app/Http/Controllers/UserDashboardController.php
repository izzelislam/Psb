<?php

namespace App\Http\Controllers;

use App\Models\Biodata1;
use App\Models\Biodata2;
use App\Models\Jadwal;
use App\Models\Qna;
use App\Models\Quis;
use App\Models\TahunAjaran;
use App\Models\Video;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {   
        $data=Biodata1::with(['tahun_ajaran'=>function($query){
            $query->where('tahun','=',date('Y'));
        }])->get();

        $gel=TahunAjaran::where('status','=','aktif')->pluck('gelombang')->first();
        $pendaftar=$data->where('tahun_ajaran','!=',null)->count();

        $tahap1=Biodata1::where('users_id','=',Auth::user()->id)->with('user.biodata2')->first();
        $tahap2=Biodata2::where('users_id','=',Auth::user()->id)->with('user.biodata1')->first();
        $tahap3=Quis::where('users_id','=',Auth::user()->id)->first();
        $tahap4=Video::where('users_id','=',Auth::user()->id)->first();
        $tahap5=Wawancara::where('users_id','=',Auth::user()->id)->first();
        return view('front.dashboard.index',compact('tahap1','tahap2','tahap3','tahap4','tahap5','gel','pendaftar'));
    }

    public function profiluser()
    {
        $biodata2=Biodata2::where('users_id','=',Auth::user()->id)->first();        
        return view('front.dashboard.profileuser',compact('biodata2'));
    }

    public function qna()
    {
        $qna=Qna::all();
        return view('front.dashboard.qna',compact('qna'));
    }

    public function informasi()
    {
        $jadwal=Jadwal::all();
        return view('front.dashboard.info',compact('jadwal'));
    }
}
