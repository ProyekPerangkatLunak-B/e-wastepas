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
        Schema::create('dokumen_kurir', function (Blueprint $table) {
            $table->integer('id_dokumen')->primary();
            $table->integer('id_registrasi_akun');
            $table->enum('tipe_dokumen', ['ktp', 'kk'])->nullable();
            $table->string('file_dokumen', 255)->nullable();
            $table->text('catatan_admin')->nullable();
            $table->timestamps();

            $table->foreign('id_registrasi_akun')->references('id_registrasi_akun')->on('registrasi_akun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_kurir');
    }
};
