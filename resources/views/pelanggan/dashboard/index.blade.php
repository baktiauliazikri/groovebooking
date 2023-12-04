@extends('pelanggan.layout.master')

@section('menuBeranda', 'active')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <h1 class="text-white">Consult Your Haircut</h1>

                    <p class="text-white">Sculpting Handsome Excellence: Elevate Your Handsomeness Here!</p>

                    <a href="/booking" class="btn custom-btn smoothscroll mt-3">Booking now !!</a>
                </div>

                <div class="owl-carousel owl-theme">
                    <div class="owl-carousel-info-wrap item">
                        <img src="fe/images/model/undercut.jpeg" class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="mb-2 uppercase">
                                Undercut
                                <img src="fe/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>
                    </div>
                    <div class="owl-carousel-info-wrap item">
                        <img src="fe/images/model/mullet.jpeg" class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="mb-2 uppercase">
                                Mullet
                                <img src="fe/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>
                    </div>
                    <div class="owl-carousel-info-wrap item">
                        <img src="fe/images/model/sidepart.jpeg" class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="mb-2 uppercase">
                                Sidepart
                                <img src="fe/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>
                    </div>
                    <div class="owl-carousel-info-wrap item">
                        <img src="fe/images/model/coloring.jpeg" class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="mb-2 uppercase">
                                Coloring
                                <img src="fe/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>
                    </div>
                    <div class="owl-carousel-info-wrap item">
                        <img src="fe/images/model/buzzcut.jpeg" class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="mb-2 uppercase">
                                Buzzcut
                                <img src="fe/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>
                    </div>
                    <div class="owl-carousel-info-wrap item">
                        <img src="fe/images/model/twoblock.jpeg" class="owl-carousel-image img-fluid" alt="">

                        <div class="owl-carousel-info">
                            <h4 class="mb-2 uppercase">
                                twoblock
                                <img src="fe/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="latest-podcast-section section-padding pb-0 scroll-animation" id="services">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Services</h4>
                </div>
            </div>
            @include('pelanggan.service.index')

        </div>
    </div>
</section>


<section class="topics-section section-padding pb-0 scroll-animation" id="barberman">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5 d-flex justify-content-between align-items-center mx-auto">
                    <h4 class="section-title">Barberman</h4>
                </div>
            </div>

            @include('pelanggan.barberman.index')
        </div>
    </div>
</section>


<section class="trending-podcast-section section-padding scroll-animation" id="review">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5 d-flex justify-content-between align-items-center">
                    <h4 class="section-title">Reviews</h4>
                </div>
            </div>
            @include('pelanggan.review.index')
        </div>
    </div>

</section>
@endsection