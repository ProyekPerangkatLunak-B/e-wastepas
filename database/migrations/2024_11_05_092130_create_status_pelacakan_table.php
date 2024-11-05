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
        Schema::create('status_pelacakan', function (Blueprint $table) {
            $table->id('id_status_pelacakan');
            $table->foreignId('id_penjemputan')->nullable()
                ->constrained('penjemputan', 'id_penjemputan') // Specify the referenced column
                ->onDelete('cascade');
            $table->enum('status', ['Dalam Proses', 'Selesai', 'Dibatalkan'])->nullable();
            $table->text('keterangan')->nullable();
            $table->string('lokasi_dropbox')->nullable();
            $table->timestamp('dibuat_pada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pelacakan');
    }
};
