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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('kode_beasiswa')->nullable();
            $table->string('nama_beasiswa')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('kuota')->nullable();
            $table->bigInteger('nominal')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beasiswa');
    }
};
