<?php

namespace App\Http\Controllers;

use App\Models\Biodata1;
use App\Models\Biodata2;
use App\Models\Quis;
use App\Models\Video;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {   
        $tahap1=Biodata1::where('users_id','=',Auth::user()->id)->with('user.biodata2')->first();
        $tahap2=Biodata2::where('users_id','=',Auth::user()->id)->with('user.biodata1')->first();
        $tahap3=Quis::where('users_id','=',Auth::user()->id)->first();
        $tahap4=Video::where('users_id','=',Auth::user()->id)->first();
        // dd($tahap4->toArray());
        $tahap5=Wawancara::where('users_id','=',Auth::user()->id)->first();
        return view('front.dashboard.index',compact('tahap1','tahap2','tahap3','tahap4','tahap5'));
    }

    public function tes_proses()
    {
        $tahap1=Biodata1::where('users_id','=',Auth::user()->id)->count();
        $tahap2=Biodata2::where('users_id','=',Auth::user()->id)->first();
        $tahap3=Quis::where('users_id','=',Auth::user()->id)->first();
        $tahap4=Video::where('users_id','=',Auth::user()->id)->first();
        $tahap5=Wawancara::where('users_id','=',Auth::user()->id)->first();
        
        return view('front.dashboard.tes_proses',compact('tahap1','tahap2','tahap3','tahap4','tahap5'))->with('selamat');
    }
}
