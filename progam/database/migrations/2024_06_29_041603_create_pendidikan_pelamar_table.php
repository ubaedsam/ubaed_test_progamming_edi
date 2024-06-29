<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanPelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('id_biodata');
            $table->string('jenjang_pendidikan');
            $table->string('nama_instusi_akademik');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->string('ipk');
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
        Schema::dropIfExists('pendidikan_pelamar');
    }
}
