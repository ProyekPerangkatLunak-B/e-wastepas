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
        Schema::create('dokumen_kurir', function (Blueprint $table) {
            $table->id('id_dokumen');
            $table->foreignId('id_pengguna')->nullable()
                ->constrained('pengguna', 'id_pengguna') // Specify the referenced column
                ->onDelete('cascade');
            $table->enum('tipe_dokumen', ['KTP', 'KK','NPWP'])->nullable();
            $table->string('file_dokumen')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
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
