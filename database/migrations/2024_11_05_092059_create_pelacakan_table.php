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
        Schema::create('pelacakan', function (Blueprint $table) {
            $table->id('id_pelacakan');
            $table->foreignId('id_penjemputan')->nullable()
                ->constrained('penjemputan', 'id_penjemputan')
                ->onDelete('cascade');
            $table->foreignId('id_dropbox')->nullable()
                ->constrained('dropbox', 'id_dropbox')
                ->onDelete('cascade');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Diproses', 'Diterima', 'Dijemput Kurir', 'Menuju Lokasi Penjemputan', 'Sampah Diangkut', 'Menuju Dropbox', 'Menyimpan Sampah di Dropbox', 'Selesai', 'Dibatalkan'])->default('Diproses')->nullable();
            $table->datetime('estimasi_waktu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};