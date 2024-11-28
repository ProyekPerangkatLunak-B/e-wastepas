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
        return $this->hasMany(Dropbox::class, 'id_daerah');
    }

    public function penjemputan()
    {
        return $this->hasMany(Penjemputan::class, 'id_daerah');
    }
}