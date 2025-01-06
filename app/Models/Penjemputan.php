<?php

namespace App\Models;

use App\Models\Daerah;
use App\Models\Dropbox;
use App\Models\Pengguna;
use App\Models\Pelacakan;
use App\Models\DetailPenjemputan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjemputan extends Model
{
    use HasFactory;

    protected $table = 'penjemputan';
    protected $primaryKey = 'id_penjemputan';

    protected $fillable = [
        'kode_penjemputan',
        'id_daerah',
        'id_dropbox',
        'id_pengguna_masyarakat',
        'id_pengguna_kurir',
        'total_berat',
        'total_poin',
        'tanggal_penjemputan',
        'alamat_penjemputan',
        'catatan',
        'status',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'id_daerah');
    }

    public function dropbox()
    {
        return $this->belongsTo(Dropbox::class, 'id_dropbox');
    }

    public function penggunaMasyarakat()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna_masyarakat');
    }

    public function penggunaKurir()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna_kurir');
    }

    public function detailPenjemputan()
    {
        return $this->hasMany(DetailPenjemputan::class, 'id_penjemputan');
    }

    public function pelacakan()
    {
        return $this->hasMany(Pelacakan::class, 'id_penjemputan');
    }

    public function getLatestPelacakan()
    {
        return $this->hasOne(Pelacakan::class, 'id_penjemputan')->latestOfMany('created_at');
    }

    public function scopeFilter($query, array $filters)
    {
        // Filter search berdasarkan pencarian nama_jenis
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('detailPenjemputan.jenis', function ($query) use ($search) {
                $query->where('nama_jenis', 'like', '%' . $search . '%');
            });
        });

        // Filter berdasarkan kategori
        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            if ($kategori != 'all' && $kategori != 'inactive') {
                return $query->whereHas('detailPenjemputan.kategori', function ($query) use ($kategori) {
                    $query->where('nama_kategori', $kategori);
                });
            }
        });

        // Filter berdasarkan status
        $query->when($filters['status'] ?? false, function ($query, $status) {
            if ($status != 'all') {
                return $query->whereHas('pelacakan', function ($query) use ($status) {
                    $query->where('status', $status);
                });
            }
        });
    }
}
