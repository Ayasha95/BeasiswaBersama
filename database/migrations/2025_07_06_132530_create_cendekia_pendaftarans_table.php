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
        Schema::create('cendekia_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('asal_kampus');
            $table->string('npsn');
            // Data Orang Tua/Wali
            $table->string('no_kk');
            $table->string('nama_ortu');
            $table->string('nik_ortu');
            $table->string('pendidikan_terakhir_ortu');
            $table->text('alamat_ortu');
            $table->string('no_telepon_ortu');
            $table->string('pekerjaan_ortu');
            $table->string('penghasilan_ortu');
            $table->string('periode_penghasilan_ortu');
            // Dokumen
            $table->string('transkrip_nilai');
            $table->string('surat_rekomendasi');
            // Motivasi
            $table->text('motivasi');
            // Checkbox
            $table->boolean('pernyataan_kebenaran');
            $table->boolean('siap_tes_seleksi');
            // Status
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('cendekia_pendaftarans');
    }
};
