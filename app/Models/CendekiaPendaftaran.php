<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CendekiaPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'cendekia_pendaftarans';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nik',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'asal_kampus',
        'npsn',
        'no_kk',
        'nama_ortu',
        'nik_ortu',
        'pendidikan_terakhir_ortu',
        'alamat_ortu',
        'no_telepon_ortu',
        'pekerjaan_ortu',
        'penghasilan_ortu',
        'periode_penghasilan_ortu',
        'transkrip_nilai',
        'surat_rekomendasi',
        'motivasi',
        'pernyataan_kebenaran',
        'siap_tes_seleksi',
        'status',
        'nilai_tes',
    ];
} 