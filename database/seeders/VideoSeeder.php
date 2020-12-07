<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Video;
use Faker\Factory;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::truncate();

        $faker=Factory::create();
        $user=User::all()->pluck('id');
        $user_id=$user->toArray();

        for ($i=2; $i <202; $i++) { 
            Video::create([
                'users_id'=>$i,
                'tahun_ajaran_id'=>$faker->randomElement([1,2,3,4]),
                'link'=>$faker->url
            ]);
        }
    }
}
