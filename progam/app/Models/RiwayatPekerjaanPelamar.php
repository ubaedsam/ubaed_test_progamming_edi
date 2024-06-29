<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaanPelamar extends Model
{
    use HasFactory;

    protected $table = "riwayat_pekerjaan_pelamar"; // menghubungkan ke dalam tabel riwayat_pekerjaan_pelamar

    protected $guarded = [];

    public function biodata()
    {
        return $this->belongsTo(BiodataPelamar::class, 'id_biodata');
    }
}
