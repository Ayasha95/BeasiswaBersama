<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentSeniPendaftaran extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'no_telepon',
        'nik',
        'tanggal_lahir',
        'alamat',
        'asal_kampus',
        'npsn',
        'deskripsi_prestasi',
        'jenis_seni',
        'portofolio_path',
        'sertifikat_path',
        'bersedia_seleksi',
        'status',
        'catatan_admin',
        'tanggal_pengumuman',
        'jadwal_interview',
        'link_zoom',
    ];
}
