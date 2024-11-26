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
        Schema::create('jenis', function (Blueprint $table) {
            $table->id('id_jenis');
            $table->foreignId('id_kategori')->nullable()
                ->constrained('kategori', 'id_kategori')
                ->onDelete('cascade');
            $table->string('nama_jenis')->nullable();
            $table->text('deskripsi_jenis')->nullable();
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
