@extends('frontend.layouts.main')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <div class="avatar-circle mx-auto mb-3">
                                <span class="initials">{{ substr(Auth::user()->nama ?? Auth::user()->name, 0, 2) }}</span>
                            </div>
                            <h5 class="mb-1">{{ Auth::user()->nama ?? Auth::user()->name }}</h5>
                            <p class="text-muted small">{{ Auth::user()->email }}</p>
                        </div>
                        <hr>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i class="bi bi-house me-2"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.daftar-beasiswa') }}"><i class="bi bi-file-earmark-text me-2"></i>Daftar Beasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.status') }}"><i class="bi bi-clock-history me-2"></i>Status Pendaftaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('password.confirm') }}"><i class="bi bi-gear me-2"></i>Pengaturan</a>
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
                <!-- Welcome Message -->
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->nama ?? Auth::user()->name }}!</h4>
                    <p>Ini adalah halaman dashboard Anda. Di sini Anda dapat melihat informasi beasiswa yang tersedia dan mengelola pendaftaran Anda.</p>
                </div>
                <!-- Summary Box -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body text-center">
                                <h2>{{ $beasiswa_tersedia->count() }}</h2>
                                <p>Beasiswa Tersedia</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body text-center">
                                <h2>{{ $sudah_didaftar }}</h2>
                                <p>Sudah Didaftar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body text-center">
                                <h2>{{ $dalam_review }}</h2>
                                <p>Dalam Review</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Aktivitas Terbaru -->
                <div class="card mb-4">
                    <div class="card-header">Aktivitas Terbaru</div>
                    <div class="card-body">
                        <div class="timeline">
                            @if($aktivitas_terbaru->count())
                                @foreach($aktivitas_terbaru as $data)
                                    <div class="timeline-item">
                                        <div class="timeline-marker {{ $data->status == 'disetujui' ? 'bg-success' : ($data->status == 'ditolak' ? 'bg-danger' : ($data->status == 'dalam review' || $data->status == 'pending' ? 'bg-warning' : 'bg-info')) }}"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">
                                                @if(isset($data->beasiswa))
                                                    Pendaftaran {{ $data->beasiswa->nama_beasiswa ?? '-' }}
                                                @elseif(isset($data->jenis_seni))
                                                    Pendaftaran Beasiswa Talent Seni
                                                @elseif(isset($data->motivasi))
                                                    Pendaftaran Beasiswa Cendekia
                                                @else
                                                    Pendaftaran Beasiswa
                                                @endif
                                            </h6>
                                            <p class="text-muted small mb-0">
                                                Status: {{ ucfirst($data->status) }}<br>
                                                Tanggal: {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}
                                                @if(isset($data->jadwal_interview) && $data->jadwal_interview)
                                                    <br>Jadwal Interview: {{ \Carbon\Carbon::parse($data->jadwal_interview)->format('d M Y H:i') }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
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