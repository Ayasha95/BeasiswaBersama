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
        Schema::table('cendekia_pendaftarans', function (Blueprint $table) {
            $table->string('nilai_tes')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cendekia_pendaftarans', function (Blueprint $table) {
            $table->dropColumn('nilai_tes');
        });
    }
};
