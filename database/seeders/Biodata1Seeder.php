<?php

namespace Database\Seeders;

use App\Models\Biodata1;
use Illuminate\Database\Seeder;
use Faker\Factory;

class Biodata1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biodata1::truncate();
        $this->command->getOutput()->progressStart(100);
        $faker=Factory::create('id_ID');

        for ($i=2; $i <202 ; $i++) { 
            Biodata1::create([
                'users_id'=>$i,
                'tahun_ajaran_id'=>$faker->randomElement([1,2,3,4]),
                'nama'=>$faker->name('male'),
                'keluarga'=>$faker->randomElement(['mampu','tidak-mampu']),
                'umur'=>rand(16,21),
                'tanggal_lahir'=>$faker->date('Y-m-d','2005-12-01'),
                'no_wa'=>$faker->e164PhoneNumber,
                'jenis_kelamin'=>'laki-laki'
            ]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
