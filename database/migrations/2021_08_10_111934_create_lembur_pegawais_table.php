<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLemburPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lembur_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pegawai')->unsigned();
            $table->dateTime('jadwal_mulai_lembur');
            $table->dateTime('jadwal_selesai_lembur');
            $table->text('surat_keterangan_lembur')->nullable();
            $table->string('deskripsi')->collation('utf8mb4_general_ci');
            $table->integer('status');
            $table->bigInteger('diacc_oleh')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id')->on('tbl_datapegawai'); 
            $table->foreign('diacc_oleh')->references('id')->on('users'); 
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
        Schema::dropIfExists('lembur_pegawais');
    }
}
