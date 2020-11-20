<?php

namespace App\Http\Controllers;

use App\Models\Biodata1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $tahap1=Biodata1::where('users_id','=',Auth::user()->id)->count();
        return view('front.dashboard.index',compact('tahap1'));
    }

    public function tes_proses()
    {
        $tahap1=Biodata1::where('users_id','=',Auth::user()->id)->count();
        
        return view('front.dashboard.tes_proses',compact('tahap1'))->with('selamat');
    }
}
