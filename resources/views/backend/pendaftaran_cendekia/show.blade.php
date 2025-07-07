@extends('backend.layouts.app')

@section('contents')
<div class="container">
    <h1>Detail Pendaftaran Cendekia</h1>
    <table class="table table-bordered">
        <tr><th>Nama Lengkap</th><td>{{ $pendaftaran->nama_lengkap }}</td></tr>
        <tr><th>Email</th><td>{{ $pendaftaran->email }}</td></tr>
        <tr><th>NIK</th><td>{{ $pendaftaran->nik }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ $pendaftaran->tanggal_lahir }}</td></tr>
        <tr><th>Alamat</th><td>{{ $pendaftaran->alamat }}</td></tr>
        <tr><th>No Telepon</th><td>{{ $pendaftaran->no_telepon }}</td></tr>
        <tr><th>Asal Kampus</th><td>{{ $pendaftaran->asal_kampus }}</td></tr>
        <tr><th>NPSN</th><td>{{ $pendaftaran->npsn }}</td></tr>
        <tr><th>No KK</th><td>{{ $pendaftaran->no_kk }}</td></tr>
        <tr><th>Nama Ortu</th><td>{{ $pendaftaran->nama_ortu }}</td></tr>
        <tr><th>NIK Ortu</th><td>{{ $pendaftaran->nik_ortu }}</td></tr>
        <tr><th>Pendidikan Terakhir Ortu</th><td>{{ $pendaftaran->pendidikan_terakhir_ortu }}</td></tr>
        <tr><th>Alamat Ortu</th><td>{{ $pendaftaran->alamat_ortu }}</td></tr>
        <tr><th>No Telepon Ortu</th><td>{{ $pendaftaran->no_telepon_ortu }}</td></tr>
        <tr><th>Pekerjaan Ortu</th><td>{{ $pendaftaran->pekerjaan_ortu }}</td></tr>
        <tr><th>Penghasilan Ortu</th><td>{{ $pendaftaran->penghasilan_ortu }}</td></tr>
        <tr><th>Periode Penghasilan Ortu</th><td>{{ $pendaftaran->periode_penghasilan_ortu }}</td></tr>
        <tr><th>Transkrip Nilai</th><td>@if($pendaftaran->transkrip_nilai)<a href="{{ asset('storage/'.$pendaftaran->transkrip_nilai) }}" target="_blank">Transkrip</a>@endif</td></tr>
        <tr><th>Surat Rekomendasi</th><td>@if($pendaftaran->surat_rekomendasi)<a href="{{ asset('storage/'.$pendaftaran->surat_rekomendasi) }}" target="_blank">Rekomendasi</a>@endif</td></tr>
        <tr><th>Motivasi</th><td>{{ $pendaftaran->motivasi }}</td></tr>
        <tr><th>Pernyataan Kebenaran</th><td>{{ $pendaftaran->pernyataan_kebenaran ? 'Ya' : 'Tidak' }}</td></tr>
        <tr><th>Siap Tes Seleksi</th><td>{{ $pendaftaran->siap_tes_seleksi ? 'Ya' : 'Tidak' }}</td></tr>
        <tr><th>Nilai Tes</th><td>{{ $pendaftaran->nilai_tes }}</td></tr>
        <tr><th>Status</th><td>{{ $pendaftaran->status }}</td></tr>
    </table>
    <form action="{{ route('admin.pendaftaran_cendekia.sendGFormLink', $pendaftaran->id) }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-success">Kirim Link GForm</button>
    </form>
    <a href="{{ route('admin.pendaftaran_cendekia.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection 