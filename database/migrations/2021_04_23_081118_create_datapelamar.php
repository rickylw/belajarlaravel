<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapelamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapelamar', function (Blueprint $table) { 
            $table->id(); 
            $table->string("nama");
            $table->date("tanggal_lahir"); 
            $table->string("tempat_lahir");
            $table->integer("jenis_kelamin"); 
            $table->string("email"); 
            $table->string("no_hp"); 
            $table->text("foto_kk"); 
            $table->text("foto_ktp"); 
            $table->text("foto_ijazah"); 
            $table->text("foto_diri");
            $table->text("foto_skck");
            $table->text("surat_keterangan_sehat");
            $table->text("surat_pengalaman_kerja")->nullable();
            $table->text("surat_keterangan_diterima")->nullable();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger("status")->unsigned(); 
            $table->timestamps();
            //menambahkan primary dan field unik 
            $table->unique('id_user'); 
            //menambahkan relasi 
            $table->foreign('id_user')->references('id')->on('users'); 
            $table->foreign('status')->references('id')->on('tbl_status_pelamar'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapelamar'); 
    }
}
