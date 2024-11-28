<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\SampahDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';

    protected $fillable = [
        'id_kategori',
        'nama_jenis',
        'deskripsi_jenis',
        'poin',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function sampahDetail()
    {
        return $this->hasMany(SampahDetail::class, 'id_jenis');
    }
}