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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('nim')->unique();
            $table->string('nik')->unique();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_telp');
            $table->string('asal_kampus');
            $table->string('program_studi');
            $table->tinyInteger('semester')->unsigned();
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};
