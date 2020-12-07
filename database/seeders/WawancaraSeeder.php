<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wawancara;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WawancaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wawancara::truncate();
        $faker=Factory::create();

        $this->command->getOutput()->progressStart('100');
        $user=User::all()->pluck('id');
        $user_id=$user->toArray();

        for ($i=2; $i <202 ; $i++) { 
            Wawancara::create([
                'users_id'=>$i,
                'tahun_ajaran_id'=>$faker->randomElement([1,2,3,4]),
                'status'=>null
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
