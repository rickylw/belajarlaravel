<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensiunPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pensiun_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pegawai')->unsigned();
            $table->longtext('analisis_sdm')->collation('utf8mb4_general_ci');
            $table->text('surat_keterangan_pensiun')->nullable();
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
        Schema::dropIfExists('pensiun_pegawais');
    }
}
