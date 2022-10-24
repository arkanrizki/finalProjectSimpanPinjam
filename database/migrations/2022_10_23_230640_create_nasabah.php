<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nasabah')->unsigned();
            $table->string('nama');
            $table->string('id_user');
            $table->string('alamat');
            $table->integer('no_telp');
            $table->string('id_pekerjaan');
            $table->string('id_kecamatan');
            $table->string('id_koperasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nasabah');
    }
}
