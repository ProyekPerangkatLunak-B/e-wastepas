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
        Schema::create('detail_penjemputan', function (Blueprint $table) {
            $table->id('id_detail_penjemputan');
            $table->foreignId('id_sampah')->nullable()
                ->constrained('sampah', 'id_sampah') // Specify the referenced column
                ->onDelete('cascade');
            $table->foreignId('id_penjemputan')->nullable()
                ->constrained('penjemputan', 'id_penjemputan') // Specify the referenced column
                ->onDelete('cascade');
            $table->decimal('subtotal_sampah', 10, 2)->nullable();
            $table->double('subtotal_berat')->nullable();
            $table->integer('estimasi_point')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjemputan');
    }
};
