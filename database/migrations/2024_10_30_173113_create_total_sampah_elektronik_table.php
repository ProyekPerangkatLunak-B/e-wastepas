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
        Schema::create('total_sampah_elektronik', function (Blueprint $table) {
            $table->id('id_total');
            $table->unsignedBigInteger('id_mitra_kurir');
            $table->integer('total_dijemput');
            $table->date('tanggal_perhitungan');
            $table->timestamps();

            $table->foreign('id_mitra_kurir')->references('id_mitra_kurir')->on('mitra_kurir')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_sampah_elektronik');
    }
};
