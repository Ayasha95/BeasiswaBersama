@extends('frontend.layouts.daftar')

@section('content')
<section id="login" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg rounded border-0">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h2 class="h4 fw-bold text-primary">Login Beasiswa Bersama</h2>
            </div>
            <form action="{{ route('frontend.login.aksi') }}" method="POST">
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
                <label for="nama_lengkap" class="form-label"><i class="fas fa-user"></i> Nama Lengkap</label>
                <input name="nama_lengkap" type="text" class="form-control" placeholder="Masukkan nama lengkap Anda" required autofocus>
              </div>
              <div class="mb-3">
                <label for="no_telepon" class="form-label"><i class="fas fa-phone"></i> No Telepon</label>
                <input name="no_telepon" type="text" class="form-control" placeholder="Masukkan nomor telepon Anda" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input name="email" type="email" class="form-control" placeholder="Masukkan email Anda" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group mb-3">
                <div class="custom-control custom-checkbox small">
                  <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                  <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-4">
              <p class="mb-0">Belum punya akun? <a href="{{ route('frontend.register') }}" class="text-primary fw-bold">Daftar di sini</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 