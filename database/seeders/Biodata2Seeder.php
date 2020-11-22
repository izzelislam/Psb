<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Biodata2;
use App\Models\IndonesiaCity;
use App\Models\IndonesiaProvince;

class Biodata2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biodata2::truncate();
        $this->command->getOutput()->progressStart(500);

        $faker=Factory::create('id_ID');
        $kota=IndonesiaCity::all()->pluck('id');
        $kota_id=$kota->toArray();

        for ($i=0; $i <500 ; $i++) { 
            Biodata2::create([
                'users_id'=>rand(1,500),
                'tahun_ajaran_id'=>rand(1,4),
                'tanggal_lahir'=>$faker->date('Y-m-d','2005-12-01'),
                'tempat_lahir'=>$faker->city,
                'alamt_lengkap'=>$faker->address,
                'indonesia_provinces_id'=>rand(11,94),
                'indonesia_cities_id'=>$faker->randomElement($kota_id),
                'facebook'=>$faker->url,
                'instagram'=>$faker->url,
                'pendidikan_terakhir'=>$faker->randomElement(['SMP','SMA']),
                'asal_sekolah'=>$faker->citySuffix,
                'jurusan'=>$faker->randomElement(['IPA','IPS','BAHASA','AGAMA','TIK','TKJ','RPL','FARMASI','AKUNTANSI','LAINNYA']),
                'pengalaman_organisasi'=>$faker->randomElement(['osis','pramuka','rohis','lainya']),
                'prestasi'=>$faker->sentence(6,true),
                'hobi'=>$faker->randomElement(['Baca','Renang','Sepak Bola','Traveling','Rebahan','Makan','Sepeda','Naik Gunung','Lain Lain']),
                'cita_cita'=>$faker->word(3,false),
                'skill'=>$faker->word(3,false),
                'jumlah_hafalan'=>rand(1,30),
                'tokoh_idola'=>$faker->name('male'),
                'ustadz_idola'=>$faker->name('male'),
                'tauhid'=>'...',
                'kajian'=>$faker->word(3,false),
                'buku'=>$faker->sentence(3,true),
                'perokok'=>$faker->randomElement(['iya','tidak']),
                'punya_pacar'=>$faker->randomElement(['iya','tidak']),
                'suka_game'=>$faker->randomElement(['iya','tidak']),
                'nama_game'=>$faker->sentence(6,true),
                'waktu_game'=>rand(1,24),
                'alasan_mendaftar'=>$faker->sentence(30,true),
                'kegiatan'=>$faker->sentence(30,true),
                'kepribadian'=>$faker->sentence(30,true),
                'orang_tua'=>$faker->randomElement(['lengkap','bapak','ibu','yatim-piatu']),
                'nama_ayah'=>$faker->name('male'),
                'pekerjaan_ayah'=>$faker->jobTitle,
                'nama_ibu'=>$faker->name('female'),
                'pekerjaan_ibu'=>$faker->jobTitle,
                'penghasilan_ortu'=>rand(500000,4000000),
                'anak_ke'=>rand(1,12),
                'saudara'=>rand(1,12),
                'no_wali'=>$faker->e164PhoneNumber,
                'keterangan'=>$faker->sentence(20,true),
                'izin_ortu'=>$faker->randomElement(['iya','tidak']),
                'punya_laptop'=>$faker->randomElement(['iya','tidak']),
                'setuju'=>1,
                'status'=>null,
            ]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
