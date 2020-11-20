<?php

namespace App\Http\Controllers\Ujian;

use App\Http\Controllers\Controller;
use App\Models\Biodata1;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Biodata1Controller extends Controller
{
    public function index()
    {
        return view('front.ujian.biodata-1');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'keluarga'=>'required',
            'umur'=>'required',
            'no_wa'=>'required',
            'jenis_kelamin'=>'required',

        ]);
        
        $TahunAjaran=TahunAjaran::where('status','=','aktif')->orderBy('id','desc')->pluck('id');
        
        Biodata1::create([
            'users_id'=>Auth::user()->id,
            'tahun_ajaran_id'=>$TahunAjaran->first(),
            'nama'=>$request->nama,
            'keluarga'=>$request->keluarga,
            'umur'=>$request->umur,
            'no_wa'=>$request->no_wa,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);

        return redirect()->route('sukses');
    }
}
