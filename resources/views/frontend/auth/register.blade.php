@extends('frontend.layouts.daftar')

@section('content')
<section id="register" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg rounded border-0">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h2 class="h4 fw-bold text-primary">Registrasi Akun Beasiswa</h2>
              <p class="text-muted">Silakan daftar untuk mengakses layanan beasiswa</p>
            </div>
            <form action="{{ route('frontend.register.aksi') }}" method="POST">
              @csrf
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <div class="mb-3">
                <label for="name" class="form-label"><i class="fas fa-user"></i> Nama Lengkap</label>
                <input name="nama" type="text" class="form-control" placeholder="Masukkan nama lengkap Anda" required autofocus>
              </div>
              <div class="mb-3">
                <label for="no_telp" class="form-label"><i class="fas fa-phone"></i> No Telepon</label>
                <input name="no_telp" type="text" class="form-control" placeholder="Masukkan nomor telepon Anda" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input name="email" type="email" class="form-control" placeholder="Masukkan email Anda" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input name="password" type="password" class="form-control" placeholder="Masukkan password Anda" required>
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label"><i class="fas fa-lock"></i> Konfirmasi Password</label>
                <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi password" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-user-plus"></i> Daftar
              </button>
            </form>
            <div class="text-center mt-4">
              <p class="mb-0">Sudah punya akun? <a href="{{ route('frontend.loginForm') }}" class="text-primary fw-bold">Login di sini</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 