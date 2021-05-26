<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name'=>'admin',
            'email'=>'pondokit@admin',
            'password'=>bcrypt('secret1234'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'pendaftar',
            'email'=>'pendaftar@pendaftar',
            'password'=>bcrypt('12345678'),
            'role'=>'pendaftar'
        ]);

        // $faker=Factory::create('id_ID');
        // for ($i=2; $i < 202 ; $i++) { 
        //     User::create([
        //         'name'=>$faker->name('male'),
        //         'email'=>$faker->unique()->email,
        //         'password'=>bcrypt(123),
        //         'role'=>'pendaftar'
        //     ]);
        // }
    }
}
