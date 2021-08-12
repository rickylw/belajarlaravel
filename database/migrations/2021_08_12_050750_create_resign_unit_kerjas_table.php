<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResignUnitKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_resign_unitkerja', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_unitkerja')->unsigned();
            $table->string('alasan_pengunduran_diri')->collation('utf8mb4_general_ci');
            $table->string('analisis_sdm')->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('diketahui_sdm')->nullable();
            $table->dateTime('diketahui_pimpinan')->nullable();
            $table->integer('status');
            $table->dateTime('waktu_berhenti');
            $table->text('surat_keterangan_resign')->nullable();
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
        Schema::dropIfExists('resign_unit_kerjas');
    }
}
