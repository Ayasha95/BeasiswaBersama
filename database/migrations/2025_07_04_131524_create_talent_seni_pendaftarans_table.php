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
        Schema::create('talent_seni_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_telepon');
            $table->text('deskripsi_prestasi');
            $table->string('jenis_seni');
            $table->string('portofolio_path')->nullable();
            $table->string('sertifikat_path');
            $table->string('bersedia_seleksi');
            $table->string('nik')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('asal_kampus')->nullable();
            $table->string('npsn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talent_seni_pendaftarans');
    }
};
