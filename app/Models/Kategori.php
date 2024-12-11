<?php

namespace App\Models;

use App\Models\Jenis;
use App\Models\DetailPenjemputan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi_kategori',
    ];

    public function jenis()
    {
        return $this->hasMany(Jenis::class, 'id_kategori', 'id_kategori');
    }

    public function detailPenjemputan()
    {
        return $this->hasMany(DetailPenjemputan::class, 'id_kategori');
    }
}
