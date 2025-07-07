<!DOCTYPE html>
<html lang="id">
<head>
    @include('frontend.layouts.head')
    <title>Daftar Akun - Beasiswa Bersama</title>
</head>
<body>
    @include('frontend.layouts.header')
    <main id="main" class="py-5" style="min-height: 80vh;">
        @yield('content')
    </main>
    @include('frontend.layouts.footer')
    @stack('scripts')
</body>
</html>
