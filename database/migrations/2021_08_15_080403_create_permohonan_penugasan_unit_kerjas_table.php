<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanPenugasanUnitKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_permohonan_penugasan_unitkerja', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_unitkerja')->unsigned();
            $table->string('judul');
            $table->longtext('deskripsi_penugasan')->collation('utf8mb4_general_ci');
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
        Schema::dropIfExists('permohonan_penugasan_unit_kerjas');
    }
}
