<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TalentSeniPendaftaran;
use Illuminate\Support\Facades\Auth;

class TalentSeniController extends Controller
{
    public function showForm()
    {
        return view('frontend.user.pendaftaran.form_talent_seni');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'nik' => 'nullable|string|max:16',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'asal_kampus' => 'nullable|string',
            'npsn' => 'nullable|string',
            'deskripsi_prestasi' => 'required|string',
            'jenis_seni' => 'required|string',
            'portofolio_pdf' => 'required|file|mimes:pdf|max:2048',
            'sertifikat_seni' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bersedia_seleksi' => 'required|in:ya,tidak',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'no_telepon.required' => 'No telepon wajib diisi.',
        ]);

        $sertifikatPath = $request->file('sertifikat_seni')->store('sertifikat_seni', 'public');
        $portofolioPath = $request->file('portofolio_pdf')->store('portofolio_talent_seni', 'public');

        TalentSeniPendaftaran::create([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'asal_kampus' => $request->asal_kampus,
            'npsn' => $request->npsn,
            'deskripsi_prestasi' => $request->deskripsi_prestasi,
            'jenis_seni' => $request->jenis_seni,
            'portofolio_path' => $portofolioPath,
            'sertifikat_path' => $sertifikatPath,
            'bersedia_seleksi' => $request->bersedia_seleksi,
            'status' => 'pending', // Tambahkan default status
        ]);

        // return redirect()->route('pendaftaran.form.talent_seni')->with('success', 'Pendaftaran Talent Seni berhasil dikirim!');
        return redirect()->route('pendaftaran.success')->with('success', 'Pendaftaran Talent Seni berhasil dikirim!');
    }

    public function showFrontend($id)
    {
        $talentSeni = TalentSeniPendaftaran::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('frontend.user.pendaftaran.show_talent_seni', compact('talentSeni'));
    }
}
