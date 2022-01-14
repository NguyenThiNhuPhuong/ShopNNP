<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/ShopNNP/public/Admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/ShopNNP/public/Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/ShopNNP/public/Admin/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Shop</b>NNP</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Đăng nhập</p>
        @include('admin.alert')
        <form action="{{url('Admin/user/login/store')}}" method="post">
        @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-7">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            </div>
            <!-- /.col -->
          </div>
          <div class="form-group">
            <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
              <a class="btn btn-block btn-outline-primary" href="{{url('facebook/login')}}">
                <i class="fab fa-facebook mr-2"></i> Đăng nhập bằng Facebook
              </a>
              <a class="btn btn-block btn-outline-danger" href="{{url('google/login')}}">
                <i class="fab fa-google-plus mr-2"></i> Đăng nhập bằng Google+
              </a>
            </div>
          </div>
          
        </form>


        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="">Quên mật khẩu</a>
        </p>
        <p class="mb-0">
          <a href="{{route('register')}}" class="text-center">Đăng ký tài khoản</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="/ShopNNP/public/Admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/ShopNNP/public/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/ShopNNP/public/Admin/dist/js/adminlte.min.js"></script>
</body>

</html>