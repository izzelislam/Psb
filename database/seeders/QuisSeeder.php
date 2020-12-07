<?php

namespace Database\Seeders;

use App\Models\Quis;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quis::truncate();
        $faker=Factory::create();

        $this->command->getOutput()->progressStart(200);
        for ($i=2; $i <202 ; $i++) { 
            Quis::create([
                'users_id'=>$i,
                'tahun_ajaran_id'=>$faker->randomElement([1,2,3,4]),
                'nilai_tes_iq'=>rand(30,95),
                'nilai_tes_kepribadian'=>rand(200,1000),
                'status'=>null,
            ]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
