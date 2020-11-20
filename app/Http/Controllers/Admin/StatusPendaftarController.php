<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata2;
use App\Models\User;
use Illuminate\Http\Request;

class StatusPendaftarController extends Controller
{
    public function index()
    {
        $data=Biodata2::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1'])->get();

        // $data=User::with('biodata1')->get();

        // dd($data->toArray());

        $biodata2=$data->where('tahun_ajaran','!=',null);
        return view('admin.statusdaftar.index',compact('biodata2'));
    }
}
