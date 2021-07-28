<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHasilInterview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hasil_interview', function (Blueprint $table) {
            $table->id();
            $table->longText('hasil_interview')->collation('utf8mb4_general_ci');
            $table->bigInteger('id_pelamar')->unsigned();
            //menambahkan primary dan field unik 
            $table->unique('id_pelamar'); 
            //menambahkan relasi 
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
        Schema::dropIfExists('tbl_hasil_interview');
    }
}
