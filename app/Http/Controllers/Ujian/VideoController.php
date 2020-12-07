<?php

namespace App\Http\Controllers\Ujian;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function video()
    {
        return view('front.ujian.video');
    }

    public function videostore(Request $request)
    {
        $request->validate(['link'=>'required']);
        $tahun_ajaran=TahunAjaran::where('status','=','aktif')->orderBy('created_at','desc')->pluck('id')->first();
        $request->merge(['users_id'=>Auth::user()->id,'tahun_ajaran_id'=>$tahun_ajaran]);
        Video::create($request->all());
        return redirect()->route('sukses');
    }

    public function wawancara()
    {
        return view('front.ujian.wawancara');
    }
}
