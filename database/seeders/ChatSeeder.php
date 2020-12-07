<?php

namespace Database\Seeders;

use App\Models\Chat;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chat::truncate();

        $faker=Factory::create();
        for ($i=0; $i <150 ; $i++) { 
            Chat::create([
                'users_id'=>rand(5,40),
                'teman_id'=>rand(1,35),
                'pesan'=>$faker->sentences(rand(1,6),true)
            ]);
        }
    }
}
