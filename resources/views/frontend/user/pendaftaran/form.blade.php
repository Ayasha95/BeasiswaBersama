@extends('frontend.layouts.main')

@section('title', 'Form Pendaftaran Beasiswa')

@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Form Pendaftaran {{ $beasiswa->nama_beasiswa }}</h4>
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

                        <form action="{{ route('pendaftaran.simpan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">
                            
    
                            <!-- Nama Beasiswa -->
                            <div class="mb-3">
                                <label class="form-label">Nama Beasiswa</label>
                                <input type="text" class="form-control" value="{{ $beasiswa->nama_beasiswa }}" readonly>
                            </div>

                            <!-- Data Diri -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama', auth()->user()->name ?? '') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>NIK</label>
                                    <input type="text" name="nik" maxlength="16" pattern="\d{16}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Alamat</label>
                                    <textarea name="alamat" rows="2" class="form-control" required></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>No. Telepon</label>
                                    <input type="tel" name="no_telp" class="form-control" value="{{ old('no_telp', auth()->user()->no_telp ?? '') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Asal Kampus</label>
                                    <input type="text" name="asal_kampus" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>NPSN</label>
                                    <input type="text" name="npsn" class="form-control">
                                </div>
                            </div>

                            <!-- Orang Tua -->
                            <hr>
                            <h5>Data Orang Tua/Wali</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>No. KK</label>
                                    <input type="text" name="no_kk" maxlength="16" pattern="\d{16}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Nama Orang Tua/Wali</label>
                                    <input type="text" name="nama_orang_tua_wali" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>NIK Orang Tua/Wali</label>
                                    <input type="text" name="nik_orang_tua_wali" maxlength="16" pattern="\d{16}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pendidikan Terakhir</label>
                                    <select name="pendidikan_terakhir" class="form-control" required>
                                        <option value="">Pilih</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Alamat Orang Tua/Wali</label>
                                    <textarea name="alamat_orang_tua_wali" rows="2" class="form-control" required></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>No. Telepon Orang Tua/Wali</label>
                                    <input type="tel" name="no_telp_orang_tua_wali" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pekerjaan</label>
                                    <select name="pekerjaan" class="form-control" required>
                                        <option value="">Pilih</option>
                                        <option>PNS</option>
                                        <option>TNI/POLRI</option>
                                        <option>Swasta</option>
                                        <option>Wirausaha</option>
                                        <option>Petani</option>
                                        <option>Nelayan</option>
                                        <option>Pedagang</option>
                                        <option>Pensiunan</option>
                                        <option>Tidak Bekerja</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Penghasilan</label>
                                    <select name="penghasilan" class="form-control" required>
                                        <option value="">Pilih Rentang</option>
                                        <option value="<1juta">< 1 juta</option>
                                        <option value="1-3juta">1 - 3 juta</option>
                                        <option value="3-5juta">3 - 5 juta</option>
                                        <option value="5-10juta">5 - 10 juta</option>
                                        <option value=">10juta">> 10 juta</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Periode Penghasilan</label>
                                    <select name="periode_penghasilan" class="form-control" required>
                                        <option value="perbulan">Per Bulan</option>
                                        <option value="pertahun">Per Tahun</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Upload Dokumen -->
                            <hr>
                            <h5>Upload Dokumen</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Transkrip Nilai</label>
                                    <input type="file" name="dokumen[transkrip]" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Surat Rekomendasi</label>
                                    <input type="file" name="dokumen[rekomendasi]" class="form-control" required>
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
