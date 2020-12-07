<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata1;
use App\Models\Chat;
use App\Models\Jadwal;
use App\Models\Teman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $pendaftar_baru=Biodata1::whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->orderBy('created_at','desc')->take(4)->get();
        $jadwal=Jadwal::orderBy('created_at','desc')->take(6)->get();
        return view('admin.index',compact('pendaftar_baru','jadwal'));
    }
}
