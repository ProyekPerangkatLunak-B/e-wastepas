<?php

namespace App\Models;

use App\Models\Daerah;
use App\Models\Pelacakan;
use App\Models\Penjemputan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dropbox extends Model
{
    use HasFactory;

    protected $table = 'dropbox';
    protected $primaryKey = 'id_dropbox';

    protected $fillable = [
        'id_daerah',
        'nama_dropbox',
        'alamat_dropbox',
        'status_dropbox',
        'total_poin',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'id_daerah');
    }

    public function penjemputan()
    {
        return $this->belongsToMany(Penjemputan::class, 'id_dropbox');
    }

    public function pelacakan()
    {
        return $this->belongsToMany(Pelacakan::class, 'id_dropbox');
    }
}