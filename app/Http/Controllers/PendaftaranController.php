<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Beasiswa;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function index()
    {
        if (Auth::user()->level === 'Admin') {
            $pendaftaran = Pendaftaran::with(['mahasiswa', 'beasiswa'])->get();
        } else {
            $mahasiswa = Mahasiswa::where('email', Auth::user()->email)->first();
            $pendaftaran = $mahasiswa
                ? Pendaftaran::with(['mahasiswa', 'beasiswa'])->where('mahasiswa_id', $mahasiswa->id)->get()
                : collect();
        }
        return view('backend.pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        $beasiswa = Beasiswa::all();
        $mahasiswa = Mahasiswa::all();
        return view('backend.pendaftaran.create', compact('beasiswa','mahasiswa'));
    }

    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'beasiswa_id' => 'required|exists:beasiswa,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'nik' => 'required|string|size:16',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'asal_kampus' => 'required|string',
            'npsn' => 'nullable|string',
            'no_kk' => 'required|string|size:16',
            'nama_orang_tua_wali' => 'required|string|max:255',
            'nik_orang_tua_wali' => 'nullable|string|size:16',
            'pendidikan_terakhir' => 'nullable|string',
            'alamat_orang_tua_wali' => 'nullable|string',
            'no_telp_orang_tua_wali' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'penghasilan' => 'nullable|string',
            'periode_penghasilan' => 'nullable|string',
            'dokumen.transkrip' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'dokumen.rekomendasi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if (!Auth::check()) return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');

        $mahasiswa = Mahasiswa::firstOrCreate(
            ['email' => Auth::user()->email],
            [
                'user_id' => Auth::id(),
                'nim' => $request->nik,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama,
                'no_telp' => $request->no_telp,
                'asal_kampus' => $request->asal_kampus,
                'program_studi' => $request->asal_kampus,
                'semester' => 1,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'status' => 'aktif',
            ]
        );

        if (Pendaftaran::where('mahasiswa_id', $mahasiswa->id)->where('beasiswa_id', $request->beasiswa_id)->exists()) {
            return back()->with('error', 'Anda sudah pernah mendaftar untuk beasiswa ini');
        }

        DB::beginTransaction();

        $dokumen = [];
        $uploadPath = 'dokumen_pendaftaran/' . $mahasiswa->id . '/' . $request->beasiswa_id;
        foreach (['transkrip', 'rekomendasi'] as $field) {
            if ($request->hasFile('dokumen.' . $field)) {
                $file = $request->file('dokumen.' . $field);
                $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $dokumen[$field] = $file->storeAs($uploadPath, $fileName, 'public');
            }
        }

        $pendaftaran = Pendaftaran::create([
            'beasiswa_id' => $request->beasiswa_id,
            'mahasiswa_id' => $mahasiswa->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'asal_kampus' => $request->asal_kampus,
            'npsn' => $request->npsn,
            'no_kk' => $request->no_kk,
            'nama_orang_tua_wali' => $request->nama_orang_tua_wali,
            'nik_orang_tua_wali' => $request->nik_orang_tua_wali,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'alamat_orang_tua_wali' => $request->alamat_orang_tua_wali,
            'no_telp_orang_tua_wali' => $request->no_telp_orang_tua_wali,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan,
            'periode_penghasilan' => $request->periode_penghasilan,
            'dokumen_transkrip' => $dokumen['transkrip'] ?? null,
            'dokumen_rekomendasi' => $dokumen['rekomendasi'] ?? null,
            'status' => 'pending',
        ]);

        DB::commit();

        return redirect()->route('pendaftaran.success')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'beasiswa_id' => 'required|exists:beasiswa,id',
            'status' => 'required|in:pending,disetujui,ditolak',
            'berkas_persyaratan' => 'nullable|mimes:pdf|max:2048',
            'nama_orang_tua_wali' => 'required|string|max:255',
            'nik_orang_tua_wali' => 'nullable|string|size:16',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'alamat_orang_tua_wali' => 'nullable|string',
            'no_telp_orang_tua_wali' => 'nullable|string|max:20',
            'pekerjaan' => 'nullable|string|max:100',
            'penghasilan' => 'nullable|string|max:100',
            'periode_penghasilan' => 'nullable|string|max:50',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $data = $request->only([
            'mahasiswa_id', 'beasiswa_id', 'status',
            'nama_orang_tua_wali', 'nik_orang_tua_wali', 'pendidikan_terakhir',
            'alamat_orang_tua_wali', 'no_telp_orang_tua_wali', 'pekerjaan',
            'penghasilan', 'periode_penghasilan'
        ]);

        if ($request->hasFile('berkas_persyaratan')) {
            if ($pendaftaran->berkas_persyaratan) {
                Storage::disk('public')->delete($pendaftaran->berkas_persyaratan);
            }
            $data['berkas_persyaratan'] = $request->file('berkas_persyaratan')->store('berkas', 'public');
        }

        $pendaftaran->update($data);
        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::with(['beasiswa.kategori'])->findOrFail($id);
        return view('backend.pendaftaran.show', compact('pendaftaran'));
    }

    public function showFrontend($id)
    {
        $mahasiswa = Mahasiswa::where('email', Auth::user()->email)->firstOrFail();
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran = Pendaftaran::with(['mahasiswa', 'beasiswa.kategori'])
            ->where('id', $id)
            ->where('mahasiswa_id', $mahasiswa->id)
            ->firstOrFail();

        return view('frontend.user.pendaftaran.show', compact('pendaftaran'));
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::with(['mahasiswa', 'beasiswa'])->findOrFail($id);
        $beasiswa = Beasiswa::with('kategori')->get();
        $mahasiswa = Mahasiswa::all();

        return view('backend.pendaftaran.edit', compact('pendaftaran', 'beasiswa', 'mahasiswa'));
    }

    public function hapus($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->dokumen_transkrip) Storage::disk('public')->delete($pendaftaran->dokumen_transkrip);
        if ($pendaftaran->dokumen_rekomendasi) Storage::disk('public')->delete($pendaftaran->dokumen_rekomendasi);

        $pendaftaran->delete();
        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function success()
    {
        return view('frontend.user.pendaftaran.success');
    }

    public function tambah()
    {
        $beasiswa = Beasiswa::with('kategori')->get();
        $mahasiswa = Mahasiswa::all();
        return view('backend.pendaftaran.create', compact('mahasiswa', 'beasiswa'));
    }

    public function downloadPdf($id)
    {
        $pendaftaran = Pendaftaran::with(['beasiswa.kategori'])->findOrFail($id);
        $pdf = Pdf::loadView('backend.pendaftaran.pdf', compact('pendaftaran'));
        return $pdf->download('pendaftaran-beasiswa-' . $pendaftaran->nama . '.pdf');
    }
}
