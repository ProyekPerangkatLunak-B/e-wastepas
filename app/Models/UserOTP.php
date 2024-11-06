<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserOTP extends Model
{
    protected $table = 'otp_cache';
    protected $primaryKey = 'id_otp_cache';

    protected $fillable = [
        'otp_token',
        'id_pengguna',
        'otp_kadaluarsa',
        'otp_status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}
