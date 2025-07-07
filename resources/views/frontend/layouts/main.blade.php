<!DOCTYPE html>
<html lang="id">

<head>
  @include('frontend.layouts.head')
</head>

<body>

  @include('frontend.layouts.topbar')
  @include('frontend.layouts.header')

  <!-- ======= Hero Section ======= -->
  @hasSection('hero')
    @yield('hero')
  @endif

  <main id="main">
    @yield('content')
  </main>

  @include('frontend.layouts.footer')

  <!-- Back to Top Button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

  @stack('scripts')
</body>

</html>
