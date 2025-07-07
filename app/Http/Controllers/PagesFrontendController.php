<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TalentSeniPendaftaran;
use Illuminate\Support\Facades\Hash;

class PagesFrontendController extends Controller
{
    public function loginForm()
{
    return view('frontend.auth.login');
}

public function loginAksi(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string',
        'no_telepon' => 'required|string',
        'password' => 'required',
    ]);

    $user = User::where('nama_lengkap', $request->nama_lengkap)
        ->where('no_telepon', $request->no_telepon)
        ->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user, $request->filled('remember'));
        return redirect()->route('user.dashboard');
    }

    return back()->withErrors(['login' => 'Nama lengkap, no telepon, atau password salah'])->withInput();
}

public function registerForm()
{
    return view('frontend.auth.register');
}

public function registerAksi(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'no_telepon' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'nama_lengkap' => $request->nama_lengkap,
        'no_telepon' => $request->no_telepon,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'level' => 'User',
    ]);

    // Auth::login($user);
    // return redirect()->route('user.dashboard');
    return redirect()->route('frontend.loginForm')->with('success', 'Registrasi berhasil, silakan login.');
}

public function dashboard()
{
    $user = auth()->user();
    $mahasiswa = \App\Models\Mahasiswa::where('email', $user->email)->first();

    // Semua beasiswa
    $beasiswas = \App\Models\Beasiswa::all();

    // Pendaftaran umum
    $pendaftarans = collect();
    if ($mahasiswa) {
        $pendaftarans = \App\Models\Pendaftaran::where('mahasiswa_id', $mahasiswa->id)
            ->with('beasiswa')
            ->latest()
            ->get();
    }

    // Pendaftaran Talent Seni
    $talentSeniPendaftarans = \App\Models\TalentSeniPendaftaran::where('user_id', $user->id)->orderByDesc('created_at')->get();

    // Statistik
    $sudah_didaftar = $pendaftarans->count() + $talentSeniPendaftarans->count();
    $dalam_review = $pendaftarans->where('status', 'dalam review')->count() + $talentSeniPendaftarans->where('status', 'pending')->count();
    $diterima = $pendaftarans->where('status', 'disetujui')->count() + $talentSeniPendaftarans->where('status', 'disetujui')->count();
    $beasiswa_didaftar = $pendaftarans->pluck('beasiswa_id')->toArray();
    $beasiswa_tersedia = $beasiswas->whereNotIn('id', $beasiswa_didaftar)->count();

    return view('frontend.user.dashboard.index', compact(
        'beasiswas',
        'pendaftarans',
        'talentSeniPendaftarans',
        'beasiswa_tersedia',
        'sudah_didaftar',
        'dalam_review',
        'diterima'
    ));
}

public function logout(Request $request)
{
    \Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('frontend.loginForm');
}
}