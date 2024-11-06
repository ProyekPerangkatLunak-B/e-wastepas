<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = 'daerah';
    protected $primaryKey = 'id_daerah';

    protected $fillable = [
        'nama_daerah',
        'status_daerah',
        'total_dropbox',
        'created_at',
        'updated_at'
    ];

    public function dropbox()
    {
        return $this->hasMany(Dropbox::class, 'id_daerah', 'id_daerah');
    }
}
