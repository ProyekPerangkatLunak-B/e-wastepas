<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'sampah';
    protected $primaryKey = 'id_sampah';

    protected $fillable = [
        'id_kategori_sampah',
        'id_jenis_sampah',
        'nama_sampah',
        'deskripsi_sampah',
        'berat_sampah',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'id_kategori_sampah');
    }

    public function jenis()
    {
        return $this->belongsTo(JenisSampah::class, 'id_jenis_sampah');
    }
}
