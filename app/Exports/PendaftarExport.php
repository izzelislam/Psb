<?php

namespace App\Exports;

use App\Models\Biodata1;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExport implements FromView,ShouldAutoSize,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data=Biodata1::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        }])->get();
        $biodata=$data->where('tahun_ajaran','!=',null);
        return view('admin.pendaftar.exel',compact('biodata'));
    }

    public function headings():array
    {   
        return[
            'nama',
            'umur',
            'no whatssapp',
            'kondisi keluarga',
            'jenis kelamin',
        ];
    }
}
