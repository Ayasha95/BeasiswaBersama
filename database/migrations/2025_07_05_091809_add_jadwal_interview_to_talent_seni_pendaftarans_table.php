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
            $table->datetime('jadwal_interview')->nullable();
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
            $table->dropColumn('jadwal_interview');
        });
    }
};
