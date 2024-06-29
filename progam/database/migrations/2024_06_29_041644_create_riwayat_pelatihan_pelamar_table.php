<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPelatihanPelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pelatihan_pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('id_biodata');
            $table->string('nama_kursus');
            $table->string('sertifikat');
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
        Schema::dropIfExists('riwayat_pelatihan_pelamar');
    }
}
