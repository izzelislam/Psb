<?php

namespace Database\Seeders;

use App\Models\Quis;
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

        $this->command->getOutput()->progressStart(300);
        for ($i=0; $i <300 ; $i++) { 
            Quis::create([
                'users_id'=>rand(2,302),
                'tahun_ajaran_id'=>rand(1,4),
                'nilai_tes_iq'=>rand(30,95),
                'nilai_tes_kepribadian'=>rand(200,1000),
                'status'=>null,
            ]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
