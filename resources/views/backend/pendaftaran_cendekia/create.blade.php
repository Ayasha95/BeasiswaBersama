@extends('backend.layouts.app')

@section('contents')
<div class="container">
    <h1>Tambah Pendaftaran Cendekia</h1>
    <form action="{{ route('admin.pendaftaran_cendekia.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" required></div>
                <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
                <div class="mb-3"><label>NIK</label><input type="text" name="nik" class="form-control" required></div>
                <div class="mb-3"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" required></div>
                <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control" required></textarea></div>
                <div class="mb-3"><label>No Telepon</label><input type="text" name="no_telepon" class="form-control" required></div>
                <div class="mb-3"><label>Asal Kampus</label><input type="text" name="asal_kampus" class="form-control" required></div>
                <div class="mb-3"><label>NPSN</label><input type="text" name="npsn" class="form-control" required></div>
                <div class="mb-3"><label>No KK</label><input type="text" name="no_kk" class="form-control" required></div>
                <div class="mb-3"><label>Nama Ortu</label><input type="text" name="nama_ortu" class="form-control" required></div>
                <div class="mb-3"><label>NIK Ortu</label><input type="text" name="nik_ortu" class="form-control" required></div>
                <div class="mb-3"><label>Pendidikan Terakhir Ortu</label><input type="text" name="pendidikan_terakhir_ortu" class="form-control" required></div>
                <div class="mb-3"><label>Alamat Ortu</label><textarea name="alamat_ortu" class="form-control" required></textarea></div>
                <div class="mb-3"><label>No Telepon Ortu</label><input type="text" name="no_telepon_ortu" class="form-control" required></div>
                <div class="mb-3"><label>Pekerjaan Ortu</label><input type="text" name="pekerjaan_ortu" class="form-control" required></div>
                <div class="mb-3"><label>Penghasilan Ortu</label><input type="text" name="penghasilan_ortu" class="form-control" required></div>
                <div class="mb-3"><label>Periode Penghasilan Ortu</label><input type="text" name="periode_penghasilan_ortu" class="form-control" required></div>
                <div class="mb-3">
                    <label>Nilai Tes</label>
                    <input type="text" name="nilai_tes" class="form-control" value="{{ old('nilai_tes') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3"><label>Transkrip Nilai</label><input type="text" name="transkrip_nilai" class="form-control" required></div>
                <div class="mb-3"><label>Surat Rekomendasi</label><input type="text" name="surat_rekomendasi" class="form-control" required></div>
                <div class="mb-3"><label>Motivasi</label><textarea name="motivasi" class="form-control" required></textarea></div>
                <div class="mb-3"><label>Pernyataan Kebenaran</label><select name="pernyataan_kebenaran" class="form-select" required><option value="1">Ya</option><option value="0">Tidak</option></select></div>
                <div class="mb-3"><label>Siap Tes Seleksi</label><select name="siap_tes_seleksi" class="form-select" required><option value="1">Ya</option><option value="0">Tidak</option></select></div>
                <div class="mb-3"><label>Status</label><select name="status" class="form-select" required><option value="pending">Pending</option><option value="lolos administrasi">Lolos Administrasi</option><option value="disetujui">Disetujui</option><option value="ditolak">Ditolak</option></select></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection 