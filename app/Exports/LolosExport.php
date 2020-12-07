<?php

namespace App\Exports;

use App\Models\Wawancara;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LolosExport implements FromView,ShouldAutoSize,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $lolos=Wawancara::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1','user.biodata2.kabupaten','user.biodata2.provinsi'])->where('status','=','lolos')->get();

        return view('admin.lolos.exel',compact('lolos'));
    }

    public function headings():array
    {   
        return[
            'Nama',
            'Kabupaten / Kota',
            'Provinsi',
        ];
    }
}





