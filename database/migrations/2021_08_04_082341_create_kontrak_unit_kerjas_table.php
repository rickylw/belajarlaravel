<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontrakUnitKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kontrak_unitkerja', function (Blueprint $table) {
            $table->id();
            $table->integer('lama_kontrak'); //bulan
            $table->bigInteger('id_unitkerja')->unsigned();
            $table->integer('status'); //bulan
            $table->date('tanggal_habis_kontrak');
            $table->foreign('id_unitkerja')->references('id')->on('tbl_dataunitkerja'); 
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
        Schema::dropIfExists('kontrak_unit_kerjas');
    }
}
