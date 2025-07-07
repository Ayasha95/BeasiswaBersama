@extends('frontend.layouts.main') {{-- Ganti dengan layout frontend Anda --}}

@section('content')
<div class="container mt-4">
    <h2>Detail Pendaftaran Beasiswa</h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Informasi Beasiswa</h6>
                    <p><strong>Nama:</strong> {{ $pendaftaran->beasiswa->nama_beasiswa ?? '-' }}</p>
                    <p><strong>Kategori:</strong> {{ $pendaftaran->beasiswa->kategori->nama_kategori ?? '-' }}</p>
                    <p><strong>Deadline:</strong> {{ $pendaftaran->beasiswa->deadline ?? '-' }}</p>
                    <p><strong>Kuota:</strong> {{ $pendaftaran->beasiswa->kuota ?? '-' }} mahasiswa</p>
                </div>
                <div class="col-md-6">
                    <h6>Status Pendaftaran</h6>
                    <p><strong>Status:</strong> 
                        <span class="badge 
                            @if($pendaftaran->status == 'pending') bg-warning
                            @elseif($pendaftaran->status == 'disetujui') bg-success
                            @elseif($pendaftaran->status == 'ditolak') bg-danger
                            @endif">
                            {{ ucfirst($pendaftaran->status) }}
                        </span>
                    </p>
                    <p><strong>Tanggal Daftar:</strong> {{ $pendaftaran->created_at->format('d M Y') }}</p>
                    <p><strong>Tanggal Update:</strong> {{ $pendaftaran->updated_at->format('d M Y') }}</p>
                    <p><strong>Catatan:</strong> 
                        @if($pendaftaran->status == 'disetujui')
                            Selamat! Anda diterima dalam beasiswa ini.
                        @elseif($pendaftaran->status == 'ditolak')
                            Mohon maaf, pendaftaran Anda ditolak.
                        @else
                            Dokumen dalam review.
                        @endif
                    </p>
                </div>
            </div>
            @if(isset($talentSeni) && $talentSeni->jadwal_interview)
                <div class="alert alert-info">
                    <b>Jadwal Interview/Uji Penampilan:</b><br>
                    {{ \Carbon\Carbon::parse($talentSeni->jadwal_interview)->format('d M Y H:i') }}
                </div>
            @endif
            <hr>
            <h6>Dokumen yang Diupload</h6>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Transkrip Nilai</span>
                    @if($pendaftaran->dokumen_transkrip)
                        <a href="{{ asset('storage/' . $pendaftaran->dokumen_transkrip) }}" target="_blank" class="badge bg-success">Lihat File</a>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Surat Rekomendasi</span>
                    @if($pendaftaran->dokumen_rekomendasi)
                        <a href="{{ asset('storage/' . $pendaftaran->dokumen_rekomendasi) }}" target="_blank" class="badge bg-success">Lihat File</a>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </li>
            </ul>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection