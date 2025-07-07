<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Beasiswa; // <-- Tambahkan ini!
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder user admin default
        if (!User::where('email', 'admin@email.com')->exists()) {
            User::create([
                'nama_lengkap' => 'Superadmin',
                'no_telepon' => '08123456789', // isi dengan dummy/nomor admin
                'email' => 'admin@email.com',
                'password' => Hash::make('admin54321'),
                'level' => 'Admin',
            ]);
        }

        // Seeder beasiswa dummy
        // if (!Beasiswa::where('kode_beasiswa', 'KIPK')->exists()) {
           //  Beasiswa::create([
               // 'kode_beasiswa' => 'KIPK',
               // 'nama_beasiswa' => 'Beasiswa KIP-K',
               // 'kategori_id' => 'Kebutuhan Ekonomi', // pastikan field ini juga ada di database
               // 'deskripsi' => 'Beasiswa untuk mahasiswa berprestasi dengan kondisi ekonomi terbatas.',
              //  'nominal' => 6000000, // sesuaikan nominal sesuai kebijakan beasiswa
              //  'kuota' => 50,
              //  'tanggal_mulai' => now()->subDays(5),
              //  'tanggal_akhir' => now()->addDays(10),
          //  ]);
        }

        // DB::table('beasiswa')->where('id', 1)->update(['kategori_id' => 2]);
        // Tambah data lain sesuai kebutuhan
    }
