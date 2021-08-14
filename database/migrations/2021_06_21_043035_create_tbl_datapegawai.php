<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDatapegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_datapegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama'); 
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_ktp');
            $table->integer('jenis_kelamin');
            $table->integer('status');
            $table->string('jabatan');
            $table->string('agama');
            $table->string('no_hp');
            $table->string('email');
            $table->text('foto_diri');
            $table->date('tanggal_sk');
            $table->string('pendidikan');
            $table->string('program_studi')->nullable();
            $table->string('tahun_kelulusan');
            $table->text('sk_pegawai_tetap')->nullable();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_pelamar')->unsigned();
            $table->unique('id_user'); 
            $table->unique('id_pelamar'); 
            $table->foreign('id_user')->references('id')->on('users'); 
            $table->foreign('id_pelamar')->references('id')->on('datapelamar'); 
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
        Schema::dropIfExists('tbl_datapegawai');
    }
}
