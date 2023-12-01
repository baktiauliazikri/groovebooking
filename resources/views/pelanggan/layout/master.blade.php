<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Groove Barberhouse</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-oDggmHJgB1A4fckDg0RqFFC4JY/AHRH4b5BtgU6twr5jepwBrM8ow5MWc3USCtiW" crossorigin="anonymous">


    <link rel="stylesheet" href="fe/css/bootstrap.min.css">

    <link rel="stylesheet" href="fe/css/bootstrap-icons.css">

    <link rel="stylesheet" href="fe/css/owl.carousel.min.css">

    <link rel="stylesheet" href="fe/css/owl.theme.default.min.css">

    <link href="fe/css/templatemo-pod-talk.css" rel="stylesheet">
    

    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="/">
                    <img src="images/logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item @yield('menuBeranda')">
                            <a class="nav-link" href="/">Home</a>
                        </li>

                        <li class="nav-item @yield('menuBooking')">
                            <a class="nav-link" href="{{ route('booking.index') }}">Booking</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#services">Service</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#barberman">Barberman</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#review">Review</a>
                        </li>

                    </ul>

                    <div class="ms-4">
                        @guest
                        <a href="/login" class="btn custom-btn custom-border-btn smoothscroll">Sign In</a>
                        <a href="/register" class="btn custom-btn custom-border-btn smoothscroll">Sign Up</a>
                        @endguest

                        @auth
                        <div class="dropdown">
                            <button class="btn custom-btn custom-border-btn dropdown-toggle" type="button"
                                id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                                <!-- Ganti dengan atribut nama user yang sesuai di model User -->
                            </button>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('pelanggan-profile.index')}}">Profile</a>
                                <a class="dropdown-item" href="/my-booking">My Booking</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout-action">Logout</a>
                            </div>
                        </div>
                        @endauth

                    </div>
                </div>
            </div>
        </nav>


        @yield('content')
    </main>


    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="col-lg-2 col-md-3 col-12">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                            <ul class="social-icon">
                                <li class="social-icon-item mb-3">
                                    <p class="copyright-text mb-0">Copyright © 2036 Talk Pod Company</p>
                                </li>
                            </ul>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contact</h6>

                    <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> 010-020-0340</p>

                    <p>
                        <strong class="d-inline me-2">Email:</strong>
                        <a href="#">inquiry@pod.co</a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <h6 class="site-footer-title mb-3">Social</h6>

                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="fe/js/jquery.min.js"></script>
    <script src="fe/js/bootstrap.bundle.min.js"></script>
    <script src="fe/js/owl.carousel.min.js"></script>
    <script src="fe/js/custom.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    @include('sweetalert::alert')

</body>

</html>