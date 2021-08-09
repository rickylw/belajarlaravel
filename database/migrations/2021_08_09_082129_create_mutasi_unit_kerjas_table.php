<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiUnitKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mutasi_unikerja', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_unitkerja')->unsigned();
            $table->string('pekerjaan_awal');
            $table->string('jabatan_awal');
            $table->string('pekerjaan_tujuan');
            $table->string('jabatan_tujuan');
            $table->string('deskripsi')->collation('utf8mb4_general_ci');
            $table->bigInteger('dimutasi_oleh')->unsigned();
            $table->foreign('id_unitkerja')->references('id')->on('tbl_dataunitkerja'); 
            $table->foreign('dimutasi_oleh')->references('id')->on('users'); 
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
        Schema::dropIfExists('mutasi_unit_kerjas');
    }
}
