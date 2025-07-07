@extends('backend.layouts.app')

@section('contents')
<div class="container mt-4">
    <h2>Edit Pendaftar Talent Seni</h2>
    <form action="{{ route('admin.pendaftaran.talent_seni.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ $pendaftaran->nama_lengkap }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $pendaftaran->email }}" required>
        </div>
        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $pendaftaran->no_telepon }}" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $pendaftaran->nik }}">
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pendaftaran->tanggal_lahir }}">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $pendaftaran->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>Asal Kampus</label>
            <input type="text" name="asal_kampus" class="form-control" value="{{ $pendaftaran->asal_kampus }}">
        </div>
        <div class="mb-3">
            <label>NPSN</label>
            <input type="text" name="npsn" class="form-control" value="{{ $pendaftaran->npsn }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi Prestasi</label>
            <textarea name="deskripsi_prestasi" class="form-control" required>{{ $pendaftaran->deskripsi_prestasi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Jenis Seni</label>
            <input type="text" name="jenis_seni" class="form-control" value="{{ $pendaftaran->jenis_seni }}" required>
        </div>
        <div class="mb-3">
            <label>Bersedia Seleksi</label>
            <select name="bersedia_seleksi" class="form-control" required>
                <option value="ya" {{ $pendaftaran->bersedia_seleksi == 'ya' ? 'selected' : '' }}>Ya</option>
                <option value="tidak" {{ $pendaftaran->bersedia_seleksi == 'tidak' ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Jadwal Interview</label>
            <input type="datetime-local" name="jadwal_interview" class="form-control" value="{{ $pendaftaran->jadwal_interview ? date('Y-m-d\TH:i', strtotime($pendaftaran->jadwal_interview)) : '' }}">
        </div>
        <div class="mb-3">
            <label>Link Zoom</label>
            <input type="url" name="link_zoom" class="form-control" value="{{ $pendaftaran->link_zoom }}">
        </div>
        <div class="mb-3">
            <label>Catatan Admin</label>
            <textarea name="catatan_admin" class="form-control">{{ $pendaftaran->catatan_admin }}</textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $pendaftaran->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="disetujui" {{ $pendaftaran->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="lolos administrasi" {{ $pendaftaran->status == 'lolos administrasi' ? 'selected' : '' }}>Lolos Administrasi</option>
                <option value="ditolak" {{ $pendaftaran->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.pendaftaran.talent_seni.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
