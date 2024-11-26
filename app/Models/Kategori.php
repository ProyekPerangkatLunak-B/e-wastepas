<?php

namespace App\Models;

use App\Models\Jenis;
use App\Models\SampahDetail;
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
        'poin'
    ];

    public function jenis()
    {
        return $this->hasMany(Jenis::class, 'id_jenis');
    }

    public function sampahDetail()
    {
        return $this->hasMany(SampahDetail::class, 'id_kategori');
    }
}