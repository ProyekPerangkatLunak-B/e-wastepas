<?php

namespace App\Models;

use App\Models\Dropbox;
use App\Models\Penjemputan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelacakan extends Model
{
    use HasFactory;

    protected $table = 'pelacakan';
    protected $primaryKey = 'id_pelacakan';

    protected $fillable = [
        'id_penjemputan',
        'id_dropbox',
        'keterangan',
        'status',
        'estimasi_waktu',
    ];

    public function penjemputan()
    {
        return $this->belongsTo(Penjemputan::class, 'id_penjemputan');
    }

    public function dropbox()
    {
        return $this->belongsTo(Dropbox::class, 'id_dropbox');
    }
}
