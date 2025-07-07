@extends('backend.layouts.app')

@section('contents')
<div class="container mt-4">
    <h2>Detail Pendaftar Talent Seni</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama Lengkap:</strong> {{ $pendaftaran->nama_lengkap }}</p>
            <p><strong>Email:</strong> {{ $pendaftaran->email }}</p>
            <p><strong>No Telepon:</strong> {{ $pendaftaran->no_telepon }}</p>
            <p><strong>NIK:</strong> {{ $pendaftaran->nik }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $pendaftaran->tanggal_lahir }}</p>
            <p><strong>Alamat:</strong> {{ $pendaftaran->alamat }}</p>
            <p><strong>Asal Kampus:</strong> {{ $pendaftaran->asal_kampus }}</p>
            <p><strong>NPSN:</strong> {{ $pendaftaran->npsn }}</p>
            <p><strong>Deskripsi Prestasi:</strong> {{ $pendaftaran->deskripsi_prestasi }}</p>
            <p><strong>Jenis Seni:</strong> {{ $pendaftaran->jenis_seni }}</p>
            <p><strong>Bersedia Seleksi:</strong> {{ ucfirst($pendaftaran->bersedia_seleksi) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($pendaftaran->status) }}</p>
            <p><strong>Jadwal Interview:</strong> {{ $pendaftaran->jadwal_interview }}</p>
            <p><strong>Link Zoom:</strong> <a href="{{ $pendaftaran->link_zoom }}" target="_blank">{{ $pendaftaran->link_zoom }}</a></p>
            <p><strong>Catatan Admin:</strong> {{ $pendaftaran->catatan_admin }}</p>
            <p><strong>Portofolio:</strong> 
                @if($pendaftaran->portofolio_path)
                    <a href="{{ asset('storage/' . $pendaftaran->portofolio_path) }}" target="_blank">Lihat File</a>
                    <a href="{{ asset('storage/' . $pendaftaran->portofolio_path) }}" download class="btn btn-sm btn-outline-primary ms-2">Download</a>
                @else
                    -
                @endif
            </p>
            <p><strong>Sertifikat Seni:</strong> 
                @if($pendaftaran->sertifikat_path)
                    <a href="{{ asset('storage/' . $pendaftaran->sertifikat_path) }}" target="_blank">Lihat File</a>
                    <a href="{{ asset('storage/' . $pendaftaran->sertifikat_path) }}" download class="btn btn-sm btn-outline-primary ms-2">Download</a>
                @else
                    -
                @endif
            </p>
            <a href="{{ route('admin.pendaftaran.talent_seni.pdf', $pendaftaran->id) }}" class="btn btn-danger" target="_blank">Download PDF</a>
            <a href="{{ route('admin.pendaftaran.talent_seni.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
