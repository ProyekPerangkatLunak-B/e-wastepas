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
        Schema::create('dropbox', function (Blueprint $table) {
            $table->integer('id_dropbox')->primary();
            $table->string('nama', 255)->nullable();
            $table->integer('id_wilayah')->nullable();
            $table->timestamps();

            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dropbox');
    }
};
