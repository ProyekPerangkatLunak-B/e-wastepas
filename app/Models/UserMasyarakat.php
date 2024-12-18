<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserMasyarakat extends Authenticatable
{
    use Notifiable;

    protected $table = 'pengguna'; // Nama tabel
    protected $primaryKey = 'id_pengguna'; // Primary key
    public $timestamps = true; // Gunakan timestamps jika tabel mendukung

    protected $fillable = [
        'id_peran',
        'nomor_ktp',
        'nama',
        'alamat',
        'email',
        'kata_sandi',
        'tanggal_lahir',
        'foto_profil',
        'nomor_telepon',
        'no_rekening',
        'subtotal_poin',
        'status_verifikasi',
    ];

    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->kata_sandi; // Pastikan kolom password sesuai
    }
}
