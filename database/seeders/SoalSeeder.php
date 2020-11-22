<?php

namespace Database\Seeders;

use App\Models\Soal;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Soal::truncate();
        $faker = Factory::create();

        $this->command->getOutput()->progressStart(200);
        for ($i=0; $i <200 ; $i++) { 
            Soal::create([
                'soal' =>$faker->paragraphs(rand(1,3),true),
                'gambar'=>$faker->randomElement(['pict1.jpg','pict2.png','pict3.jpeg',null,null]),
                'a'=>$faker->sentences(rand(1,3),true),
                'b'=>$faker->sentences(rand(1,3),true),
                'c'=>$faker->sentences(rand(1,3),true),
                'd'=>$faker->sentences(rand(1,3),true),
                'e'=>$faker->sentences(rand(1,3),true),
                'kunci_jawaban'=>$faker->randomElement(['a','b','c','d','e'])
            ]);
        }
    }
}
