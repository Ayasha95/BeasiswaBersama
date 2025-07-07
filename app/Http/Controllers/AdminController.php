<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    // Redirect ke dashboard admin setelah login/register
    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        // Hanya guest yang bisa akses login/register, kecuali dashboard & logout
        $this->middleware('guest')->except('dashboard', 'logout');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->isAdmin()) {
                return $next($request);
            } elseif (in_array($request->route()->getName(), [
                'admin.login', 'admin.login.submit',
                'admin.register', 'admin.register.submit'
            ])) {
                return $next($request);
            }
            return redirect()->route('admin.login')->with('fail', 'Akses hanya untuk admin!');
        })->except('showLoginForm', 'login', 'showRegisterForm', 'register');
    }

    // Tampilkan form login admin
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        $credentials['level'] = 'Admin'; // Pastikan hanya admin yang bisa login

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect($this->redirectTo);
        }
        return back()->withErrors(['email' => 'Email atau password salah, atau Anda bukan admin.']);
    }

    // Proses logout admin
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    // Tampilkan dashboard admin
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    // Tampilkan form register admin
    public function showRegisterForm()
    {
        // Hanya boleh ada satu admin, jika sudah ada redirect ke login
        if (User::where('level', 'Admin')->exists()) {
            return redirect()->route('admin.login')->with('fail', 'Admin sudah terdaftar. Silakan login.');
        }
        return view('backend.auth.register');
    }

    // Proses register admin
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin',
        ]);

        Auth::login($admin);
        return redirect($this->redirectTo)->with('success', 'Admin berhasil didaftarkan dan login!');
    }
}
