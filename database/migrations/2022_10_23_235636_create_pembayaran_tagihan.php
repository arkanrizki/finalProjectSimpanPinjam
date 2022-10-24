<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTagihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_tagihan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pembayaran_tagihan')->unsigned();
            $table->integer('id_tagihan');
            $table->string('jml_bayar');
            $table->date('tgl_bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_tagihan');
    }
}
