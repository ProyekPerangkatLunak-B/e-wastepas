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
            $table->id('id_jenis');
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_jenis');
            $table->integer('poin');
            $table->integer('jumlah_sampah');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori_sampah')->onDelete('cascade');
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
