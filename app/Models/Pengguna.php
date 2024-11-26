<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    public $timestamps = true;

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
        'status',
        'nomor_terverifikasi',
        'tanggal_email_diverifikasi',
        'tanggal_update',
        'tanggal_dihapus',
        'tanggal_diverifikasi',
        'status_verifikasi',
    ];

    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    protected $dates = [
        'tanggal_lahir',
        'tanggal_dibuat',
        'tanggal_update',
        'tanggal_dihapus',
        'tanggal_diverifikasi',
        'tanggal_email_diverifikasi',
    ];

    /**
     * Relasi dengan tabel `peran` (foreign key `id_peran`)
     */
    public function peran()
    {
        return $this->belongsTo(Peran::class, 'id_peran', 'id_peran');
    }

    /**
     * Relasi dengan tabel `otp_cache`
     */
    public function otps()
    {
        return $this->hasMany(Otp::class, 'id_pengguna', 'id_pengguna');
    }

    public function dokumenKurir()
    {
        return $this->hasMany(DokumenKurir::class, 'id_pengguna', 'id_pengguna');
    }

    public function penjemputan()
    {
        return $this->hasMany(Penjemputan::class, 'id_pengguna_masyarakat', 'id_pengguna');
    }
}