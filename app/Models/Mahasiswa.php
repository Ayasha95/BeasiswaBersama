<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
	use HasFactory;

	protected $table = 'mahasiswa';

	protected $fillable = [
        'user_id',
        'nim',
        'nik',
        'nama_lengkap',
        'email',
        'no_telp',
        'asal_kampus',
        'program_studi',
        'semester',
        'tanggal_lahir',
        'alamat',
        'status',
    ];
}
