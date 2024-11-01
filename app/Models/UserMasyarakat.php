<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMasyarakat extends Model
{
    public function up()
    {
        Schema::create('user_masyarakat', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Kolom untuk nama pengguna
            $table->string('email')->unique(); // Kolom untuk email dengan unique constraint
            $table->string('password'); // Kolom untuk password
            // $table->string('otp')->nullable(); // Kolom untuk kode OTP, bisa null
            // $table->timestamps(); // Kolom untuk timestamps (created_at dan updated_at)
        });
    }
}

