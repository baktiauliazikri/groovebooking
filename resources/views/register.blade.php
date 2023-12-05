<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Groove Barberhouse</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('be/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('be/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('be/dist/css/adminlte.min.css') }}">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1585747860715-2ba37e788b70?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            /* Ganti URL dengan URL gambar latar belakang yang sesuai */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box" style="width: 800px; opacity: 0.9;">
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header text-center my-auto">
                        <h2 style="font-family:'Trebuchet MS'">Groove </br>Barberhouse</h1>
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid" width="200">
                        <p style="font-family:'Courier New', Courier, monospace">"Consult your Haircut
                        Sculpting Handsome Excellence Elevate Your Handsomeness Here!"</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body register-card-body rounded">
                        <h3 class="login-box-msg">Buat akun baru</h3>
                        <form action="/register-action" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama" value="{{ old('name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ old('email') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Konfirmasi Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
                        </form>
                        <p class="mb-0">
                            <a href="/login" class="text-center">Sudah punya akun? Login</a>
                        </p>
                    </div>
                </div>
            </div>
            <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
            @include('sweetalert::alert')
</body>

</html>
