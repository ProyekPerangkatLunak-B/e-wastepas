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
        Schema::create('penjemputan', function (Blueprint $table) {
            $table->id('id_penjemputan');
            $table->foreignId('id_dropbox')->nullable()
                ->constrained('dropbox', 'id_dropbox') // Specify the referenced column
                ->onDelete('cascade');
            $table->foreignId('id_pengguna')->nullable()
                ->constrained('pengguna', 'id_pengguna') // Specify the referenced column
                ->onDelete('cascade');
            $table->text('catatan')->nullable();
            $table->double('subtotal_berat')->nullable();
            $table->integer('subtotal_poin')->nullable();
            $table->string('lokasi_penjemputan')->nullable();
            $table->enum('status_permintaan', ['Menunggu Konfirmasi', 'Dijemput Kurir', 'Menuju Dropbox', 'E-Waste Tiba'])->nullable();
            $table->dateTime('waktu_permintaan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjemputan');
    }
};
