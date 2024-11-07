<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    use HasFactory;

    protected $table = 'penjemputan';
    protected $primaryKey = 'id_penjemputan';

    protected $fillable = [
        'id_pengguna',
        'id_dropbox',
        'catatan',
        'subtotal_berat',
        'subtotal_poin',
        'lokasi_penjemputan',
        'status_permintaan',
        'waktu_permintaan',
    ];

    public function pengguna()
    {
        return $this->belongsTo(UserMasyarakat::class, 'id_pengguna');
    }

    public function dropbox()
    {
        return $this->belongsTo(Dropbox::class, 'id_dropbox');
    }
}