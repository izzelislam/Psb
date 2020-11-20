<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    public function provinsi()
    {
        return DB::table('indonesia_provinces')->get();
    }

    public function kabupaten($provisi_id)
    {
        return DB::table('indonesia_cities')->where('province_id','=',$provisi_id)->get();
    }
}
