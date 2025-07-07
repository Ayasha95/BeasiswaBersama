<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CendekiaPendaftaran;

class CendekiaPendaftaranAdminController extends Controller
{
    public function index()
    {
        $pendaftarans = CendekiaPendaftaran::orderByDesc('created_at')->get();
        return view('backend.pendaftaran_cendekia.index', compact('pendaftarans'));
    }

    public function create()
    {
        return view('backend.pendaftaran_cendekia.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nik' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'asal_kampus' => 'required',
            'npsn' => 'required',
            'no_kk' => 'required',
            'nama_ortu' => 'required',
            'nik_ortu' => 'required',
            'pendidikan_terakhir_ortu' => 'required',
            'alamat_ortu' => 'required',
            'no_telepon_ortu' => 'required',
            'pekerjaan_ortu' => 'required',
            'penghasilan_ortu' => 'required',
            'periode_penghasilan_ortu' => 'required',
            'transkrip_nilai' => 'required',
            'surat_rekomendasi' => 'required',
            'motivasi' => 'required',
            'pernyataan_kebenaran' => 'required',
            'siap_tes_seleksi' => 'required',
            'status' => 'required',
            'nilai_tes' => 'nullable|string',
        ]);
        CendekiaPendaftaran::create($data);
        return redirect()->route('admin.pendaftaran_cendekia.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pendaftaran = CendekiaPendaftaran::findOrFail($id);
        return view('backend.pendaftaran_cendekia.show', compact('pendaftaran'));
    }

    public function edit($id)
    {
        $pendaftaran = CendekiaPendaftaran::findOrFail($id);
        return view('backend.pendaftaran_cendekia.edit', compact('pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = CendekiaPendaftaran::findOrFail($id);
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nik' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'asal_kampus' => 'required',
            'npsn' => 'required',
            'no_kk' => 'required',
            'nama_ortu' => 'required',
            'nik_ortu' => 'required',
            'pendidikan_terakhir_ortu' => 'required',
            'alamat_ortu' => 'required',
            'no_telepon_ortu' => 'required',
            'pekerjaan_ortu' => 'required',
            'penghasilan_ortu' => 'required',
            'periode_penghasilan_ortu' => 'required',
            'transkrip_nilai' => 'required',
            'surat_rekomendasi' => 'required',
            'motivasi' => 'required',
            'pernyataan_kebenaran' => 'required',
            'siap_tes_seleksi' => 'required',
            'status' => 'required',
            'nilai_tes' => 'nullable|string',
        ]);
        $pendaftaran->update($data);
        return redirect()->route('admin.pendaftaran_cendekia.index')->with('success', 'Pendaftaran berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pendaftaran = CendekiaPendaftaran::findOrFail($id);
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran_cendekia.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    // Fitur kirim link GForm ke email peserta (opsional, bisa pakai notifikasi/email)
    public function sendGFormLink($id)
    {
        $pendaftaran = CendekiaPendaftaran::findOrFail($id);
        // Kirim email ke $pendaftaran->email dengan link GForm
        // ... kode pengiriman email ...
        return back()->with('success', 'Link GForm berhasil dikirim ke email peserta.');
    }

    // Fitur update status (misal: lolos administrasi, tidak lolos, dsb)
    public function updateStatus(Request $request, $id)
    {
        $pendaftaran = CendekiaPendaftaran::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->save();
        return back()->with('success', 'Status pendaftaran berhasil diupdate.');
    }
} 