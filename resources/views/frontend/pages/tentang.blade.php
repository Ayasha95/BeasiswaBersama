@extends('frontend.layouts.main')

@section('content')
<section id="tentang-kami" class="tentang-kami section-bg">
  <div class="container" data-aos="fade-up">
    
    <div class="section-title text-left">
      <h2>Tentang Kami</h2>
      <h3>Kenali Lebih Dekat <span>Beasiswa Bersama</span></h3>
      <p>Beasiswa Bersama hadir untuk memberikan kesempatan pendidikan bagi generasi muda Indonesia yang berprestasi dan membutuhkan dukungan finansial.</p>
    </div>

    <div class="row align-items-center gy-4">
  <div class="col-lg-5">
    <img src="{{ asset('frontend/assets/img/ilustrasi-beasiswa.png') }}" class="img-fluid rounded shadow-sm" alt="Ilustrasi Beasiswa Bersama">
  </div>
  <div class="col-lg-7 ps-lg-5">
    <h3 class="fw-bold mb-3">Beasiswa Bersama: Mewujudkan Akses Pendidikan untuk Semua</h3>
    <p class="mb-3">
      <strong>Beasiswa Bersama</strong> merupakan inisiatif strategis yang dirancang untuk membuka akses pendidikan tinggi bagi pelajar berprestasi dan mereka yang berasal dari latar belakang ekonomi kurang mampu. Program ini tidak hanya memberikan bantuan biaya pendidikan, tetapi juga dukungan pengembangan diri bagi calon pemimpin masa depan Indonesia.
    </p>
    <p class="mb-3">
      Dengan melibatkan berbagai institusi pendidikan, lembaga mitra, dan sektor swasta, Beasiswa Bersama menghadirkan solusi nyata dalam mempersempit kesenjangan akses pendidikan berkualitas. Kami percaya bahwa setiap anak bangsa memiliki hak yang sama untuk meraih cita-cita.
    </p>
    <ul class="list-unstyled">
      <li class="mb-2"><i class="bx bx-check-circle text-primary"></i> Dukungan pendidikan dari jenjang sarjana hingga pascasarjana</li>
      <li class="mb-2"><i class="bx bx-check-circle text-primary"></i> Kolaborasi dengan universitas dan mitra strategis nasional</li>
      <li class="mb-2"><i class="bx bx-check-circle text-primary"></i> Seleksi berbasis merit dan kebutuhan finansial yang transparan</li>
    </ul>
  </div>
</div>

    <div class="row mt-4">
  <div class="col-lg-12">
    <h4>Visi dan Misi Beasiswa Bersama</h4>
    <ul>
      <li><i class="bx bx-bullseye"></i> <strong>Visi:</strong> Mewujudkan generasi muda Indonesia yang cerdas, berintegritas, dan berdaya saing melalui akses pendidikan yang merata.</li>
      <li><i class="bx bx-target-lock"></i> <strong>Misi:</strong> 
        <ul>
          <li><i class="bx bx-chevron-right"></i> Menyediakan bantuan pendidikan bagi siswa yang berprestasi dan kurang mampu.</li>
          <li><i class="bx bx-chevron-right"></i> Menjalin kolaborasi dengan institusi pendidikan dan mitra strategis.</li>
          <li><i class="bx bx-chevron-right"></i> Mendorong semangat belajar dan pengembangan potensi generasi muda.</li>
        </ul>
      </li>
    </ul>
    
    <h4 class="mt-4">Tujuan Program</h4>
    <ul>
      <li><i class="bx bx-check-circle"></i> Meningkatkan kesetaraan akses pendidikan tinggi di seluruh Indonesia.</li>
      <li><i class="bx bx-check-circle"></i> Memberikan dukungan bagi calon mahasiswa yang memiliki komitmen dan semangat belajar tinggi.</li>
      <li><i class="bx bx-check-circle"></i> Melahirkan lulusan yang mampu berkontribusi secara nyata bagi masyarakat dan bangsa.</li>
    </ul>
  </div>
</div>

  </div>
</section>
@endsection