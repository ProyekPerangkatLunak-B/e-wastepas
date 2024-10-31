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
        Schema::create('permintaan_penjemputan', function (Blueprint $table) {
            $table->id('id_permintaan');
            $table->unsignedBigInteger('id_mitra_kurir');
            $table->unsignedBigInteger('id_jenis');
            $table->string('lokasi_penjemputan');
            $table->string('status');
            $table->date('waktu_permintaan');
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_mitra_kurir')->references('id_mitra_kurir')->on('mitra_kurir')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis_sampah')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_penjemputan');
    }
};
