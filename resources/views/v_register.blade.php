
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPRA | Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <div class="login-logo">
        <img src="img/itdel.PNG" width="70px" alt="">
    </div>
      <h3 class="login-logo"><b>SIPRA</b>Register</h3>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="kode_unit">
                      <option value="null">Pilih Unit</option>
                        @foreach($user as $data)
                      <option value="<?= $data->kode_unit?>"><?= $data->nama_unit?></option>
                        @endforeach
                        </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
              @error('kode_unit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="level">
                      <option value="null">Pilih Role</option>
                      <option value="2">User</option>
                      
                        </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
              @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-sm-4 mb-2">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-4">
        <a href="{{ route('login') }}" class="text-center">Back to Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
