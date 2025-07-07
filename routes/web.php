<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PagesFrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TalentSeniController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\Backend\TalentSeniAdminController;
use App\Http\Controllers\Frontend\CendekiaPendaftaranController;
use App\Http\Controllers\Backend\CendekiaPendaftaranAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ================= ADMIN AREA =================
Route::prefix('admin')->group(function () {
    // Login, Register, Logout admin (mengarah ke backend/auth)
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    

    // Dashboard & resource admin (hanya untuk admin yang sudah login)
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::controller(BeasiswaController::class)->prefix('beasiswa')->group(function () {
            Route::get('', 'index')->name('beasiswa');
            Route::get('tambah', 'tambah')->name('beasiswa.tambah');
            Route::post('tambah', 'simpan')->name('beasiswa.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('beasiswa.edit');
            Route::post('edit/{id}', 'update')->name('beasiswa.tambah.update');
            Route::delete('hapus/{id}', 'hapus')->name('beasiswa.hapus');
        });

        Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
            Route::get('', 'index')->name('kategori');
            Route::get('tambah', 'tambah')->name('kategori.tambah');
            Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('kategori.edit');
            Route::post('edit/{id}', 'update')->name('kategori.tambah.update');
            Route::delete('hapus/{id}', 'hapus')->name('kategori.hapus');
        });

        Route::controller(MahasiswaController::class)->prefix('mahasiswa')->group(function () {
            Route::get('', 'index')->name('mahasiswa');
            Route::get('tambah', 'tambah')->name('mahasiswa.tambah');
            Route::post('tambah', 'simpan')->name('mahasiswa.simpan');
            Route::get('edit/{id}', 'edit')->name('mahasiswa.edit');
            Route::put('edit/{id}', 'update')->name('mahasiswa.tambah.update');
            Route::delete('hapus/{id}', 'hapus')->name('mahasiswa.hapus');
        });

        Route::controller(PendaftaranController::class)->prefix('pendaftaran')->group(function () {
            Route::get('', 'index')->name('pendaftaran');
            Route::get('tambah', 'tambah')->name('pendaftaran.tambah');
            Route::post('tambah', 'simpan')->name('pendaftaran.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('pendaftaran.edit');
            Route::put('edit/{id}', 'update')->name('pendaftaran.tambah.update');
            Route::delete('hapus/{id}', 'hapus')->name('pendaftaran.hapus');
            // Route::post('simpan', 'simpan')->name('pendaftaran.simpan');
        });

    });
});

// Form register frontend
Route::get('/register', [PagesFrontendController::class, 'registerForm'])->name('frontend.register');
Route::get('/daftar/register', [PagesFrontendController::class, 'registerForm'])->name('frontend.register');

// Proses register frontend
Route::post('/register', [PagesFrontendController::class, 'registerAksi'])->name('frontend.register.aksi');
Route::post('/daftar/register', [PagesFrontendController::class, 'registerAksi'])->name('frontend.register.aksi');

// Form login frontend
Route::get('/login', [PagesFrontendController::class, 'loginForm'])->name('frontend.loginForm');
Route::get('/daftar/login', [PagesFrontendController::class, 'loginForm'])->name('frontend.loginForm');

// Proses login frontend
Route::post('/login', [PagesFrontendController::class, 'loginAksi'])->name('frontend.login.submit');
Route::post('/daftar/login', [PagesFrontendController::class, 'loginAksi'])->name('frontend.login.submit');

// Logout frontend
Route::post('/logout', [PagesFrontendController::class, 'logout'])->name('frontend.logout');

// ================= FRONTEND AREA =================
Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
});

Route::view('/tentang-kami', 'frontend.pages.tentang')->name('tentang');
Route::view('/panduan', 'frontend.pages.panduan')->name('panduan');
Route::view('/kontak-kami', 'frontend.pages.kontak')->name('kontak');
Route::view('/jenis-beasiswa', 'frontend.pages.jenis')->name('jenis');
Route::view('/faq', 'frontend.pages.faq')->name('faq');

