<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'beasiswa_id', 
        'mahasiswa_id',
        'nama', 
        'email', 
        'nik', 
        'tanggal_lahir', 
        'alamat', 
        'no_telp', 
        'asal_kampus', 
        'npsn',
        'no_kk', 
        'nama_orang_tua_wali', 
        'nik_orang_tua_wali', 
        'pendidikan_terakhir', 
        'alamat_orang_tua_wali', 
        'no_telp_orang_tua_wali', 
        'pekerjaan', 
        'penghasilan', 
        'periode_penghasilan',
        'dokumen_transkrip', 
        'dokumen_rekomendasi', 
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_DISETUJUI = 'disetujui';
    const STATUS_DITOLAK = 'ditolak';

    // Status options
    public static function getStatusOptions()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_DISETUJUI => 'Disetujui',
            self::STATUS_DITOLAK => 'Ditolak',
        ];
    }

    // Relationships
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeDisetujui($query)
    {
        return $query->where('status', self::STATUS_DISETUJUI);
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', self::STATUS_DITOLAK);
    }

    // Accessors & Mutators
    public function getStatusLabelAttribute()
    {
        return self::getStatusOptions()[$this->status] ?? $this->status;
    }

    public function getStatusBadgeClassAttribute()
    {
        return [
            self::STATUS_PENDING => 'badge-warning',
            self::STATUS_DISETUJUI => 'badge-success',
            self::STATUS_DITOLAK => 'badge-danger',
        ][$this->status] ?? 'badge-secondary';
    }
}
