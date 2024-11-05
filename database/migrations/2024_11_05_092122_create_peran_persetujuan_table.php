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
        Schema::create('peran_persetujuan', function (Blueprint $table) {
            $table->id('id_peran_persetujuan');
            $table->foreignId('id_persetujuan')->nullable()
                ->constrained('persetujuan', 'id_persetujuan') // Specify the referenced column
                ->onDelete('cascade');
            $table->foreignId('id_peran')->nullable()
                ->constrained('peran', 'id_peran') // Specify the referenced column
                ->onDelete('cascade');
            $table->timestamp('dibuat_pada')->nullable();
            $table->timestamp('diperbarui_pada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peran_persetujuan');
    }
};
