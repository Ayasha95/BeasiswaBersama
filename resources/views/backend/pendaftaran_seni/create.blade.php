@extends('backend.layouts.app')

@section('contents')
<div class="container mt-4">
    <h2>Tambah Pendaftar Talent Seni</h2>
    <form action="{{ route('admin.pendaftaran.talent_seni.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Asal Kampus</label>
            <input type="text" name="asal_kampus" class="form-control">
        </div>
        <div class="mb-3">
            <label>NPSN</label>
            <input type="text" name="npsn" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi Prestasi</label>
            <textarea name="deskripsi_prestasi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Jenis Seni</label>
            <input type="text" name="jenis_seni" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Portofolio (PDF)</label>
            <input type="file" name="portofolio_pdf" class="form-control">
        </div>
        <div class="mb-3">
            <label>Sertifikat Seni</label>
            <input type="file" name="sertifikat_seni" class="form-control">
        </div>
        <div class="mb-3">
            <label>Bersedia Seleksi</label>
            <select name="bersedia_seleksi" class="form-control" required>
                <option value="ya">Ya</option>
                <option value="tidak">Tidak</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="disetujui">Disetujui</option>
                <option value="lolos administrasi">Lolos Administrasi</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pendaftaran.talent_seni.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
