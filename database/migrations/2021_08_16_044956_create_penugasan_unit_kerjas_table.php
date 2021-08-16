<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanUnitKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penugasan_unitkerja', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_unitkerja')->unsigned();
            $table->integer('jenis_penugasan'); // 0 = internal, 1 = external
            $table->longtext('deskripsi_penugasan')->collation('utf8mb4_general_ci');
            $table->dateTime('jadwal_mulai_penugasan');
            $table->dateTime('jadwal_akhir_penugasan');
            $table->text('surat_keterangan_penugasan')->nullable();
            $table->integer("status"); 
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
        Schema::dropIfExists('penugasan_unit_kerjas');
    }
}
