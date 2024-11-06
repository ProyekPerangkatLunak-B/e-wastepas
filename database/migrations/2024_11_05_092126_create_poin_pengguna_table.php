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
        Schema::create('poin_pengguna', function (Blueprint $table) {
            $table->id('id_poin_pengguna');
            $table->foreignId('id_pengguna')->nullable()
                ->constrained('pengguna', 'id_pengguna') // Specify the referenced column
                ->onDelete('cascade');
            $table->foreignId('id_penjemputan')->nullable()
                ->constrained('penjemputan', 'id_penjemputan') // Specify the referenced column
                ->onDelete('cascade');
            $table->string('nama_peran')->nullable();
            $table->text('deskripsi_poin_pengguna')->nullable();
            $table->integer('poin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_pengguna');
    }
};
