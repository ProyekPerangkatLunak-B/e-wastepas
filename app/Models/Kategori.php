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
        return $this->belongsToMany(Jenis::class, 'id_kategori');
    }

    public function sampahDetail()
    {
        return $this->belongsToMany(SampahDetail::class, 'id_kategori');
    }
}