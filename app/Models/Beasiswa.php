<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
	use HasFactory;

	protected $table = 'beasiswa';

	protected $fillable = [
		'kode_beasiswa', 
		'nama_beasiswa', 
		'kategori_id', 
		'deskripsi',
		'nominal', 
		'kuota',
		'tanggal_mulai',
		'tanggal_akhir',
		'status',
	];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'kategori_id');
	}

	// Accessor untuk deadline
	public function getDeadlineAttribute()
	{
		return $this->tanggal_akhir;
	}
}
