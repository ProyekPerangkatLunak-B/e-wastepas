<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    // Pastikan deklarasi $table dan $fillable berada di baris terpisah dan tidak ada tanda koma di akhir deklarasi
    protected $table = 'otp_cache';

    protected $fillable = [
        'email',
        'otp',
        'expires_at',
    ];
}


