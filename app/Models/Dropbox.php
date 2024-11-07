<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dropbox extends Model
{
    use HasFactory;

    protected $table = 'dropbox';
    protected $primaryKey = 'id_dropbox';

    protected $fillable = [
        'id_daerah',
        'nama_lokasi',
        'alamat',
        'status_dropbox',
        'total_transaksi_dropbox',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'id_daerah');
    }
}
