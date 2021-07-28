<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPenugasan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penugasan', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama'); 
            $table->string('jabatan');
            $table->string('pekerjaan'); 
            $table->string('jenispenugasan');
            $table->text('deskripsipenugasan');
            $table->string('email');
            $table->string('hp');
            $table->string('hari');
            $table->string('tanggal');
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
        Schema::dropIfExists('tbl_penugasan');
    }
}