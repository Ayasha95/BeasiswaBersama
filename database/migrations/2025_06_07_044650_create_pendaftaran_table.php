<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswa_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->string('nama');
            $table->string('email');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('asal_kampus');
            $table->string('npsn')->nullable();
            $table->string('no_kk');
            $table->string('nama_orang_tua_wali');
            $table->string('nik_orang_tua_wali');
            $table->string('pendidikan_terakhir');
            $table->text('alamat_orang_tua_wali');
            $table->string('no_telp_orang_tua_wali');
            $table->string('pekerjaan');
            $table->string('penghasilan');
            $table->string('periode_penghasilan');
            $table->string('dokumen_transkrip');
            $table->string('dokumen_rekomendasi');
            $table->timestamps();
            
            // foreign keys
            $table->foreign('beasiswa_id')->references('id')->on('beasiswa')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
};
