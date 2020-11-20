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
            'email'=>'admin@admin',
            'password'=>bcrypt('12345678'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'pendaftar',
            'email'=>'pendaftar@pendaftar',
            'password'=>bcrypt('12345678'),
            'role'=>'pendaftar'
        ]);

        $faker=Factory::create('id_ID');
        for ($i=2; $i <500 ; $i++) { 
            User::create([
                'name'=>$faker->name('male'),
                'email'=>$faker->email,
                'password'=>bcrypt(123),
                'role'=>'pendaftar'
            ]);
        }
    }
}
