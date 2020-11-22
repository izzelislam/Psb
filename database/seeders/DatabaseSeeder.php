<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            TahunAjaran::class,
            Biodata1Seeder::class,
            Biodata2Seeder::class,
            QnaSeeder::class,
            JadwalSeeder::class,
            QuisSeeder::class,
            SoalSeeder::class,
            
        ]);
    }
}
