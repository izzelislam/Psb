<?php

namespace App\Exports;

use App\Models\Quis;
use App\Models\Wawancara;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class NilaiExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $nilai=Quis::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1', 'user.quis'])->get();

        return view('admin.nilai.excel',compact('nilai'));
    }

    public function headings():array
    {   
        return[
            'Nama',
            'nilai tes iq',
            'nilai tes kepribadian',
            'no wa',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => '@',
        ];
    }

}