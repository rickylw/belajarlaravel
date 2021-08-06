<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_training_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pegawai')->unsigned();
            $table->dateTime('jadwal_mulai_pelatihan');
            $table->dateTime('jadwal_akhir_pelatihan');
            $table->string('nama_pelatihan');
            $table->longText('deskripsi_pelatihan')->collation('utf8mb4_general_ci');
            $table->dateTime('diketahui_sdm')->nullable();
            $table->dateTime('diketahui_pimpinan')->nullable();
            $table->integer("status"); 
            $table->bigInteger('diajukan_oleh')->unsigned(); //yang mengajukan
            $table->foreign('id_pegawai')->references('id')->on('tbl_datapegawai'); 
            $table->foreign('diajukan_oleh')->references('id')->on('tbl_dataunitkerja'); 
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
        Schema::dropIfExists('training_pegawais');
    }
}
