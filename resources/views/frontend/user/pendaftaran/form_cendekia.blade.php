@extends('frontend.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <b>Form Pendaftaran Beasiswa Cendekia</b>
        </div>
        <div class="card-body">
            <form action="{{ route('frontend.pendaftaran.cendekia.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Beasiswa</label>
                    <input type="text" class="form-control" value="Beasiswa Cendekia" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Asal Kampus</label>
                        <input type="text" name="asal_kampus" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">NPSN</label>
                    <input type="text" name="npsn" class="form-control" required>
                </div>
                <hr>
                <h5>Data Orang Tua/Wali</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. KK</label>
                        <input type="text" name="no_kk" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Orang Tua/Wali</label>
                        <input type="text" name="nama_ortu" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIK Orang Tua/Wali</label>
                        <input type="text" name="nik_ortu" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan_terakhir_ortu" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat Orang Tua/Wali</label>
                    <textarea name="alamat_ortu" class="form-control" rows="2" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. Telepon Orang Tua/Wali</label>
                        <input type="text" name="no_telepon_ortu" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <select name="pekerjaan_ortu" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="Petani">Petani</option>
                            <option value="Buruh">Buruh</option>
                            <option value="PNS">PNS</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Penghasilan</label>
                        <select name="penghasilan_ortu" class="form-control" required>
                            <option value="">Pilih Rentang</option>
                            <option value="< 1 juta">< 1 juta</option>
                            <option value="1-2 juta">1-2 juta</option>
                            <option value="> 2 juta">> 2 juta</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Periode Penghasilan</label>
                        <input type="text" name="periode_penghasilan_ortu" class="form-control" value="Per Bulan" required>
                    </div>
                </div>
                <hr>
                <h5>Upload Dokumen</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Transkrip Nilai</label>
                        <input type="file" name="transkrip_nilai" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Rekomendasi</label>
                        <input type="file" name="surat_rekomendasi" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Motivasi Mengikuti Beasiswa</label>
                    <textarea name="motivasi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-check mb-2">
                    <input type="hidden" name="pernyataan_kebenaran" value="0">
                    <input class="form-check-input" type="checkbox" name="pernyataan_kebenaran" id="pernyataan_kebenaran" value="1" required>
                    <label class="form-check-label" for="pernyataan_kebenaran">
                        Saya menyatakan bahwa data yang saya isi adalah benar dan dapat dipertanggungjawabkan.
                    </label>
                </div>
                <div class="form-check mb-4">
                    <input type="hidden" name="siap_tes_seleksi" value="0">
                    <input class="form-check-input" type="checkbox" name="siap_tes_seleksi" id="siap_tes_seleksi" value="1" required>
                    <label class="form-check-label" for="siap_tes_seleksi">
                        Saya siap untuk mengikuti tes seleksi beasiswa.
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Kirim Pendaftaran</button>
            </form>
            <a href="{{ route('user.daftar-beasiswa') }}" class="d-block mt-3">&larr; Kembali ke Daftar Beasiswa</a>
        </div>
    </div>
</div>
@endsection 