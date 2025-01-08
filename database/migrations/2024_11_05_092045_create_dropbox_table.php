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
        Schema::create('dropbox', function (Blueprint $table) {
            $table->id('id_dropbox');
            $table->foreignId('id_daerah')->nullable()
                ->constrained('daerah', 'id_daerah') // Specify the referenced column
                ->onDelete('cascade');
            $table->string('nama_dropbox')->nullable();
            $table->text('alamat_dropbox')->nullable();
            $table->tinyInteger('status_dropbox')->nullable();
            $table->timestamps();
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
