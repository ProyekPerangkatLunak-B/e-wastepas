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
        Schema::create('jenis_sampah', function (Blueprint $table) {
            $table->id('id_jenis_sampah');
            $table->foreignId('id_kategori_sampah')->nullable()
                ->constrained('kategori_sampah', 'id_kategori_sampah')  // Specify the referenced column
                ->onDelete('cascade');
            $table->string('nama_jenis_sampah')->nullable();
            $table->text('deskripsi_jenis_sampah')->nullable();
            $table->integer('poin')->nullable();
            $table->timestamps();
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
