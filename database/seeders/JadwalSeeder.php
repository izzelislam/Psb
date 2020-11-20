<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Faker\Factory;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::truncate();

        $faker=Factory::create('id_ID');

        for ($i=0; $i <20 ; $i++) { 
            Jadwal::create([
                'nama_kegiatan'=>$faker->sentence(6,true),
                'tanggal'=>$faker->date('Y-m-d','now'),
                'penaggung_jawab'=>$faker->name('male'),
            ]);
        }
    }
}
