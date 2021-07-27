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

class WawancaraExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $wawancara=Wawancara::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1'])->get();

        return view('admin.wawancara.excel',compact('wawancara'));
    }

    public function headings():array
    {   
        return[
            'Nama',
            'no wa',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => '@',
        ];
    }

}