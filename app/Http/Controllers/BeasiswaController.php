<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
	public function index()
	{
		$beasiswa = Beasiswa::with('kategori')->get();

		return view('backend.beasiswa.index', ['data' => $beasiswa]);
	}

	public function tambah()
	{
		$kategori = Kategori::get();
		$beasiswa = null;

		return view('backend.beasiswa.form', ['kategori' => $kategori, 'beasiswa' => $beasiswa]);
	}

	public function simpan(Request $request)
	{
		$data = [
			'kode_beasiswa' => $request->kode_beasiswa,
			'nama_beasiswa' => $request->nama_beasiswa,
			'id_kategori' => $request->id_kategori,
			'deskripsi' => $request->deskripsi,
			'nominal' => $request->nominal,
			'kuota' => $request->kuota,
			'tanggal_mulai' => $request->tanggal_mulai,
			'tanggal_akhir' => $request->tanggal_akhir,
			'status' => $request->status,
		];

		Beasiswa::create($data);

		return redirect()->route('beasiswa');
	}

	public function edit($id)
	{
		$beasiswa = Beasiswa::find($id);
		$kategori = Kategori::get();

		return view('backend.beasiswa.form', ['beasiswa' => $beasiswa, 'kategori' => $kategori]);
	}

	public function update($id, Request $request)
	{
		$data = [
			'kode_beasiswa' => $request->kode_beasiswa,
			'nama_beasiswa' => $request->nama_beasiswa,
			'id_kategori' => $request->id_kategori,
			'deskripsi' => $request->deskripsi,
			'nominal' => $request->nominal,
			'kuota' => $request->kuota,
			'tanggal_mulai' => $request->tanggal_mulai,
			'tanggal_akhir' => $request->tanggal_akhir,
			'status' => $request->status,
		];

		Beasiswa::find($id)->update($data);

		return redirect()->route('beasiswa');
	}

	public function hapus($id)
	{
		Beasiswa::find($id)->delete();

		return redirect()->route('beasiswa');
	}

	public function kategori()
	{
		return $this->belongsTo(Kategori::class);
	}

	public function daftarBeasiswa()
	{
		$beasiswas = Beasiswa::all();
		return view('frontend.user.dashboard.daftar-beasiswa', compact('beasiswas'));
	}

	public function daftar($id)
	{
		$beasiswa = Beasiswa::findOrFail($id);
		return view('frontend.user.pendaftaran.form', compact('beasiswa'));
	}
}