// ================= FRONTEND USER AREA (AUTH) =================
Route::middleware(['auth'])->group(function () {
    // Dashboard user frontend
    Route::get('/user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    // Daftar beasiswa user
    Route::get('/user/daftar-beasiswa', [UserDashboardController::class, 'daftarBeasiswa'])->name('user.daftar-beasiswa');
    // Status pendaftaran user
    Route::get('/user/status', [UserDashboardController::class, 'status'])->name('user.status');

    // ===== Route khusus pendaftaran beasiswa tertentu (HARUS DI ATAS route dinamis) =====
    // Talent Seni
    Route::get('/beasiswa/talent-seni/daftar', [TalentSeniController::class, 'showForm'])->name('pendaftaran.form.talent_seni');
    Route::post('/beasiswa/talent-seni/daftar', [TalentSeniController::class, 'submitForm'])->name('pendaftaran.simpan.talent_seni');
    // Cendekia
    Route::get('/beasiswa/cendekia/daftar', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'showForm'])->name('frontend.pendaftaran.cendekia.form');
    Route::post('/beasiswa/cendekia/daftar', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'store'])->name('frontend.pendaftaran.cendekia.submit');
    Route::get('/beasiswa/cendekia/success/{id}', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'success'])->name('frontend.pendaftaran.cendekia.success');
    Route::get('/beasiswa/cendekia/show/{id}', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'show'])->name('frontend.pendaftaran.cendekia.show');

    // ===== Route dinamis (umum) HARUS DI BAWAH =====
    Route::get('/beasiswa/{id}/daftar', [BeasiswaController::class, 'daftar'])->name('beasiswa.daftar');
    // Pendaftaran umum
    Route::post('/pendaftaran/simpan', [PendaftaranController::class, 'simpan'])->name('pendaftaran.simpan');
    Route::get('/pendaftaran/success', [PendaftaranController::class, 'success'])->name('pendaftaran.success');
    Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::get('/user/pendaftaran/{id}', [PendaftaranController::class, 'showFrontend'])->name('user.pendaftaran.show');
});

// Login & Register Pendaftar (frontend)
Route::controller(PagesFrontendController::class)->prefix('daftar')->group(function () {
    Route::get('login', 'loginForm')->name('frontend.loginForm');
    Route::post('login', 'loginAksi')->name('frontend.login.aksi');
    Route::get('register', 'registerForm')->name('frontend.register');
    Route::post('register', 'registerAksi')->name('frontend.register.aksi');
    Route::post('logout', 'logout')->name('frontend.logout');
});

// Dashboard untuk pendaftar setelah login
Route::middleware(['auth:pendaftar'])->group(function () {
    Route::get('/daftar/dashboard', [PagesFrontendController::class, 'dashboard'])->name('frontend.dashboard');
});

// Route khusus user yang harus login
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/daftar-beasiswa', [UserDashboardController::class, 'daftarBeasiswa'])->name('user.daftar-beasiswa');
    // route user lain...
});

// Route untuk pendaftaran beasiswa (frontend/user)
Route::middleware(['auth'])->group(function () {
    Route::get('/beasiswa/{id}/daftar', [BeasiswaController::class, 'daftar'])->name('beasiswa.daftar');
    Route::post('/pendaftaran/simpan', [PendaftaranController::class, 'simpan'])->name('pendaftaran.simpan');
    Route::get('/pendaftaran/success', [PendaftaranController::class, 'success'])->name('pendaftaran.success');
    Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::get('/user/pendaftaran/{id}', [PendaftaranController::class, 'showFrontend'])->name('user.pendaftaran.show');
});

// Route::get('/daftar/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/daftar/register', [RegisterController::class, 'register']);

