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
        Schema::create('sampah', function (Blueprint $table) {
            $table->id('id_sampah');
            $table->foreignId('id_jenis_sampah')->nullable()
                ->constrained('jenis_sampah', 'id_jenis_sampah') // Specify the referenced column
                ->onDelete('cascade');
            $table->foreignId('id_kategori_sampah')->nullable()
                ->constrained('kategori_sampah', 'id_kategori_sampah') // Specify the referenced column
                ->onDelete('cascade');
            $table->string('nama_sampah')->nullable();
            $table->string('deskripsi_sampah')->nullable();
            $table->integer('berat_sampah')->nullable();
            $table->timestamps();
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
