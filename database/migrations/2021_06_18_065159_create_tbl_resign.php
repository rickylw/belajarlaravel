<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblResign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_resign', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama'); 
            $table->string('nip');
            $table->string('jabatan'); 
            $table->string('pekerjaan');
            $table->string('hari');
            $table->string('tanggal');
            $table->string('alamat');
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
        Schema::dropIfExists('tbl_resign');
    }
}