@extends('frontend.layouts.main')

@section('title', 'Detail Pendaftaran Talent Seni')

@section('content')
<div class="container mt-4">
    <h2>Detail Pendaftaran Beasiswa Talent Seni</h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Data Diri</h6>
                    <p><strong>Nama Lengkap:</strong> {{ $talentSeni->nama_lengkap }}</p>
                    <p><strong>Email:</strong> {{ $talentSeni->email }}</p>
                    <p><strong>No Telepon:</strong> {{ $talentSeni->no_telepon }}</p>
                    <p><strong>NIK:</strong> {{ $talentSeni->nik }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $talentSeni->tanggal_lahir }}</p>
                    <p><strong>Alamat:</strong> {{ $talentSeni->alamat }}</p>
                    <p><strong>Asal Kampus:</strong> {{ $talentSeni->asal_kampus }}</p>
                    <p><strong>NPSN:</strong> {{ $talentSeni->npsn }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Status Pendaftaran</h6>
                    <p><strong>Status:</strong> 
                        <span class="badge 
                            @if($talentSeni->status == 'disetujui') bg-success
                            @elseif($talentSeni->status == 'ditolak') bg-danger
                            @else bg-warning @endif">
                            {{ ucfirst($talentSeni->status ?? 'pending') }}
                        </span>
                    </p>
                    <p><strong>Tanggal Daftar:</strong> {{ $talentSeni->created_at->format('d M Y') }}</p>
                    @if($talentSeni->jadwal_interview)
                        <p><strong>Jadwal Interview:</strong> {{ \Carbon\Carbon::parse($talentSeni->jadwal_interview)->format('d M Y H:i') }}</p>
                    @endif
                    @if($talentSeni->link_zoom)
                        <p><strong>Link Zoom:</strong> <a href="{{ $talentSeni->link_zoom }}" target="_blank">{{ $talentSeni->link_zoom }}</a></p>
                    @endif
                    @if($talentSeni->catatan_admin)
                        <p><strong>Catatan Admin:</strong> {{ $talentSeni->catatan_admin }}</p>
                    @endif
                </div>
            </div>
            <hr>
            <h6>Data Seni & Prestasi</h6>
            <p><strong>Jenis Seni:</strong> {{ $talentSeni->jenis_seni }}</p>
            <p><strong>Deskripsi Prestasi:</strong> {{ $talentSeni->deskripsi_prestasi }}</p>
            <p><strong>Bersedia Seleksi:</strong> {{ ucfirst($talentSeni->bersedia_seleksi) }}</p>
            <hr>
            <h6>Dokumen yang Diupload</h6>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Portofolio</span>
                    @if($talentSeni->portofolio_path)
                        <a href="{{ asset('storage/' . $talentSeni->portofolio_path) }}" target="_blank" class="badge bg-success">Lihat File</a>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Sertifikat Seni</span>
                    @if($talentSeni->sertifikat_path)
                        <a href="{{ asset('storage/' . $talentSeni->sertifikat_path) }}" target="_blank" class="badge bg-success">Lihat File</a>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </li>
            </ul>
            <a href="{{ route('user.status') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection 