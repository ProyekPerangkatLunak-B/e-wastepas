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
        Schema::create('sampah', function (Blueprint $table) {
            $table->integer('id_sampah')->primary();
            $table->integer('id_jenis_sampah');
            $table->integer('id_kategori_sampah')->nullable();
            $table->string('nama_sampah', 255)->nullable();
            $table->string('deskripsi_sampah', 255)->nullable();
            $table->integer('id_penjemputan')->nullable();
            $table->integer('berat')->nullable();
            $table->timestamps();

            $table->foreign('id_jenis_sampah')->references('id_jenis_sampah')->on('jenis_sampah')->onDelete('cascade');
            $table->foreign('id_kategori_sampah')->references('id_kategori_sampah')->on('kategori_sampah')->onDelete('cascade');
            $table->foreign('id_penjemputan')->references('id_penjemputan')->on('penjemputan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampah');
    }
};
