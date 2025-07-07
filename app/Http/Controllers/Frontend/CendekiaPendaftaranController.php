<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CendekiaPendaftaran;
use Illuminate\Support\Facades\Storage;

class CendekiaPendaftaranController extends Controller
{
    // Tampilkan form pendaftaran
    public function showForm()
    {
        return view('frontend.user.pendaftaran.form_cendekia');
    }

    // Proses simpan pendaftaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'nik' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:50',
            'asal_kampus' => 'required|string|max:255',
            'npsn' => 'required|string|max:50',
            'no_kk' => 'required|string|max:50',
            'nama_ortu' => 'required|string|max:255',
            'nik_ortu' => 'required|string|max:50',
            'pendidikan_terakhir_ortu' => 'required|string',
            'alamat_ortu' => 'required|string',
            'no_telepon_ortu' => 'required|string|max:50',
            'pekerjaan_ortu' => 'required|string',
            'penghasilan_ortu' => 'required|string',
            'periode_penghasilan_ortu' => 'required|string',
            'transkrip_nilai' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'surat_rekomendasi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'motivasi' => 'required|string',
            'pernyataan_kebenaran' => 'required|boolean',
            'siap_tes_seleksi' => 'required|boolean',
        ]);

        // Simpan file
        $transkripPath = $request->file('transkrip_nilai')->store('cendekia/transkrip', 'public');
        $rekomendasiPath = $request->file('surat_rekomendasi')->store('cendekia/rekomendasi', 'public');

        $pendaftaran = CendekiaPendaftaran::create([
            ...$validated,
            'transkrip_nilai' => $transkripPath,
            'surat_rekomendasi' => $rekomendasiPath,
            'status' => 'pending',
        ]);

        return redirect()->route('frontend.pendaftaran.cendekia.success', $pendaftaran->id);
    }

    // Tampilkan detail pendaftaran (jika diperlukan)
    public function show($id)
    {
        $data = CendekiaPendaftaran::findOrFail($id);
        $isCendekiaLolos = in_array(strtolower($data->status), ['lolos administrasi', 'disetujui']);
        $linkTesCendekia = 'https://forms.gle/bvCgUAXrk84EYZof9';
        return view('frontend.user.pendaftaran.show_cendekia', compact('data', 'isCendekiaLolos', 'linkTesCendekia'));
    }

    // Halaman sukses
    public function success($id)
    {
        $data = CendekiaPendaftaran::findOrFail($id);
        return view('frontend.user.pendaftaran.success', compact('data'));
    }
} 