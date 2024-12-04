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
        Schema::create('detail_penjemputan', function (Blueprint $table) {
            $table->id('id_detail_penjemputan');
            $table->foreignId('id_penjemputan')->nullable()
                ->constrained('penjemputan', 'id_penjemputan')
                ->onDelete('cascade');
            $table->foreignId('id_kategori')->nullable()
                ->constrained('kategori', 'id_kategori')
                ->onDelete('cascade');
            $table->foreignId('id_jenis')->nullable()
                ->constrained('jenis', 'id_jenis')
                ->onDelete('cascade');
            $table->decimal('berat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjemputan');
    }
};
