<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    protected $table = 'peran';

    protected $primaryKey = 'id_peran';

    protected $fillable = [
        'nama_peran',
        'deskripsi_peran',
        'status',
    ];

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'id_peran', 'id_peran');
    }
}
