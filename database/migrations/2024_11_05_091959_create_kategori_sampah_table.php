<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_sampah', function (Blueprint $table) {
            $table->id('id_kategori_sampah');
            $table->string('nama_kategori_sampah')->nullable();
            $table->text('deskripsi_kategori_sampah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_sampah');
    }
};
