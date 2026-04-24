<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buat Password Baru</title>

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

      @if (session('success'))
        <div class="alert alert-success text-center">{{session('success')}}</div>
      @endif

      <p class="login-box-msg"><b>Erlangga Tour & Travel</b><br>Masukkan kode OTP dari email dan buat password baru Anda.</p>

      <form action="/reset-password/{{ $unique_id }}" method="post">
        @csrf
        
        @error('otp')
          <small class="text-danger">{{$message}}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="text" name="otp" class="form-control" placeholder="Masukkan 6 Digit OTP" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

        @error('password')
          <small class="text-danger">{{$message}}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password Baru" id="password" required minlength="6">
          <div class="input-group-append show-password">
            <div class="input-group-text" style="cursor: pointer;">
              <span class="fas fa-lock" id="password-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-4">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password Baru" id="password_confirmation" required minlength="6">
          <div class="input-group-append show-password-confirm">
            <div class="input-group-text" style="cursor: pointer;">
              <span class="fas fa-lock" id="password-confirm-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Simpan & Login</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

<script>
    // Script mata untuk show/hide password baru
    $('.show-password').on('click', function(){
        if($('#password').attr('type') == 'password'){
            $('#password').attr('type', 'text');
            $('#password-lock').attr('class', 'fas fa-unlock');
        }else{
            $('#password').attr('type', 'password');
            $('#password-lock').attr('class', 'fas fa-lock');
        }
    });

    // Script mata untuk show/hide konfirmasi password
    $('.show-password-confirm').on('click', function(){
        if($('#password_confirmation').attr('type') == 'password'){
            $('#password_confirmation').attr('type', 'text');
            $('#password-confirm-lock').attr('class', 'fas fa-unlock');
        }else{
            $('#password_confirmation').attr('type', 'password');
            $('#password-confirm-lock').attr('class', 'fas fa-lock');
        }
    });
</script>
</body>
</html>