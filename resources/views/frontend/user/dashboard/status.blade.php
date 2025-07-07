@extends('frontend.layouts.main')

@section('title', 'Status Pendaftaran - Sistem Beasiswa')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Status Pendaftaran</h2>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                <li>Status Pendaftaran</li>
            </ol>
        </div>
    </div>
</section>

@if(isset(
    $isCendekiaLolos) && $isCendekiaLolos)
    {{--
    <div class="alert alert-info">
        <b>Selamat!</b> Anda lolos tahap administrasi Beasiswa Cendekia.<br>
        Silakan lanjutkan ke <b>Seleksi Tes Online</b> melalui link berikut:<br>
        <a href="{{ $linkTesCendekia }}" target="_blank" class="btn btn-primary mt-2">
            Kerjakan Tes Beasiswa Cendekia
        </a>
        <br>
        <small class="text-muted">Pastikan mengisi identitas dengan benar dan hanya bisa mengisi sekali.</small>
    </div>
    --}}
@endif

<!-- ======= Status Section ======= -->
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
                                <a class="nav-link" href="{{ route('user.daftar-beasiswa') }}">
                                    <i class="bi bi-file-earmark-text me-2"></i>Daftar Beasiswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('user.status') }}">
                                    <i class="bi bi-clock-history me-2"></i>Status Pendaftaran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('password.confirm') }}">
                                    <i class="bi bi-gear me-2"></i>Pengaturan
                                </a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('frontend.logout') }}" class="d-inline">
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
                <!-- Summary Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <h3 class="mb-0">{{ $total }}</h3>
                                <p class="mb-0">Total Pendaftaran</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <h3 class="mb-0">{{ $diterima }}</h3>
                                <p class="mb-0">Diterima</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body text-center">
                                <h3 class="mb-0">{{ $dalam_review }}</h3>
                                <p class="mb-0">Dalam Review</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body text-center">
                                <h3 class="mb-0">{{ $ditolak }}</h3>
                                <p class="mb-0">Ditolak</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Status Table -->
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Riwayat Pendaftaran Beasiswa</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Beasiswa</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status</th>
                                        <th>Progress</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allPendaftarans as $data)
                                    <tr>
                                        <td>
                                            <div>
                                                @if(isset($data->beasiswa))
                                                    <h6 class="mb-1">{{ optional($data->beasiswa)->nama_beasiswa ?? '-' }}</h6>
                                                <small class="text-muted">{{ $data->beasiswa->kategori->nama_kategori ?? '' }}</small>
                                                @elseif(isset($data->nama_lengkap) && isset($data->motivasi))
                                                    <h6 class="mb-1">Beasiswa Cendekia</h6>
                                                    <small class="text-muted">Khusus Cendekia</small>
                                                @else
                                                    <h6 class="mb-1">Beasiswa Talent Seni</h6>
                                                    <small class="text-muted">Khusus Talent Seni</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $data->created_at->format('d M Y') }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($data->status == 'disetujui') bg-success
                                                @elseif($data->status == 'ditolak') bg-danger
                                                @else bg-warning @endif">
                                                {{ ucfirst($data->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar 
                                                    @if($data->status == 'disetujui') bg-success
                                                    @elseif($data->status == 'ditolak') bg-danger
                                                    @else bg-warning @endif"
                                                    style="width: {{ $data->status == 'disetujui' ? '100' : ($data->status == 'ditolak' ? '100' : '60') }}%">
                                                </div>
                                            </div>
                                            <small class="text-muted">
                                                @if($data->status == 'disetujui' || $data->status == 'ditolak') 100% 
                                                @else 60% @endif
                                            </small>
                                        </td>
                                        <td>
                                            @if(isset($data->motivasi))
                                                <a href="{{ route('frontend.pendaftaran.cendekia.show', $data->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                            @elseif(isset($data->jenis_seni))
                                                <a href="{{ route('user.talent_seni.show', $data->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                            @else
                                            <a href="{{ route('user.pendaftaran.show', $data->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @if(optional($data->beasiswa)->nama_beasiswa == 'Beasiswa Talent Seni')
                                        @php
                                            $talent = \App\Models\TalentSeniPendaftaran::where('user_id', $data->user_id)->first();
                                        @endphp
                                        @if($talent)
                                            <tr>
                                                <td colspan="5">
                                                    <div class="alert alert-info mb-0">
                                                        @if($talent->jadwal_interview)
                                                            <strong>Jadwal Interview:</strong> {{ $talent->jadwal_interview }}<br>
                                                            <strong>Link Zoom:</strong> <a href="{{ $talent->link_zoom }}" target="_blank">{{ $talent->link_zoom }}</a><br>
                                                        @endif
                                                        @if($talent->status && $talent->status != 'pending')
                                                            <hr class="my-2">
                                                            <strong>Hasil Pengumuman:</strong> 
                                                            <span class="badge 
                                                                @if($talent->status == 'disetujui') bg-success
                                                                @elseif($talent->status == 'ditolak') bg-danger @endif">
                                                                {{ $talent->status == 'disetujui' ? 'DITERIMA' : 'DITOLAK' }}
                                                            </span>
                                                            @if($talent->catatan_admin)
                                                                <br><strong>Catatan:</strong> {{ $talent->catatan_admin }}
                                                            @endif
                                                            @if($talent->tanggal_pengumuman)
                                                                <br><small class="text-muted">Tanggal Pengumuman: {{ \Carbon\Carbon::parse($talent->tanggal_pengumuman)->format('d M Y H:i') }}</small>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    @empty
                                    <tr><td colspan="5" class="text-center">Belum ada pendaftaran.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="card shadow-sm mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Timeline Pendaftaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            @forelse($allPendaftarans as $data)
                                <div class="timeline-item">
                                    <div class="timeline-marker
                                        @if($data->status == 'disetujui') bg-success
                                        @elseif($data->status == 'ditolak') bg-danger
                                        @elseif($data->status == 'dalam review') bg-warning
                                        @else bg-info @endif"></div>
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
                                        <p class="text-muted small mb-0">Status: {{ ucfirst($data->status) }}</p>
                                        <p class="text-muted small mb-0">Tanggal: {{ $data->created_at->format('d M Y') }}</p>
                                        <span class="badge
                                            @if($data->status == 'disetujui') bg-success
                                            @elseif($data->status == 'ditolak') bg-danger
                                            @elseif($data->status == 'dalam review') bg-warning
                                            @else bg-info @endif">
                                            @if($data->status == 'disetujui') Selesai
                                            @elseif($data->status == 'ditolak') Ditolak
                                            @elseif($data->status == 'dalam review') Dalam Proses
                                            @else Info @endif
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-info"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Belum ada aktivitas pendaftaran.</h6>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pendaftaran Beasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Informasi Beasiswa</h6>
                        <p><strong>Nama:</strong> Beasiswa KIP-K</p>
                        <p><strong>Kategori:</strong> Akademik</p>
                        <p><strong>Deadline:</strong> 31 Januari 2024</p>
                        <p><strong>Kuota:</strong> 50 mahasiswa</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Status Pendaftaran</h6>
                        <p><strong>Status:</strong> <span class="badge bg-success">Diterima</span></p>
                        <p><strong>Tanggal Daftar:</strong> 15 Januari 2024</p>
                        <p><strong>Tanggal Update:</strong> 18 Januari 2024</p>
                        <p><strong>Catatan:</strong> Selamat! Anda diterima dalam beasiswa ini.</p>
                    </div>
                </div>
                
                <hr>
                
                <h6>Dokumen yang Diupload</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>KTP</span>
                        <span class="badge bg-success">✓</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Kartu Keluarga</span>
                        <span class="badge bg-success">✓</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Transkrip Nilai</span>
                        <span class="badge bg-success">✓</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Surat Rekomendasi</span>
                        <span class="badge bg-success">✓</span>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Download Sertifikat</button>
            </div>
        </div>
    </div>
</div>

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

.progress {
    background-color: #e9ecef;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: #495057;
}

.table td {
    vertical-align: middle;
}
</style>
@endsection
