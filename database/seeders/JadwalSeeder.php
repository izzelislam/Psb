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
                'gambar'=>$faker->randomElement(['img/banner-pondok.jpg','img/banner-pondok1.jpg','img/banner-pondok2.jpg']),
                'title'=>$faker->sentence(4,true),
                'isi'=>$faker->paragraphs(6,true),
            ]);
        }
    }
}
