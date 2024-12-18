<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->foreignId('id_peran')->nullable()
                ->constrained('peran', 'id_peran')
                ->onDelete('cascade');
            $table->string('nomor_ktp')->nullable()->unique();
            $table->string('nama', 50)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('email', 255)->nullable()->unique();
            $table->string('kata_sandi', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('foto_profil', 255)->nullable();
            $table->date('tanggal_dibuat')->nullable();
            $table->string('nomor_telepon', 255)->nullable();
            $table->string('no_rekening', 255)->nullable();
            $table->integer('subtotal_poin')->nullable();
            $table->tinyInteger('nomor_terverifikasi')->nullable();
            $table->timestamp('tanggal_email_diverifikasi')->nullable();
            $table->timestamp('tanggal_update')->nullable();
            $table->timestamp('tanggal_dihapus')->nullable();
            $table->timestamp('tanggal_diverifikasi')->nullable();
            $table->enum('status_verifikasi', ['Diterima', 'Ditolak', 'Diproses'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
