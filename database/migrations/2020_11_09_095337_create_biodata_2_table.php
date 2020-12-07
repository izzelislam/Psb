<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodata2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('tahun_ajaran_id');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->text('alamt_lengkap');
            $table->foreignId('indonesia_provinces_id');
            $table->foreignId('indonesia_cities_id');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('pendidikan_terakhir');
            $table->string('asal_sekolah');
            $table->string('jurusan');
            $table->string('pengalaman_organisasi');
            $table->string('prestasi');
            $table->string('hobi');
            $table->string('cita_cita');
            $table->string('skill');
            $table->string('jumlah_hafalan');
            $table->string('tokoh_idola');
            $table->text('ustadz_idola');
            $table->text('tauhid');
            $table->string('kajian');
            $table->string('buku');
            $table->enum('perokok',['iya','tidak']);
            $table->enum('punya_pacar',['iya','tidak']);
            $table->enum('suka_game',['iya','tidak']);
            $table->string('nama_game')->nullable();
            $table->string('waktu_game')->nullable();
            $table->text('alasan_mendaftar');
            $table->text('kegiatan');
            $table->text('kepribadian');
            $table->enum('orang_tua',['lengkap','bapak','ibu','yatim-piatu']);
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->integer('penghasilan_ortu');
            $table->string('anak_ke');
            $table->integer('saudara');
            $table->string('no_wali');
            $table->string('keterangan')->nullable();
            $table->enum('izin_ortu',['iya','tidak']);
            $table->enum('punya_laptop',['iya','tidak']);
            $table->boolean('setuju');
            $table->enum('status',['sudah-dikerjakan','lolos','tidak'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_2');
    }
}
