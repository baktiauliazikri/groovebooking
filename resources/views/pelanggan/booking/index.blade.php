<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Groove Barberhouse</title>
    @livewireStyles
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="fe/css/bootstrap.min.css">

    <link rel="stylesheet" href="fe/css/bootstrap-icons.css">

    <link rel="stylesheet" href="fe/css/owl.carousel.min.css">

    <link rel="stylesheet" href="fe/css/owl.theme.default.min.css">

    <link href="fe/css/templatemo-pod-talk.css" rel="stylesheet">

    <link href="fe/css/wizard.css" rel="stylesheet" id="bootstrap-css">

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
                            <a class="nav-link" href="#section_3">My Booking</a>
                        </li>

                        <li class="nav-item @yield('menuBeranda')">
                            <a class="nav-link" href="{{route('pelanggan-profile.index')}}">Profile</a>
                        </li>
                    </ul>
                </div>
                <div class="ms-4">
                    <a class="btn custom-btn custom-border-btn smoothscroll" href="/logout-action">Logout</a>
                </div>
            </div>
        </nav>
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <div id="step1" class="card" style="display: block;">
                                <div class="card-header">
                                    {{-- <h1>Booking Your Service</h1> --}}
                                    <div class="card-body">
                                        {{--
                                        <livewire:bookingpelanggan.create /> --}}
                                        @livewire('bookingpelanggan.create')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <!-- JAVASCRIPT FILES -->
    <script src="fe/js/jquery.min.js"></script>
    <script src="fe/js/bootstrap.bundle.min.js"></script>
    <script src="fe/js/owl.carousel.min.js"></script>
    <script src="fe/js/custom.js"></script>
    @livewireScripts
    @include('sweetalert::alert')
</body>


</html>