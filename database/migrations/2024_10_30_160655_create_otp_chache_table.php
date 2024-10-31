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
        Schema::create('otp_chache', function (Blueprint $table) {
            $table->integer('id_otp_chace')->primary();
            $table->integer('id_pengguna');
            $table->timestamp('otp_dibuat')->useCurrent();
            $table->timestamp('otp_kadaluarsa')->nullable();
            $table->enum('otp_status', ['valid', 'expired', 'used'])->nullable();
            $table->string('otp_token', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id_registrasi_akun')->on('registrasi_akun')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_chache');
    }
};
