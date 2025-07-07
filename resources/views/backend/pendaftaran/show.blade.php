@extends('backend.layouts.app')

@section('contents')
<div class="container mt-4">
    <h2>Detail Pendaftaran Beasiswa</h2>
    <div class="card mb-4">
        <div class="card-body">
            {{-- Informasi Beasiswa --}}
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
                            Dokumen sedang dalam proses review.
                        @endif
                    </p>
                </div>
            </div>

            <hr>

            {{-- Data Orang Tua / Wali --}}
            <h6>Data Orang Tua / Wali</h6>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama:</strong> {{ $pendaftaran->nama_orang_tua_wali ?? '-' }}</p>
                    <p><strong>NIK:</strong> {{ $pendaftaran->nik_orang_tua_wali ?? '-' }}</p>
                    <p><strong>Pendidikan Terakhir:</strong> {{ $pendaftaran->pendidikan_terakhir ?? '-' }}</p>
                    <p><strong>Pekerjaan:</strong> {{ $pendaftaran->pekerjaan ?? '-' }}</p>
                    <p><strong>Penghasilan:</strong> {{ $pendaftaran->penghasilan ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>No. Telp:</strong> {{ $pendaftaran->no_telp_orang_tua_wali ?? '-' }}</p>
                    <p><strong>Alamat:</strong><br>{{ $pendaftaran->alamat_orang_tua_wali ?? '-' }}</p>
                    <p><strong>Periode:</strong> {{ $pendaftaran->periode_penghasilan ?? '-' }}</p>
                </div>
            </div>

            <hr>

            {{-- Dokumen Upload --}}
            <h6>Dokumen yang Diupload</h6>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Transkrip Nilai</span>
                    @if($pendaftaran->dokumen_transkrip)
                        <a href="{{ asset('storage/' . $pendaftaran->dokumen_transkrip) }}" target="_blank" class="badge bg-success">Lihat File</a>
                        <a href="{{ asset('storage/' . $pendaftaran->dokumen_transkrip) }}" download class="btn btn-sm btn-outline-primary ms-2">Download</a>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Surat Rekomendasi</span>
                    @if($pendaftaran->dokumen_rekomendasi)
                        <a href="{{ asset('storage/' . $pendaftaran->dokumen_rekomendasi) }}" target="_blank" class="badge bg-success">Lihat File</a>
                        <a href="{{ asset('storage/' . $pendaftaran->dokumen_rekomendasi) }}" download class="btn btn-sm btn-outline-primary ms-2">Download</a>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </li>
            </ul>

            <a href="{{ route('pendaftaran.pdf', $pendaftaran->id) }}" class="btn btn-danger" target="_blank">Download PDF</a>
            <a href="{{ route('pendaftaran') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection