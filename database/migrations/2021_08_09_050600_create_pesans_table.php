<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pesan', function (Blueprint $table) {
            $table->id();
            $table->string('subjek');
            $table->longText('isi_pesan')->collation('utf8mb4_general_ci');
            $table->bigInteger('dari_user')->unsigned();
            $table->bigInteger('ke_user')->unsigned();
            $table->integer('dibaca')->unsigned();
            $table->foreign('dari_user')->references('id')->on('users'); 
            $table->foreign('ke_user')->references('id')->on('users'); 
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
        Schema::dropIfExists('pesans');
    }
}
