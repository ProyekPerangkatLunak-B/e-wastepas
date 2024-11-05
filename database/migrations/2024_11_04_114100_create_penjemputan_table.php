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
        Schema::create('penjemputan', function (Blueprint $table) {
            $table->integer('id_penjemputan')->primary();
            $table->unsignedBigInteger('id_dropbox');
            $table->integer('id_kurir');
            $table->integer('id_masyarakat');
            $table->unsignedBigInteger('id_daerah');
            $table->datetime('waktu_pembaruan')->nullable();
            $table->string('catatan', 255)->nullable();
            $table->integer('total_berat')->nullable();
            $table->integer('total_poin')->nullable();
            $table->string('lokasi_penjemputan', 255)->nullable();
            $table->string('status_permintaan', 50)->nullable();
            $table->datetime('waktu_permintaan')->nullable();
            $table->date('tanggal_permintaan')->nullable();
            $table->timestamps();

            $table->foreign('id_dropbox')->references('id_dropbox')->on('dropbox')->onDelete('cascade');
            $table->foreign('id_kurir')->references('id_registrasi_akun')->on('registrasi_akun')->onDelete('cascade');
            $table->foreign('id_masyarakat')->references('id_registrasi_akun')->on('registrasi_akun')->onDelete('cascade');
            $table->foreign('id_daerah')->references('id_daerah')->on('daerah')->onDelete('cascade');
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
