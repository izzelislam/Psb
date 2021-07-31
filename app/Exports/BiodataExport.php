<?php

namespace App\Exports;

use App\Models\Biodata2;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class BiodataExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function view(): View
    {
        if (request()->get('gelombang') && request()->get('gelombang') != null){
            $data=Biodata2::with(['tahun_ajaran'=>function($query){
                $query->where('gelombang','=', request()->get('gelombang'));
            },'user.biodata1'])->orderBy('created_at','desc');
        } else {
            $data=Biodata2::with(['tahun_ajaran'=>function($query){
                $query->where('status','=','aktif');
            },'user.biodata1'])->orderBy('created_at','desc'); 
        }
        $data=$data->get();

        $biodata2=$data->where('tahun_ajaran','!=',null);
        return view('admin.statusdaftar.exel',compact('biodata2'));
    }

    public function headings():array
    {   
        return[
            'No',
            'Nama',
            'Umur',
            'Pendidikan',
            'Keluarga',
            'Orang Tua',
            'Penghasilan Ortu',
            'status'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => '@',
        ];
    }
}
