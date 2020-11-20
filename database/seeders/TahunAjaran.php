<?php

namespace Database\Seeders;

use App\Models\TahunAjaran as ModelsTahunAjaran;
use Illuminate\Database\Seeder;

class TahunAjaran extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsTahunAjaran::truncate();

        ModelsTahunAjaran::create([
            'tahun'=>'2019',
            'gelombang'=>'gel-1',
            'status'=>'tidak-aktif',
        ]);

        ModelsTahunAjaran::create([
            'tahun'=>'2019',
            'gelombang'=>'gel-2',
            'status'=>'tidak-aktif',
        ]);

        ModelsTahunAjaran::create([
            'tahun'=>'2020',
            'gelombang'=>'gel-1',
            'status'=>'tidak-aktif',
        ]);

        ModelsTahunAjaran::create([
            'tahun'=>'2020',
            'gelombang'=>'gel-2',
            'status'=>'aktif',
        ]);
    }
}
