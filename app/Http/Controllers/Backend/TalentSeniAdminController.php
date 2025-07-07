<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TalentSeniPendaftaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TalentSeniAdminController extends Controller
{
    public function index()
    {
        $pendaftarans = TalentSeniPendaftaran::all();
        return view('backend.pendaftaran_seni.index', compact('pendaftarans'));
    }

    public function setInterviewSchedule(Request $request, $id)
    {
        $request->validate([
            'jadwal_interview' => 'required|date',
            'link_zoom' => 'nullable|url',
        ]);
        $pendaftaran = TalentSeniPendaftaran::findOrFail($id);
        $pendaftaran->jadwal_interview = $request->jadwal_interview;
        $pendaftaran->link_zoom = $request->link_zoom;
        $pendaftaran->save();
        return redirect()->back()->with('success', 'Jadwal interview dan link Zoom berhasil diupdate!');
    }

    public function setPengumuman(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,disetujui,ditolak',
            'catatan_admin' => 'nullable|string|max:1000',
        ]);
        
        $pendaftaran = TalentSeniPendaftaran::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->catatan_admin = $request->catatan_admin;
        $pendaftaran->tanggal_pengumuman = now();
        $pendaftaran->save();
        
        $statusText = $request->status == 'disetujui' ? 'DITERIMA' : ($request->status == 'ditolak' ? 'DITOLAK' : 'PENDING');
        return redirect()->back()->with('success', "Pengumuman berhasil diupdate! Status: {$statusText}");
    }

    public function create()
    {
        return view('backend.pendaftaran_seni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'deskripsi_prestasi' => 'required|string',
            'jenis_seni' => 'required|string',
            'portofolio_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_seni' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bersedia_seleksi' => 'required|in:ya,tidak',
        ]);
        $sertifikatPath = $request->file('sertifikat_seni') ? $request->file('sertifikat_seni')->store('sertifikat_seni', 'public') : null;
        $portofolioPath = $request->file('portofolio_pdf') ? $request->file('portofolio_pdf')->store('portofolio_talent_seni', 'public') : null;
        $pendaftaran = TalentSeniPendaftaran::create([
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
            'status' => 'pending',
        ]);
        return redirect()->route('admin.pendaftaran.talent_seni.index')->with('success', 'Pendaftar Talent Seni berhasil ditambah!');
    }

    public function show($id)
    {
        $pendaftaran = TalentSeniPendaftaran::findOrFail($id);
        return view('backend.pendaftaran_seni.show', compact('pendaftaran'));
    }

    public function edit($id)
    {
        $pendaftaran = TalentSeniPendaftaran::findOrFail($id);
        return view('backend.pendaftaran_seni.edit', compact('pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = TalentSeniPendaftaran::findOrFail($id);
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'deskripsi_prestasi' => 'required|string',
            'jenis_seni' => 'required|string',
            'portofolio_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_seni' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bersedia_seleksi' => 'required|in:ya,tidak',
        ]);
        if ($request->hasFile('portofolio_pdf')) {
            $pendaftaran->portofolio_path = $request->file('portofolio_pdf')->store('portofolio_talent_seni', 'public');
        }
        if ($request->hasFile('sertifikat_seni')) {
            $pendaftaran->sertifikat_path = $request->file('sertifikat_seni')->store('sertifikat_seni', 'public');
        }
        $pendaftaran->update([
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
            'bersedia_seleksi' => $request->bersedia_seleksi,
            'jadwal_interview' => $request->jadwal_interview,
            'link_zoom' => $request->link_zoom,
            'catatan_admin' => $request->catatan_admin,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.pendaftaran.talent_seni.index')->with('success', 'Data pendaftar Talent Seni berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pendaftaran = TalentSeniPendaftaran::findOrFail($id);
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran.talent_seni.index')->with('success', 'Data pendaftar Talent Seni berhasil dihapus!');
    }

    public function downloadPdf($id)
    {
        $pendaftaran = TalentSeniPendaftaran::findOrFail($id);
        $pdf = Pdf::loadView('backend.pendaftaran_seni.pdf', compact('pendaftaran'));
        return $pdf->download('pendaftar-talent-seni-' . $pendaftaran->nama_lengkap . '.pdf');
    }
} 