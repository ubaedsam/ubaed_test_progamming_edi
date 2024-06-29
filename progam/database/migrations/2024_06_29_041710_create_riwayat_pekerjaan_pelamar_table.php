<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPekerjaanPelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pekerjaan_pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('id_biodata');
            $table->string('nama_perusahaan');
            $table->string('posisi_terakhir');
            $table->string('pendapatan_terakhir');
            $table->string('tahun');
            $table->timestamps();
            $table->foreign('id_biodata')->references('id_biodata')->on('biodata_pelamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pekerjaan_pelamar');
    }
}
