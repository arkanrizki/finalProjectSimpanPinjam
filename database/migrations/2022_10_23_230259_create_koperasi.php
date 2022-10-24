<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoperasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koperasi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_koperasi');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('npwp')->unsigned();
            $table->string('nama_pimpinan');
            $table->string('nama_bendahara');
            $table->integer('no_telp');
            $table->string('email');
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
        Schema::dropIfExists('koperasi');
    }
}
