<?php

namespace App\Http\Controllers\Ujian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function video()
    {
        return view('front.ujian.video');
    }

    public function wawancara()
    {
        return view('front.ujian.wawancara');
    }
}
