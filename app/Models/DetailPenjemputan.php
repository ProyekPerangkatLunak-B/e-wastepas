<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjemputan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjemputan';
    protected $primaryKey = 'id_detail_penjemputan';

    protected $fillable = [
        'id_penjemputan',
        'id_sampah',
        'subtotal_sampah',
        'subtotal_berat',
        'estimasi_point',
    ];

    public function penjemputan()
    {
        return $this->belongsTo(Penjemputan::class, 'id_penjemputan');
    }

    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'id_sampah');
    }
}