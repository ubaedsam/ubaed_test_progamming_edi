<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataPelamar extends Model
{
    use HasFactory;

    protected $table = "biodata_pelamar"; // menghubungkan ke dalam tabel biodata_pelamar
    protected $guarded = [];

    public $primaryKey = 'id_biodata';
    public $keyType = 'string';
    public $autoIncrement = 'false';

    public function pendidikan()
    {
        // return $this->hasMany(PendidikanPelamar::class, 'id_biodata');
        return $this->hasMany('App\Models\PendidikanPelamar', 'id_biodata', 'id_biodata');
    }

    public function pekerjaan()
    {
        return $this->hasMany('App\Models\RiwayatPekerjaanPelamar', 'id_biodata', 'id_biodata');
    }

    public function pelatihan()
    {
        return $this->hasMany('App\Models\RiwayatPelatihanPelamar', 'id_biodata', 'id_biodata');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
