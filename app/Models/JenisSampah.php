<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';

    protected $fillable = [
        'id_kategori',
        'nama_jenis',
        'poin',
    ];

    public function kategoriSampah()
    {
        return $this->belongsTo(KategoriSampah::class, 'id_kategori', 'id_kategori');
    }
}
