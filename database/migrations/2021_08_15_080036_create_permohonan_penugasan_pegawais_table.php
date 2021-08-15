<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanPenugasanPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_permohonan_penugasan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pegawai')->unsigned();
            $table->string('judul');
            $table->longtext('deskripsi_penugasan')->collation('utf8mb4_general_ci');
            $table->foreign('id_pegawai')->references('id')->on('tbl_datapegawai'); 
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
        Schema::dropIfExists('permohonan_penugasan_pegawais');
    }
}
