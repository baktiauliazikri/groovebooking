<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Groove Barberhouse</title>


    @livewireStyles

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('be/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('be/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('be/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('be/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('be/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('be/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('be/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('be/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (Auth()->user()->foto_profile)
                        <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                            class="user-image img-circle elevation-2" alt="User Image">
                        @else
                        <img src="{{ asset('images/user.png') }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                        @endif
                        <span class="d-none d-md-inline">{{ Auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            @if (Auth()->user()->foto_profile)
                            <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                class="img-circle elevation-2" alt="User Image">
                            @else
                            <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2" alt="User Image">
                            @endif

                            <p>
                                {{ Auth()->user()->name }}
                                <small>Groove Barberhouse</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            @if(Auth::user()->level == 'Admin')
                            <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                            @else
                            <a href="{{ route('profile-barberman.index') }}" class="btn btn-default btn-flat">Profile</a>
                            @endif

                            <a href="/logout-action" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
                <span class="brand-text font-weight-light">Groove Barberhouse</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link @yield('menuDashboard')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (Auth()->user()->level == 'Admin')
                        <li class="nav-item">
                            <a href="{{ route('image-slider.index') }}" class="nav-link @yield('menuImageSlider')">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Image Slider
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-pelanggan.index') }}" class="nav-link @yield('menuDataPelanggan')">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Data Pelanggan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-barberman.index') }}" class="nav-link @yield('menuDataBarberman')">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Barberman
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-service.index') }}" class="nav-link @yield('menuDataService')">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Service
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('data-booking.index')}}" class="nav-link @yield('menuDataBooking')">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Booking
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="#" class="nav-link @yield('menuService')"> --}}
                                <a href="{{ route('data-review.index') }}" class="nav-link @yield('menuDataReview')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Data Review
                                    </p>
                                </a>
                        </li>
                        @elseif(Auth()->user()->level == 'Barberman')
                        <li class="nav-item">
                            {{-- <a href="#" class="nav-link @yield('menuService')"> --}}
                                <a href="{{ route('booking-barberman.index') }}"
                                    class="nav-link @yield('menuBookingBarberman')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Data Booking Barberman
                                    </p>
                                </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/logout-action" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; Groove Barberhouse {{ date('Y') }}
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="{{ asset('be/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('be/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('be/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('be/dist/js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('be/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('be/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('be/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('be/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('be/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('be/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('be/dist/js/pages/dashboard2.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    @livewireScripts
    @include('sweetalert::alert')
</body>

</html>