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
        Schema::create('jenis_sampah', function (Blueprint $table) {
            $table->bigIncrements('id_jenis_sampah')->primary();
            $table->unsignedBigInteger('id_kategori_sampah');
            $table->string('nama_jenis_sampah', 250)->nullable();
            $table->string('deskripsi_jenis_sampah', 250)->nullable();
            $table->integer('poin')->nullable();
            $table->timestamps();

            $table->foreign('id_kategori_sampah')->references('id_kategori_sampah')->on('kategori_sampah')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_sampah');
    }
};
