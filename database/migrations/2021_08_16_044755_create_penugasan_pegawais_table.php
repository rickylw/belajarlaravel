<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penugasan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pegawai')->unsigned();
            $table->integer('jenis_penugasan');
            $table->longtext('deskripsi_penugasan')->collation('utf8mb4_general_ci');
            $table->dateTime('jadwal_mulai_penugasan');
            $table->dateTime('jadwal_akhir_penugasan');
            $table->text('surat_keterangan_penugasan')->nullable();
            $table->integer("status"); 
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
        Schema::dropIfExists('penugasan_pegawais');
    }
}
