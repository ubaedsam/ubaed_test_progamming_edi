<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataPelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_pelamar', function (Blueprint $table) {
            $table->string('id_biodata')->primary();
            $table->string('id');
            $table->string('posisi_yang_dilamar');
            $table->string('nama');
            $table->string('no_ktp');
            $table->string('ttl');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('golongan_darah');
            $table->string('status');
            $table->text('alamat_ktp');
            $table->text('alamat_tinggal');
            $table->string('email');
            $table->string('no_telepon');
            $table->string('orang_terdekat');
            $table->string('skill');
            $table->string('penempatan_karyawan');
            $table->string('penghasilan_yang_diharapkan');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_pelamar');
    }
}
