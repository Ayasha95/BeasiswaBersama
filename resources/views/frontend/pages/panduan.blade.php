@extends('frontend.layouts.main')

@section('content')
<section id="panduan" class="section-bg py-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Panduan Pendaftaran</h2>
      <p>Ikuti langkah-langkah berikut untuk mendaftar Beasiswa Bersama:</p>
    </div>

    <div class="row g-4 align-items-center">
  <!-- Kolom panduan: card dengan list -->
  <div class="col-md-6">
    <div class="card shadow-sm border-0 h-100">
      <div class="card-body">
        <ol class="list-group list-group-numbered">
          <li class="list-group-item border-0 ps-0">
            <strong>Registrasi Akun:</strong> Buat akun mahasiswa melalui formulir pendaftaran.
          </li>
          <li class="list-group-item border-0 ps-0">
            <strong>Login & Profil:</strong> Masuk ke akun dan lengkapi informasi profil secara lengkap.
          </li>
          <li class="list-group-item border-0 ps-0">
            <strong>Pilih Beasiswa:</strong> Telusuri daftar beasiswa, klik "Daftar" pada beasiswa yang diinginkan, dan lengkapi formulirnya.
          </li>
          <li class="list-group-item border-0 ps-0">
            <strong>Unggah Dokumen:</strong> Lampirkan semua dokumen persyaratan sesuai yang diminta.
          </li>
          <li class="list-group-item border-0 ps-0">
            <strong>Submit & Verifikasi:</strong> Kirim pendaftaran dan tunggu proses verifikasi oleh panitia.
          </li>
        </ol>
      </div>
    </div>
  </div>

  <!-- Kolom gambar -->
  <div class="col-md-6 text-center">
    <img src="{{ asset('frontend/assets/img/panduan-registrasi.png') }}" class="img-fluid rounded shadow-sm" alt="Panduan Pendaftaran" style="max-height: 460px; object-fit: contain;">
  </div>
</div>
    </div>
  </div>
</section>
@endsection