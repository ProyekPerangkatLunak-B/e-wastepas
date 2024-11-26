<?php

namespace App\Models;

use App\Models\Dropbox;
use App\Models\Penjemputan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daerah extends Model
{
    use HasFactory;

    protected $table = 'daerah';
    protected $primaryKey = 'id_daerah';

    protected $fillable = [
        'nama_daerah',
        'status_daerah',
        'total_poin',
    ];

    public function dropbox()
    {
        return $this->belongsToMany(Dropbox::class, 'id_daerah', 'id_daerah');
    }

    public function penjemputan()
    {
        return $this->belongsToMany(Penjemputan::class, 'id_daerah');
    }
}