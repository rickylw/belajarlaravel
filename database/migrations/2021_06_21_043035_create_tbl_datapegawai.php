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
            $table->string('name'); 
            $table->string('alamat');
            $table->string('tempatlahir');
            $table->date('tanggal_lahir');
            $table->string('pendidikan');
            $table->string('programstudi');
            $table->string('tahunkelulusan');
            $table->string('jabatan');
            $table->string('tanggalsk');
            $table->text('foto');
            $table->string('email');
            $table->string('hp');
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
