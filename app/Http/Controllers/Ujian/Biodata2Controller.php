<?php

namespace App\Http\Controllers\Ujian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Biodata2Request;
use App\Models\Biodata2;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Biodata2Controller extends Controller
{
    public function index()
    {
        $provinsi = DB::table('indonesia_provinces')->get();
        $kabupaten = DB::table('indonesia_cities')->get();
       
        return view('front.ujian.biodata-2',compact('provinsi','kabupaten'));
    }

    public function store(Biodata2Request $request)
    {
        $users_id=Auth::user()->id;
        $tahun_ajaran_id=TahunAjaran::where('status','=','aktif')->pluck('id')->first();
        $request->merge(['users_id'=>$users_id,'tahun_ajaran_id'=>$tahun_ajaran_id]);
        Biodata2::create($request->all());
        
        return redirect()->route('sukses');
    }
    
    
}
