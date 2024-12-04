<?php

namespace App\Models;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Penjemputan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenjemputan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjemputan';
    protected $primaryKey = 'id_detail_penjemputan';

    protected $fillable = [
        'id_penjemputan',
        'id_jenis',
        'id_kategori',
        'berat',
    ];

    public function penjemputan()
    {
        return $this->belongsTo(Penjemputan::class, 'id_penjemputan');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
