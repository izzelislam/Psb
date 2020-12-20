<?php

namespace App\Http\Controllers;

use App\Models\Biodata1;
use App\Models\Jadwal;
use App\Models\Qna;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        $data=Biodata1::with(['tahun_ajaran'=>function($query){
            $query->where('tahun','=',date('Y'));
        }])->get();

        $gel=TahunAjaran::where('status','=','aktif')->pluck('gelombang')->first();
        $pendaftar=$data->where('tahun_ajaran','!=',null)->count();
        return view('front.main.index',compact('pendaftar','gel'));
    }

    public function qna()
    {
        $qna=Qna::all();
        return view('front.main.qna',compact('qna'));
    }

    public function informasi()
    {
        $jadwal=Jadwal::all();
        return view('front.main.jadwal',compact('jadwal'));
    }
}
