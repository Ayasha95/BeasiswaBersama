<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Admin</title>

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
      max-width: 400px;
      margin: 40px auto;
    }
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center min-vh-100">

      <div class="col-md-6 col-lg-5">

        <div class="card custom-card">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h1 class="h4 text-gray-900 mb-2">Login Admin Beasiswa Bersama</h1>
            </div>
            <form action="{{ route('admin.login.submit') }}" method="POST" class="user">
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
              <div class="form-group mb-3">
                <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
              </div>
              <div class="form-group mb-3">
                <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
              </div>
              <div class="form-group mb-3">
                <div class="custom-control custom-checkbox small">
                  <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                  <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block w-100">Login</button>
            </form>
            <hr>
            <!-- <div class="text-center">
              <a class="small" href="{{ route('admin.register.submit') }}">Create an Account!</a>
            </div> -->
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