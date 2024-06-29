<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanPelamar extends Model
{
    use HasFactory;

    protected $table = "pendidikan_pelamar"; // menghubungkan ke dalam tabel pendidikan_pelamar

    protected $guarded = [];

    public function biodata()
    {
        return $this->belongsTo(BiodataPelamar::class, 'id_biodata');
    }
}
