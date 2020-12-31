<?php

namespace Database\Seeders;

use App\Models\Kepribadian;
use Faker\Factory;
use Illuminate\Database\Seeder;

class KepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kepribadian::truncate();

        $faker=Factory::create();

        $this->command->getOutput()->progressStart(200);
        for ($i=0; $i <200 ; $i++) { 
            Kepribadian::create([
                'soal'=>$faker->paragraphs(rand(1,2),true),
                'a'=>$faker->sentence(rand(1,3),true),
                'b'=>$faker->sentence(rand(1,3),true),
                'c'=>$faker->sentence(rand(1,3),true),
                'd'=>$faker->sentence(rand(1,3),true),
                'e'=>$faker->sentence(rand(1,3),true),
                'poin_a'=>$faker->randomElement([1]),
                'poin_b'=>$faker->randomElement([2]),
                'poin_c'=>$faker->randomElement([3]),
                'poin_d'=>$faker->randomElement([4]),
                'poin_e'=>$faker->randomElement([5]),
            ]);
        }
    }
}
