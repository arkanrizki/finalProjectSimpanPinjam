<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatReorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_reorder', function (Blueprint $table) {
            $table->id();
            $table->foreignId('koperasi_id')->constrained('koperasi')->onDelete('cascade');
            $table->date('tgl_order');
            $table->foreignId('order_id')->constrained('order_langganan')->onDelete('cascade');
            $table->string('status_order');
            $table->date('tgl_mulai_langganan');
            $table->date('tgl_berakhir_langganan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_reorder');
    }
}
