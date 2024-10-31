<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('riwayat_penjemputan', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->unsignedBigInteger('id_permintaan');
            $table->date('tanggal_penjemputan');
            $table->string('status_penjemputan');
            $table->timestamps();

            $table->foreign('id_permintaan')->references('id_permintaan')->on('permintaan_penjemputan')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penjemputan');
    }
};
