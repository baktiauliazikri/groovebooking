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
                            <a class="nav-link" href="#section_3">My Booking</a>
                        </li>

                        <li class="nav-item @yield('menuBeranda')">
                            <a class="nav-link" href="#section_4">Profile</a>
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
                                <div class="card-body">


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
    @include('sweetalert::alert')
    <script>
        function nextStep(step) {
            // Sembunyikan langkah saat ini
            document.getElementById('step' + (step - 1)).style.display = 'none';

            // Tampilkan langkah berikutnya
            document.getElementById('step' + step).style.display = 'block';

            // Jika ini adalah langkah terakhir, tampilkan rincian pilihan
            if (step === 4) {
                displayResult();
            }
        }

        function displayResult() {
            // Ambil nilai formulir dari setiap langkah
            var service = document.forms['formStep1']['service'].value;
            var barberman = document.forms['formStep2']['barberman'].value;
            var tanggal = document.forms['formStep3']['tanggal'].value;
            var jam = document.forms['formStep3']['jam'].value;

            // Tampilkan rincian pilihan
            var resultDiv = document.getElementById('result');
            resultDiv.innerHTML = `
                <p>Service: ${service}</p>
                <p>Barberman: ${barberman}</p>
                <p>Tanggal: ${tanggal}</p>
                <p>Jam: ${jam}</p>
            `;
        }

    </script>
</body>

</html>