<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\DetailPenjemputan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 * @param \Illuminate\Database\Eloquent\Builder $query
 * @param array $filters
 * @return \Illuminate\Database\Eloquent\Builder
 */

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
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function detailPenjemputan()
    {
        return $this->hasMany(DetailPenjemputan::class, 'id_jenis');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('nama_jenis', 'like', '%' . $search . '%');
        });
    }
}
