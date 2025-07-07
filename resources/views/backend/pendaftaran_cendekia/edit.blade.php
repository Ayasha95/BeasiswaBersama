@extends('backend.layouts.app')

@section('contents')
<div class="container">
    <h1 class="mb-4">Edit Pendaftaran Cendekia</h1>
    <form action="{{ route('admin.pendaftaran_cendekia.update', $pendaftaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3 p-3">
                    <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}" required></div>
                    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $pendaftaran->email) }}" required></div>
                    <div class="mb-3"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $pendaftaran->nik) }}" required></div>
                    <div class="mb-3"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" required></div>
                    <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $pendaftaran->alamat) }}</textarea></div>
                    <div class="mb-3"><label>No Telepon</label><input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $pendaftaran->no_telepon) }}" required></div>
                    <div class="mb-3"><label>Asal Kampus</label><input type="text" name="asal_kampus" class="form-control" value="{{ old('asal_kampus', $pendaftaran->asal_kampus) }}" required></div>
                    <div class="mb-3"><label>NPSN</label><input type="text" name="npsn" class="form-control" value="{{ old('npsn', $pendaftaran->npsn) }}" required></div>
                    <div class="mb-3"><label>No KK</label><input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $pendaftaran->no_kk) }}" required></div>
                    <div class="mb-3"><label>Nama Ortu</label><input type="text" name="nama_ortu" class="form-control" value="{{ old('nama_ortu', $pendaftaran->nama_ortu) }}" required></div>
                    <div class="mb-3"><label>NIK Ortu</label><input type="text" name="nik_ortu" class="form-control" value="{{ old('nik_ortu', $pendaftaran->nik_ortu) }}" required></div>
                    <div class="mb-3"><label>Pendidikan Terakhir Ortu</label><input type="text" name="pendidikan_terakhir_ortu" class="form-control" value="{{ old('pendidikan_terakhir_ortu', $pendaftaran->pendidikan_terakhir_ortu) }}" required></div>
                    <div class="mb-3"><label>Alamat Ortu</label><textarea name="alamat_ortu" class="form-control" required>{{ old('alamat_ortu', $pendaftaran->alamat_ortu) }}</textarea></div>
                    <div class="mb-3"><label>No Telepon Ortu</label><input type="text" name="no_telepon_ortu" class="form-control" value="{{ old('no_telepon_ortu', $pendaftaran->no_telepon_ortu) }}" required></div>
                    <div class="mb-3"><label>Pekerjaan Ortu</label><input type="text" name="pekerjaan_ortu" class="form-control" value="{{ old('pekerjaan_ortu', $pendaftaran->pekerjaan_ortu) }}" required></div>
                    <div class="mb-3">
                        <label for="penghasilan_ortu" class="form-label fw-bold">Penghasilan Ortu <span class="text-danger">*</span></label>
                        <select id="penghasilan_ortu" name="penghasilan_ortu" class="form-control @error('penghasilan_ortu') is-invalid @enderror" required>
                            <option value="">-- Pilih Penghasilan --</option>
                            <option value="< 1 juta" {{ old('penghasilan_ortu', $pendaftaran->penghasilan_ortu) == '< 1 juta' ? 'selected' : '' }}>< 1 juta</option>
                            <option value="1-3 juta" {{ old('penghasilan_ortu', $pendaftaran->penghasilan_ortu) == '1-3 juta' ? 'selected' : '' }}>1-3 juta</option>
                            <option value="> 3 juta" {{ old('penghasilan_ortu', $pendaftaran->penghasilan_ortu) == '> 3 juta' ? 'selected' : '' }}>> 3 juta</option>
                        </select>
                        @error('penghasilan_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3"><label>Periode Penghasilan Ortu</label><input type="text" name="periode_penghasilan_ortu" class="form-control" value="{{ old('periode_penghasilan_ortu', $pendaftaran->periode_penghasilan_ortu) }}" required></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 p-3">
                    <div class="mb-3"><label>Transkrip Nilai</label><input type="text" name="transkrip_nilai" class="form-control" value="{{ old('transkrip_nilai', $pendaftaran->transkrip_nilai) }}" required></div>
                    <div class="mb-3"><label>Surat Rekomendasi</label><input type="text" name="surat_rekomendasi" class="form-control" value="{{ old('surat_rekomendasi', $pendaftaran->surat_rekomendasi) }}" required></div>
                    <div class="mb-3"><label>Motivasi</label><textarea name="motivasi" class="form-control" required>{{ old('motivasi', $pendaftaran->motivasi) }}</textarea></div>
                    <div class="mb-3">
                        <label for="pernyataan_kebenaran" class="form-label fw-bold">Pernyataan Kebenaran <span class="text-danger">*</span></label>
                        <select id="pernyataan_kebenaran" name="pernyataan_kebenaran" class="form-control @error('pernyataan_kebenaran') is-invalid @enderror" required>
                            <option value="1" @if(old('pernyataan_kebenaran', $pendaftaran->pernyataan_kebenaran)==1) selected @endif>Ya</option>
                            <option value="0" @if(old('pernyataan_kebenaran', $pendaftaran->pernyataan_kebenaran)==0) selected @endif>Tidak</option>
                        </select>
                        @error('pernyataan_kebenaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="siap_tes_seleksi" class="form-label fw-bold">Siap Tes Seleksi <span class="text-danger">*</span></label>
                        <select id="siap_tes_seleksi" name="siap_tes_seleksi" class="form-control @error('siap_tes_seleksi') is-invalid @enderror" required>
                            <option value="1" @if(old('siap_tes_seleksi', $pendaftaran->siap_tes_seleksi)==1) selected @endif>Ya</option>
                            <option value="0" @if(old('siap_tes_seleksi', $pendaftaran->siap_tes_seleksi)==0) selected @endif>Tidak</option>
                        </select>
                        @error('siap_tes_seleksi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                        <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="pending" {{ old('status', $pendaftaran->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="lolos administrasi" {{ old('status', $pendaftaran->status) == 'lolos administrasi' ? 'selected' : '' }}>Lolos Administrasi</option>
                            <option value="disetujui" {{ old('status', $pendaftaran->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="ditolak" {{ old('status', $pendaftaran->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Nilai Tes</label>
                        <input type="text" name="nilai_tes" class="form-control" value="{{ old('nilai_tes', $pendaftaran->nilai_tes) }}">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection 