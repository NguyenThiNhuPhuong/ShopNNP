<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập bằng tài khoản Google</title>

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


        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng ký</p>
                @include('admin.alert')
                <form action="http://localhost:8080/ShopNNP/public/google/register/store" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="name" class="form-control d-none" value="{{$name}}">
                    <input type="text" name="google_id" class="form-control d-none" value="{{$google_id}}">
                    <input type="number" name="type_id" class="form-control d-none" value="2">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{$email}}" readonly>
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
                    <div class="input-group mb-3">
                        <input type="password" name="re_password" class="form-control" placeholder="Confirm password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- jQuery -->
    <script src="/ShopNNP/public/Admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/ShopNNP/public/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/ShopNNP/public/Admin/dist/js/adminlte.min.js"></script>
</body>

</html>