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
        Schema::create('otp_cache', function (Blueprint $table) {
            $table->id('id_otp_cache');
            $table->foreignId('id_pengguna')->nullable()
                ->constrained('pengguna', 'id_pengguna') // Specify the referenced column if it's not 'id'
                ->onDelete('cascade');
            $table->timestamp('otp_kadaluarsa')->nullable();
            $table->tinyInteger('otp_status')->nullable();
            $table->string('otp_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_cache');
    }
};
