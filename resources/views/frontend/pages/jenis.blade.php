@extends('frontend.layouts.main')

@section('content')
<section id="jenis-beasiswa" class="section-bg py-5">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Jenis Beasiswa</h2>
      <p>Berikut adalah beberapa jenis beasiswa yang tersedia melalui program <strong>Beasiswa Bersama</strong>.</p>
    </div>

    <div class="row gy-4">

      {{-- Card 1 --}}
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Inovasi Digital</h5>
            <p class="card-text">Untuk mahasiswa dengan karya inovatif di bidang teknologi, aplikasi, atau software. Mendorong kreativitas dan solusi digital.</p>
            <span class="badge bg-secondary">Kode: TECHNOVA25</span>
          </div>
        </div>
      </div>

      {{-- Card 2 --}}
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Talent Seni</h5>
            <p class="card-text">Diperuntukkan bagi mahasiswa dengan bakat luar biasa dalam seni musik, tari, teater, atau rupa dengan pengakuan dari kampus atau nasional.</p>
            <span class="badge bg-secondary">Kode: TALENT-ART</span>
          </div>
        </div>
      </div>

      {{-- Card 3 --}}
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Global Prestasi</h5>
            <p class="card-text">Beasiswa penuh studi S1/S2 ke luar negeri. Seleksi berdasarkan akademik, kemampuan bahasa Inggris, dan aktivitas non-akademik.</p>
            <span class="badge bg-secondary">Kode: GLOBAL</span>
          </div>
        </div>
      </div>

      {{-- Card 4 --}}
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Sains Jepang</h5>
            <p class="card-text">Dukungan penuh untuk studi teknik dan sains di universitas Jepang—termasuk kuliah, biaya hidup, bahasa, dan tiket pesawat.</p>
            <span class="badge bg-secondary">Kode: SCIENCE</span>
          </div>
        </div>
      </div>

      {{-- Card 5 --}}
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Mandiri</h5>
            <p class="card-text">Ditujukan bagi mahasiswa dari keluarga menengah ke bawah yang tetap aktif, mandiri, dan unggul secara akademik.</p>
            <span class="badge bg-secondary">Kode: MANDIRI</span>
          </div>
        </div>
      </div>

      {{-- Card 6 --}}
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Cendekia</h5>
            <p class="card-text">Bagi mahasiswa berprestasi yang berasal dari keluarga dengan keterbatasan ekonomi—didukung pelatihan dan pengembangan diri.</p>
            <span class="badge bg-secondary">Kode: BC2025</span>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
@endsection