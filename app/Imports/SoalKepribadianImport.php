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
            'poin_a'=>$row[7],
            'poin_b'=>$row[8],
            'poin_c'=>$row[9],
            'poin_d'=>$row[10],
            'poin_e'=>$row[11],
        ]);
    }
}
