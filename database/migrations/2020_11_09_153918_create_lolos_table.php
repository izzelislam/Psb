<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lolos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id');
            $table->foreignId('tahun_ajaran_id');
            $table->enum('status',['sudah-dikerjakan','lolos','tidak'])->nullable();
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
        Schema::dropIfExists('lolos');
    }
}
