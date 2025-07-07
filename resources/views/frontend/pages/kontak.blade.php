@extends('frontend.layouts.main')

@section('content')
<section id="kontak-kami" class="section-bg py-5">
  <div class="container" data-aos="fade-up">
    
    <div class="section-title text-center">
      <h2>Kontak Kami</h2>
      <p>Hubungi kami melalui form di bawah ini atau lewat kontak yang tersedia di samping.</p>
    </div>

    <div class="row g-4">
      {{-- Kolom Form Kontak --}}
      <div class="col-lg-6">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title mb-4 text-primary fw-bold">Formulir Kontak</h5>

            {{-- Alert sukses jika pesan berhasil dikirim --}}
            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Form Kontak --}}
            <form action="{{ route('kontak.kirim') }}" method="POST" class="php-email-form">
              @csrf
              <div class="form-group mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Aktif" required>
              </div>
              <div class="form-group mb-3">
                <textarea name="pesan" class="form-control" rows="5" placeholder="Tulis pesan Anda..." required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- Kolom Informasi Kontak --}}
      <div class="col-lg-6">
        <div class="card h-100 border-0 bg-light shadow-sm p-4">
          <h5 class="text-dark fw-semibold mb-3">Informasi Kontak</h5>
          <p><i class="bi bi-envelope me-2"></i> info@beasiswabersama.id</p>
          <p><i class="bi bi-telephone me-2"></i> +62 812 3456 7890</p>
          <p><i class="bi bi-geo-alt me-2"></i> Jl. Pendidikan No. 123, Jakarta</p>
          <hr>
          <p class="text-muted small mb-0">Kami akan merespons pesan Anda secepat mungkin dalam waktu 1–3 hari kerja.</p>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection