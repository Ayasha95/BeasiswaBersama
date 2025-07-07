<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $listMahasiswa = Mahasiswa::all();
        return view('backend.mahasiswa.index', compact('listMahasiswa'));
    }

    public function tambah()
    {
        return view('backend.mahasiswa.create');
    }

    public function simpan(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nim' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'program_studi' => 'required',
            'semester' => 'required|numeric',
            'alamat' => 'required',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $validated['user_id'] = Auth::id();

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('backend.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update($id, Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'program_studi' => 'required',
            'semester' => 'required|numeric',
            'alamat' => 'required',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $validated['user_id'] = Auth::id();

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function hapus($id)
    {
        Mahasiswa::destroy($id);

        return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
