<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $table = 'jenis_sampah';
    protected $primaryKey = 'id_jenis_sampah';

    protected $fillable = [
        'id_kategori_sampah',
        'nama_jenis_sampah',
        'deskripsi_jenis_sampah',
        'poin',
    ];

    public function kategoriSampah()
    {
        return $this->belongsTo(KategoriSampah::class, 'id_kategori_sampah');
    }
}
