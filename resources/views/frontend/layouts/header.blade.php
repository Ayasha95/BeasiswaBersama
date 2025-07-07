<!-- ======= Header/Navbar ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="{{ url('/') }}">Beasiswa Bersama</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->

      <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="">

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
        <li><a class="nav-link scrollto" href="{{ route('tentang') }}">Tentang Kami</a></li>
        <li><a class="nav-link scrollto" href="{{ route('jenis') }}">Beasiswa</a></li>
        <li><a class="nav-link scrollto" href="{{ route('panduan') }}">Panduan</a></li>
        <li><a class="nav-link scrollto" href="{{ route('faq') }}">FAQ</a></li>
        <li><a class="nav-link scrollto" href="{{ route('kontak') }}">Kontak Kami</a></li>
        <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('frontend.register') }}">Daftar Sekarang</a>
        </li>
             </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>        