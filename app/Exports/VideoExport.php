<?php

namespace App\Exports;

use App\Models\Video;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class VideoExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $video=Video::with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        },'user.biodata1','user.video'])->get();

        return view('admin.video.excel',compact('video'));
    }

    public function headings():array
    {   
        return[
            'Nama',
            'link',
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
