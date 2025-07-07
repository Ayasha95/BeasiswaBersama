@extends('frontend.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <b>Detail Pendaftaran Beasiswa Cendekia</b>
        </div>
        <div class="card-body">
            @if(isset($isCendekiaLolos) && $isCendekiaLolos)
                <div class="alert alert-info">
                    <b>Selamat!</b> Anda lolos tahap administrasi Beasiswa Cendekia.<br>
                    Silakan lanjutkan ke <b>Seleksi Tes Online</b> melalui link berikut:<br>
                    <a href="{{ $linkTesCendekia }}" target="_blank" class="btn btn-primary mt-2">
                        Kerjakan Tes Beasiswa Cendekia
                    </a>
                    <br>
                    <small class="text-muted">Pastikan mengisi identitas dengan benar dan hanya bisa mengisi sekali.</small>
                </div>
            @endif
            <table class="table table-bordered">
                <tbody>
                    <tr><th>Nama Lengkap</th><td>{{ $data->nama_lengkap }}</td></tr>
                    <tr><th>Email</th><td>{{ $data->email }}</td></tr>
                    <tr><th>NIK</th><td>{{ $data->nik }}</td></tr>
                    <tr><th>Tanggal Lahir</th><td>{{ $data->tanggal_lahir }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $data->alamat }}</td></tr>
                    <tr><th>No. Telepon</th><td>{{ $data->no_telepon }}</td></tr>
                    <tr><th>Asal Kampus</th><td>{{ $data->asal_kampus }}</td></tr>
                    <tr><th>NPSN</th><td>{{ $data->npsn }}</td></tr>
                    <tr><th>Nilai Tes Seleksi</th><td>{{ $data->nilai_tes ?? '-' }}</td></tr>
                    <tr class="table-secondary"><th colspan="2">Data Orang Tua/Wali</th></tr>
                    <tr><th>No. KK</th><td>{{ $data->no_kk }}</td></tr>
                    <tr><th>Nama Orang Tua/Wali</th><td>{{ $data->nama_ortu }}</td></tr>
                    <tr><th>NIK Orang Tua/Wali</th><td>{{ $data->nik_ortu }}</td></tr>
                    <tr><th>Pendidikan Terakhir</th><td>{{ $data->pendidikan_terakhir_ortu }}</td></tr>
                    <tr><th>Alamat Orang Tua/Wali</th><td>{{ $data->alamat_ortu }}</td></tr>
                    <tr><th>No. Telepon Orang Tua/Wali</th><td>{{ $data->no_telepon_ortu }}</td></tr>
                    <tr><th>Pekerjaan</th><td>{{ $data->pekerjaan_ortu }}</td></tr>
                    <tr><th>Penghasilan</th><td>{{ $data->penghasilan_ortu }}</td></tr>
                    <tr><th>Periode Penghasilan</th><td>{{ $data->periode_penghasilan_ortu }}</td></tr>
                    <tr class="table-secondary"><th colspan="2">Dokumen</th></tr>
                    <tr>
                        <th>Transkrip Nilai</th>
                        <td>
                            @if($data->transkrip_nilai)
                                <a href="{{ asset('storage/'.$data->transkrip_nilai) }}" target="_blank">Lihat/Download</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Rekomendasi</th>
                        <td>
                            @if($data->surat_rekomendasi)
                                <a href="{{ asset('storage/'.$data->surat_rekomendasi) }}" target="_blank">Lihat/Download</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr><th>Motivasi Mengikuti Beasiswa</th><td>{{ $data->motivasi }}</td></tr>
                    <tr><th>Pernyataan Kebenaran Data</th><td>{{ $data->pernyataan_kebenaran ? 'Ya' : 'Tidak' }}</td></tr>
                    <tr><th>Kesiapan Mengikuti Tes Seleksi</th><td>{{ $data->siap_tes_seleksi ? 'Ya' : 'Tidak' }}</td></tr>
                    <tr><th>Status</th><td>{{ ucfirst($data->status) }}</td></tr>
                </tbody>
            </table>
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Kembali</a>
        </div>
    </div>
</div>
@endsection 