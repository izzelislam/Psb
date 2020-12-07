<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Teman;
use Illuminate\Database\Seeder;

class TemanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teman::truncate();

        for ($i=0; $i <35 ; $i++) { 
            Teman::create([
                'users_id'=>rand(5,40),
            ]);
        }
    }
}
