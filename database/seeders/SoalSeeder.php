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
        for ($i=0; $i <60 ; $i++) { 
            Soal::create([
                'soal' =>$faker->paragraphs(rand(1,3),true),
                'gambar'=>$faker->randomElement(['img/pict1.jpg','img/pict2.png','img/pict3.jpeg',null,null]),
                'a'=>$faker->sentences(rand(1,3),true),
                'b'=>$faker->sentences(rand(1,3),true),
                'c'=>$faker->sentences(rand(1,3),true),
                'd'=>$faker->sentences(rand(1,3),true),
                'e'=>$faker->sentences(rand(1,3),true),
                'kunci_jawaban'=>'a'
                ]);
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
    }
}
