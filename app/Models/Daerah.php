<?php

namespace App\Models;

use App\Models\Dropbox;
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
        'total_dropbox',
        // 'created_at',
        // 'updated_at'
    ];

    public function dropbox()
    {
        return $this->hasMany(Dropbox::class, 'id_daerah', 'id_daerah');
    }
}
