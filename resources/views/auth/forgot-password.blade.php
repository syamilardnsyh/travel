<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Password</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">

  @vite('resources/css/app.css')

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body rounded">

      @if (session('error'))
        <div class="alert alert-danger text-center">{{session('error')}}</div>
      @endif

      <p class="login-box-msg"><b>Erlangga Tour & Travel</b><br>Lupa password? Masukkan email Anda untuk menerima kode OTP.</p>

      <form action="/forgot-password" method="post">
        @csrf
        @error('email')
          <small class="text-danger">{{$message}}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email terdaftar" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-warning btn-block text-bold">Kirim Kode OTP</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1 text-center">
        <a href="/login" class="text-secondary">Kembali ke halaman Login</a>
      </p>
    </div>
  </div>
</div>

<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>