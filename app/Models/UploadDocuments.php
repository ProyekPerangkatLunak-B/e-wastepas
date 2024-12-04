<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadDocuments extends Model
{
    protected $table = 'dokumen_kurir';
    protected $primaryKey = 'id_dokumen';

    protected $fillable = [
        'id_pengguna',
        'tipe_dokumen',
        'file_dokumen',
        'catatan_admin',
    ];

    public function uploadDoc()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}
