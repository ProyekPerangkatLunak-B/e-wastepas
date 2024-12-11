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
            $table->char('kode_penjemputan', 12);
            $table->foreignId('id_daerah')->nullable()
                ->constrained('daerah', 'id_daerah')
                ->onDelete('cascade');
            $table->foreignId('id_dropbox')->nullable()
                ->constrained('dropbox', 'id_dropbox')
                ->onDelete('cascade');
            $table->foreignId('id_pengguna_masyarakat')->nullable()
                ->constrained('pengguna', 'id_pengguna')
                ->onDelete('cascade');
            $table->foreignId('id_pengguna_kurir')->nullable()
                ->constrained('pengguna', 'id_pengguna')
                ->onDelete('cascade');
            $table->double('total_berat')->nullable();
            $table->integer('total_poin')->nullable();
            $table->dateTime('tanggal_penjemputan')->nullable();
            $table->string('alamat_penjemputan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
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