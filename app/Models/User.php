<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserOTP;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    // /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
// /**azQA  z   ZQ
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
        'nomor_ktp',
        'nomor_telepon'
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    public function activeOTP()
    {
        return $this->hasOne(UserOTP::class,'id_pengguna')->where('otp_kadaluarsa','>', 'now()');
    }

    public function getAuthPasswordName()
    {
        return 'kata_sandi';
    }

}
