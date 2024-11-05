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
        Schema::create('registrasi_akun', function (Blueprint $table) {
            $table->integer('id_registrasi_akun')->primary();
            $table->string('nama', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('kata_sandi', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('foto_profil', 255)->nullable();
            $table->string('status_token', 50)->nullable();
            $table->string('reset_token', 50)->nullable();
            $table->string('kode_otp', 50)->nullable();
            $table->date('tanggal_dibuat')->nullable();
            $table->string('nomor_telepon', 50)->nullable();
            $table->string('no_rekening', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->boolean('nomor_terverifikasi')->default(false);
            $table->timestamp('tangga_email_diverifikasi')->nullable();
            $table->timestamp('tanggal_nomor_diverifikasi')->nullable();
            $table->timestamp('tanggal_update')->nullable();
            $table->timestamp('tanggal_dihapus')->nullable();
            $table->timestamp('tanggal_diverifikasi')->nullable();
            $table->enum('status_verifikasi', ['verified', 'unverified'])->nullable();
            $table->integer('id_role')->nullable();
            $table->timestamps();

            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_akun');
    }
};
