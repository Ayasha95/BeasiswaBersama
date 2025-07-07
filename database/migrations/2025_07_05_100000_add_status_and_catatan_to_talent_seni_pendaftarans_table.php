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
        Schema::table('talent_seni_pendaftarans', function (Blueprint $table) {
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending')->after('bersedia_seleksi');
            $table->text('catatan_admin')->nullable()->after('status');
            $table->timestamp('tanggal_pengumuman')->nullable()->after('catatan_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('talent_seni_pendaftarans', function (Blueprint $table) {
            $table->dropColumn(['status', 'catatan_admin', 'tanggal_pengumuman']);
        });
    }
}; 