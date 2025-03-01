<?php

namespace App\Models;

use App\Models\UserOTP;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama',
        'id_peran',
        'alamat',
        'email',
        'kata_sandi',
        'nomor_ktp',
        'tanggal_lahir',
        'no_rekening',
        'nomor_telepon',
        'status_verifikasi',
         'tanggal_dibuat',

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

    public function uploadDoc()
    {
        return $this->hasMany(UploadDocuments::class,"id_pengguna");
    }

    public function getAuthPassword()
    {
        return 'kata_sandi';
    }

}
