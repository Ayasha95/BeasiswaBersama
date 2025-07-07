@extends('frontend.layouts.main')

@section('title', 'Dashboard - Sistem Beasiswa')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Dashboard</h2>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Dashboard</li>
            </ol>
        </div>
    </div>
</section>

<!-- ======= Dashboard Section ======= -->
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
                                <a class="nav-link active" href="{{ route('user.dashboard') }}">
                                    <i class="bi bi-house me-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.daftar-beasiswa') }}">
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
                <!-- Welcome Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Selamat Datang, {{ auth()->user()->name }}!</h4>
                        <p class="card-text">Selamat datang di dashboard Sistem Beasiswa. Di sini Anda dapat melihat status pendaftaran beasiswa dan mengelola akun Anda.</p>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card bg-primary text-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="mb-0">{{ $beasiswa_tersedia }}</h3>
                                        <p class="mb-0">Beasiswa Tersedia</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-award fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success text-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="mb-0">{{ $sudah_didaftar }}</h3>
                                        <p class="mb-0">Sudah Didaftar</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-check-circle fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-warning text-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="mb-0">{{ $dalam_review }}</h3>
                                        <p class="mb-0">Dalam Review</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-clock fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Aktivitas Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            {{-- Pendaftaran umum --}}
                            @foreach($pendaftarans as $data)
                                <div class="timeline-item">
                                    <div class="timeline-marker
                                        @if($data->status == 'disetujui') bg-success
                                        @elseif($data->status == 'ditolak') bg-danger
                                        @elseif($data->status == 'dalam review') bg-warning
                                        @else bg-info @endif"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Pendaftaran {{ $data->beasiswa->nama_beasiswa ?? '-' }}</h6>
                                        <p class="text-muted small mb-0">
                                            Status: {{ ucfirst($data->status) }}<br>
                                            Tanggal: {{ $data->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Pendaftaran Talent Seni --}}
                            @foreach($talentSeniPendaftarans as $talent)
                                <div class="timeline-item">
                                    <div class="timeline-marker
                                        @if($talent->status == 'disetujui') bg-success
                                        @elseif($talent->status == 'ditolak') bg-danger
                                        @else bg-info @endif"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Pendaftaran Beasiswa Talent Seni</h6>
                                        <p class="text-muted small mb-0">
                                            Status: {{ ucfirst($talent->status ?? 'pending') }}<br>
                                            Tanggal: {{ $talent->created_at->format('d M Y') }}
                                            @if($talent->jadwal_interview)
                                                <br>Jadwal Interview: {{ \Carbon\Carbon::parse($talent->jadwal_interview)->format('d M Y H:i') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @if($pendaftarans->isEmpty() && $talentSeniPendaftarans->isEmpty())
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-info"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Belum ada aktivitas pendaftaran.</h6>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
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

.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: -29px;
    top: 12px;
    width: 2px;
    height: calc(100% + 1rem);
    background-color: #dee2e6;
}

.timeline-content {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid #667eea;
}
</style>
@endsection