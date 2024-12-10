<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKurir extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model
    protected $table = 'dokumen_kurir';

    // Primary key dari tabel
    protected $primaryKey = 'id_dokumen';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'id_pengguna',
        'tipe_dokumen',
        'file_dokumen',
        'catatan_admin',
    ];

    // Relasi ke model Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
}
