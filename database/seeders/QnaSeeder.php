<?php

namespace Database\Seeders;

use App\Models\Qna;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Qna::truncate();
        $faker=Factory::create('id_ID');

        for ($i=0; $i <20 ; $i++) { 
            Qna::create([
                'pertanyaan'=>$faker->sentences(3,true),
                'jawaban'=>$faker->paragraphs(3,true)
            ]);
        }
    }
}
