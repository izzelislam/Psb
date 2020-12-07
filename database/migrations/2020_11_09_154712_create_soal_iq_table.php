<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalIqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_iq', function (Blueprint $table) {
            $table->id();
            $table->text('soal');
            $table->string('gambar')->nullable();
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->text('e');
            $table->string('kunci_jawaban');
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
        Schema::dropIfExists('soal_iq');
    }
}
