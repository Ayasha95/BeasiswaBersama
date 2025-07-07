<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use App\Models\CendekiaPendaftaran;

class UserDashboardController extends Controller
{
    public function daftarBeasiswa()
    {
        $beasiswas = Beasiswa::all();
        return view('frontend.user.dashboard.daftar-beasiswa', compact('beasiswas'));
    }

    public function status()
    {
        $mahasiswa = Mahasiswa::where('email', Auth::user()->email)->first();
        $pendaftarans = $mahasiswa
            ? Pendaftaran::where('mahasiswa_id', $mahasiswa->id)->with('beasiswa')->latest()->get()
            : collect();

        $talentSeniPendaftarans = \App\Models\TalentSeniPendaftaran::where('user_id', auth()->id())->orderByDesc('created_at')->get();

        // Tambahkan data Cendekia
        $cendekiaPendaftarans = CendekiaPendaftaran::where('email', Auth::user()->email)->orderByDesc('created_at')->get();

        // Cek kelolosan administrasi Cendekia
        $isCendekiaLolos = $cendekiaPendaftarans->contains(function($item) {
            return in_array(strtolower($item->status), ['lolos administrasi', 'disetujui']);
        });
        $linkTesCendekia = 'https://forms.gle/bvCgUAXrk84EYZof9';

        // Gabungkan semua pendaftaran
        $allPendaftarans = $pendaftarans->concat($talentSeniPendaftarans)->concat($cendekiaPendaftarans)->sortByDesc('created_at');

        // Statistik
        $total = $allPendaftarans->count();
        $diterima = $allPendaftarans->where('status', 'disetujui')->count();
        $dalam_review = $allPendaftarans->where('status', 'pending')->count() + $allPendaftarans->where('status', 'dalam review')->count();
        $ditolak = $allPendaftarans->where('status', 'ditolak')->count();
        
        return view('frontend.user.dashboard.status', compact(
            'allPendaftarans',
            'talentSeniPendaftarans',
            'total',
            'diterima',
            'dalam_review',
            'ditolak',
            'isCendekiaLolos',
            'linkTesCendekia'
        ));
    }
    public function dashboard()
    {
        $user = auth()->user();
        $mahasiswa = \App\Models\Mahasiswa::where('email', $user->email)->first();
        $beasiswas = \App\Models\Beasiswa::all();
        $pendaftarans = collect();
        if ($mahasiswa) {
            $pendaftarans = \App\Models\Pendaftaran::where('mahasiswa_id', $mahasiswa->id)
                ->with('beasiswa')
                ->latest()
                ->get();
        }
        // Tambahkan Talent Seni
        $talentSeniPendaftarans = \App\Models\TalentSeniPendaftaran::where('user_id', $user->id)->orderByDesc('created_at')->get();
        // Tambahkan Cendekia
        $cendekiaPendaftarans = \App\Models\CendekiaPendaftaran::where('email', $user->email)->orderByDesc('created_at')->get();
        // Gabungkan semua pendaftaran
        $allPendaftarans = $pendaftarans->concat($talentSeniPendaftarans)->concat($cendekiaPendaftarans)->sortByDesc('created_at');
        // Statistik
        $beasiswa_didaftar = $pendaftarans->pluck('beasiswa_id')->toArray();
        $beasiswa_tersedia = $beasiswas->whereNotIn('id', $beasiswa_didaftar);
        $sudah_didaftar = $allPendaftarans->count();
        $dalam_review = $allPendaftarans->whereIn('status', ['pending', 'dalam review'])->count();
        // Ambil 5 aktivitas terbaru
        $aktivitas_terbaru = $allPendaftarans->take(5);
        return view('frontend.pages.dashboard', compact('beasiswa_tersedia', 'sudah_didaftar', 'dalam_review', 'aktivitas_terbaru', 'allPendaftarans'));
    }
}
