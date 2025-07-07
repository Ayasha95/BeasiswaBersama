<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CARI BEASISWA - Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <style>
    .custom-card {
      border-radius: 1rem;
      box-shadow: 0 4px 24px rgba(0,0,0,0.08);
      overflow: hidden;
      max-width: 450px;
      margin: 40px auto;
    }
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-7 col-lg-6">
        <div class="card custom-card">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h1 class="h4 text-gray-900 mb-2">Create an Account!</h1>
            </div>
            <form action="{{ route('register.simpan') }}" method="POST" class="user">
              @csrf
              <div class="form-group mb-3">
                <input name="nama" type="text" class="form-control form-control-user @error('nama')is-invalid @enderror" id="exampleInputName" placeholder="Name">
                @error('nama')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address">
                @error('email')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group row mb-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                  @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-sm-6">
                  <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password">
                  @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block w-100">Register Account</button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>