// Route untuk menampilkan detail pendaftaran beasiswa milik user yang sedang login
Route::get('/user/pendaftaran/{id}', [PendaftaranController::class, 'showFrontend'])
    ->middleware('auth') // pastikan hanya user login yang bisa akses
    ->name('user.pendaftaran.show');

Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // route admin lain
    Route::resource('pendaftaran/talent-seni', \App\Http\Controllers\Backend\TalentSeniAdminController::class, [
        'as' => 'admin.pendaftaran.talent_seni'
    ]);
});

    Route::get('/beasiswa/jenis', [JenisController::class, 'index'])->name('beasiswa.jenis');

    Route::post('/kontak-kami', [KontakController::class, 'kirim'])->name('kontak.kirim');

    // Lindungi route Talent Seni dengan auth
    Route::middleware(['auth'])->group(function () {
        Route::get('/beasiswa/talent-seni/daftar', [App\Http\Controllers\TalentSeniController::class, 'showForm'])->name('pendaftaran.form.talent_seni');
        Route::post('/beasiswa/talent-seni/daftar', [App\Http\Controllers\TalentSeniController::class, 'submitForm'])->name('pendaftaran.simpan.talent_seni');
        // Dashboard user frontend (pastikan hanya satu)
        Route::get('/user/dashboard', [App\Http\Controllers\UserDashboardController::class, 'dashboard'])->name('user.dashboard');
        
        // Route dinamis (umum)
        Route::get('/beasiswa/{id}/daftar', [App\Http\Controllers\BeasiswaController::class, 'daftar'])->name('beasiswa.daftar');
    });

    Route::middleware(['auth', 'isAdmin'])->group(function() {
        Route::get('/admin/pendaftaran/talent-seni', [\App\Http\Controllers\Backend\TalentSeniAdminController::class, 'index'])->name('admin.pendaftaran.talent_seni');
        Route::post('/admin/pendaftaran/talent-seni/{id}/jadwal', [\App\Http\Controllers\Backend\TalentSeniAdminController::class, 'setInterviewSchedule'])->name('admin.pendaftaran.talent_seni.jadwal');
        Route::post('/admin/pendaftaran/talent-seni/{id}/pengumuman', [\App\Http\Controllers\Backend\TalentSeniAdminController::class, 'setPengumuman'])->name('admin.pendaftaran.talent_seni.pengumuman');
        Route::get('/admin/pendaftaran/talent-seni/{id}/pdf', [App\Http\Controllers\Backend\TalentSeniAdminController::class, 'downloadPdf'])->name('admin.pendaftaran.talent_seni.pdf');
        Route::get('/admin/pendaftaran/{id}/pdf', [App\Http\Controllers\PendaftaranController::class, 'downloadPdf'])->name('pendaftaran.pdf');
        // route admin lain
    });

    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::resource('/admin/pendaftaran/talent-seni', TalentSeniAdminController::class, [
            'as' => 'admin.pendaftaran.talent_seni'
        ]);
    });

    Route::prefix('admin/pendaftaran/talent-seni')->name('admin.pendaftaran.talent_seni.')->group(function () {
        Route::get('/', [TalentSeniAdminController::class, 'index'])->name('index');
        Route::get('/create', [TalentSeniAdminController::class, 'create'])->name('create');
        Route::post('/', [TalentSeniAdminController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TalentSeniAdminController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TalentSeniAdminController::class, 'update'])->name('update');
        Route::delete('/{id}', [TalentSeniAdminController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [TalentSeniAdminController::class, 'show'])->name('show');
    });
    
// Route test (opsional)
Route::get('/test', function() { return 'test ok'; });

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/talent-seni/{id}', [App\Http\Controllers\TalentSeniController::class, 'showFrontend'])->name('user.talent_seni.show');

// Pendaftaran Beasiswa Cendekia (frontend)
Route::middleware(['auth'])->group(function () {
    Route::get('/beasiswa/cendekia/daftar', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'showForm'])->name('frontend.pendaftaran.cendekia.form');
    Route::post('/beasiswa/cendekia/daftar', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'store'])->name('frontend.pendaftaran.cendekia.submit');
    Route::get('/beasiswa/cendekia/success/{id}', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'success'])->name('frontend.pendaftaran.cendekia.success');
    Route::get('/beasiswa/cendekia/show/{id}', [\App\Http\Controllers\Frontend\CendekiaPendaftaranController::class, 'show'])->name('frontend.pendaftaran.cendekia.show');
});

Route::prefix('admin/pendaftaran/cendekia')->name('admin.pendaftaran_cendekia.')->middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'destroy'])->name('destroy');
    Route::get('/{id}', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'show'])->name('show');
    Route::post('/{id}/send-gform', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'sendGFormLink'])->name('sendGFormLink');
    Route::post('/{id}/update-status', [\App\Http\Controllers\Backend\CendekiaPendaftaranAdminController::class, 'updateStatus'])->name('updateStatus');
});
