@extends('frontend.layouts.main')

@section('title', 'Daftar Beasiswa - Sistem Beasiswa')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Daftar Beasiswa</h2>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                <li>Daftar Beasiswa</li>
            </ol>
        </div>
    </div>
</section>

<!-- ======= Beasiswa Section ======= -->
<section class="inner-page">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <div class="avatar-circle mx-auto mb-3">
                                <span class="initials">{{ substr(auth()->user()->name, 0, 2) }}</span>
                            </div>
                            <h5 class="mb-1">{{ auth()->user()->name }}</h5>
                            <p class="text-muted small">{{ auth()->user()->email }}</p>
                        </div>
                        
                        <hr>
                        
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dashboard') }}">
                                    <i class="bi bi-house me-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('user.daftar-beasiswa') }}">
                                    <i class="bi bi-file-earmark-text me-2"></i>Daftar Beasiswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.status') }}">
                                    <i class="bi bi-clock-history me-2"></i>Status Pendaftaran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('password.confirm') }}">
                                    <i class="bi bi-gear me-2"></i>Pengaturan
                                </a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link border-0 bg-transparent text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">


                <!-- Beasiswa Cards -->
                <div class="row">
                    @foreach($beasiswas as $beasiswa)
                    @php
                        $status = $beasiswa->status;
                        if ($status == 'Dibuka') {
                            $badge = 'bg-success';
                        } elseif ($status == 'Ditutup') {
                            $badge = 'bg-danger';
                        } else {
                            $badge = 'bg-secondary';
                        }
                    @endphp
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title">{{ $beasiswa->nama_beasiswa }}</h5>
                                    <span class="badge {{ $badge }}">{{ $status }}</span>
                                </div>
                                <p class="card-text text-muted">{{ $beasiswa->deskripsi }}</p>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>Deadline: {{ \Carbon\Carbon::parse($beasiswa->tanggal_akhir)->format('d M Y') }}
                                    </small>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="bi bi-people me-1"></i>Kuota: {{ $beasiswa->kuota }} mahasiswa
                                    </small>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="bi bi-cash me-1"></i>Nominal: Rp {{ number_format($beasiswa->nominal, 0, ',', '.') }}
                                    </small>
                                </div>
                                <div class="d-grid">
                                    @if($status == 'Dibuka')
                                        @if($beasiswa->nama_beasiswa == 'Beasiswa Talent Seni')
                                            <a href="{{ route('pendaftaran.form.talent_seni') }}" class="btn btn-primary">Daftar Sekarang</a>
                                        @elseif($beasiswa->nama_beasiswa == 'Beasiswa Cendekia')
                                            <a href="{{ route('frontend.pendaftaran.cendekia.form') }}" class="btn btn-primary">Daftar Sekarang</a>
                                        @else
                                        <a href="{{ route('beasiswa.daftar', $beasiswa->id) }}" class="btn btn-primary">Daftar Sekarang</a>
                                        @endif
                                    @elseif($status == 'Ditutup')
                                        <button class="btn btn-secondary" disabled>Pendaftaran Ditutup</button>
                                    @else
                                        <button class="btn btn-secondary" disabled>Status: {{ $status }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.avatar-circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.initials {
    font-size: 24px;
    font-weight: bold;
    color: white;
}

.nav-link {
    color: #6c757d;
    padding: 0.5rem 0;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.nav-link:hover, .nav-link.active {
    color: #667eea;
    background-color: rgba(102, 126, 234, 0.1);
    padding-left: 1rem;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
</style>
@endsection
