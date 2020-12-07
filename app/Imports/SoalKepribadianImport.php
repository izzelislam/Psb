<?php

namespace App\Imports;

use App\Models\Kepribadian;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SoalKepribadianImport implements ToModel, WithStartRow
{
    /**
    * @param Collection $collection
    */


    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return New Kepribadian([
            'soal'=>$row[1],
            'a'=>$row[2],
            'b'=>$row[3],
            'c'=>$row[4],
            'd'=>$row[5],
            'e'=>$row[6],
            'kunci_jawaban'=>$row[7],
        ]);
    }
}
