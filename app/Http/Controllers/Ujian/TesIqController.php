<?php

namespace App\Http\Controllers\Ujian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesIqController extends Controller
{
    public function iq()
    {
        return view('front.ujian.tes-iq');
    }

    public function kepribadian()
    {
        return view('front.ujian.tes-kepribadian');
    }
}
