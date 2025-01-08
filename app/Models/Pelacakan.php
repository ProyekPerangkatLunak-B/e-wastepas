<?php

namespace App\Models;

use App\Models\Dropbox;
use App\Models\Penjemputan;
use Illuminate\Support\Facades\DB;
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

    public static function getEnumValues($column)
    {
        $result = DB::select("SHOW COLUMNS FROM pelacakan WHERE Field = '" . $column . "'");

        if (!empty($result)) {
            $columnDefinition = $result[0]->Type;

            // Ekstrak nilai enum dari definisi kolom
            if (preg_match('/^enum\((.*)\)$/', $columnDefinition, $matches)) {
                $data = array_map(function ($value) {
                    return trim($value, "'");
                }, explode(',', $matches[1]));
            } else {
                $data = []; // Jika regex gagal
            }
        } else {
            throw new \Exception("Kolom 'status' tidak ditemukan pada tabel 'pelacakan'.");
        }

        return $data;
    }
}
