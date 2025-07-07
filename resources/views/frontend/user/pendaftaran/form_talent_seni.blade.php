@extends('frontend.layouts.main')

@section('title', 'Form Pendaftaran Beasiswa Talent Seni')

@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Form Pendaftaran Beasiswa Talent Seni</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('pendaftaran.simpan.talent_seni') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Data Diri Umum -->
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', auth()->user()->nama_lengkap ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No. Telepon</label>
                                <input type="tel" name="no_telepon" class="form-control" value="{{ old('no_telepon', auth()->user()->no_telepon ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" maxlength="16" value="{{ old('nik', auth()->user()->nik ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', auth()->user()->alamat ?? '') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asal Kampus</label>
                                <input type="text" name="asal_kampus" class="form-control" value="{{ old('asal_kampus', auth()->user()->asal_kampus ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NPSN</label>
                                <input type="text" name="npsn" class="form-control" value="{{ old('npsn', auth()->user()->npsn ?? '') }}">
                            </div>
                            <!-- Field Khusus Talent Seni -->
                            <hr>
                            <h5>Data Khusus Talent Seni</h5>
                            <div class="mb-3">
                                <label>Deskripsi singkat prestasi di bidang seni</label>
                                <textarea name="deskripsi_prestasi" class="form-control" rows="2" required>{{ old('deskripsi_prestasi') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Jenis seni yang ditekuni</label>
                                <select name="jenis_seni" class="form-control" required>
                                    <option value="">Pilih Jenis Seni</option>
                                    <option value="Musik">Musik</option>
                                    <option value="Tari">Tari</option>
                                    <option value="Teater">Teater</option>
                                    <option value="Rupa">Rupa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Upload portofolio karya (PDF)</label>
                                <input type="file" name="portofolio_pdf" class="form-control" accept="application/pdf" required>
                            </div>
                            <div class="mb-3">
                                <label>Upload bukti sertifikat lomba/kegiatan seni</label>
                                <input type="file" name="sertifikat_seni" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Apakah bersedia mengikuti seleksi tampil langsung/interview seni?</label>
                                <div>
                                    <input type="radio" name="bersedia_seleksi" value="ya" required> Ya
                                    <input type="radio" name="bersedia_seleksi" value="tidak" required class="ms-3"> Tidak
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('user.daftar-beasiswa') }}" class="btn btn-link">← Kembali ke Daftar Beasiswa</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 