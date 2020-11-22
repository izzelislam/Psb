<?php

namespace App\Http\Controllers\Ujian;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;

class TesIqController extends Controller
{
    public function iq()
    {
        $soal=Soal::all()->random(50);
        return view('front.ujian.tes-iq');
    }

    public function kepribadian()
    {
        return view('front.ujian.tes-kepribadian');
    }
}
