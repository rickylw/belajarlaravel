<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jadwal_tes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('jadwal_tes');
            $table->longText('deskripsi');
            $table->bigInteger('id_pelamar')->unsigned();
            $table->bigInteger('id_jenis_interview')->unsigned();
            //menambahkan relasi  
            $table->foreign('id_jenis_interview')->references('id')->on('tbl_jenis_interview'); 
            $table->foreign('id_pelamar')->references('id')->on('datapelamar'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_tes');
    }
}
