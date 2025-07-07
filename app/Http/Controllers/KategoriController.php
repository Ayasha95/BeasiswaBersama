<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Tampilkan semua kategori
    public function index()
    {
        $kategori = Kategori::all();
        return view('backend.kategori.index', ['kategori' => $kategori]);
    }

    // Tampilkan form tambah kategori
    public function tambah()
    {
        return view('backend.kategori.form');
    }

    // Simpan kategori baru
    public function simpan(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('backend.kategori.form', compact('kategori'));
    }

    // Update data kategori
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function hapus($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
