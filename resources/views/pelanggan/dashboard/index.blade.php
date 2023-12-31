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

                    @include('pelanggan.imageSlider.index')
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
                    <a id="createReviewBtn" class="section-title btn custom-btn custom-border-btn">Create</a>

                    <script>
                        document.getElementById('createReviewBtn').addEventListener('click', function () {
                            Swal.fire({
                                title: 'Input Review',
                                showConfirmButton: false,
                                html: `
                                    <form id="swalForm" action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data" style="text-align:justify;">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="nama_pengunjung" class="mb-3">Nama Pengunjung</label>
                                            <input type="text" name="nama_pengunjung" class="form-control"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rating" class="mb-3">Rating</label>
                                            <div class="rating">
                                                @for ($i = 5; $i >= 1; $i--)
                                                <input class="mb-3" type="radio" name="rating" value="{{ $i }}" id="swal{{ $i }}"><label
                                                    for="swal{{ $i }}">☆</label>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ulasan" class="mb-3">Ulasan</label>
                                            <textarea name="ulasan" rows="4" class="form-control"></textarea>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn custom-btn custom-border-btn smoothscroll">Kirim Ulasan</button>
                                        </div>
                                    </form>`,
                                showCancelButton: false, // Menghilangkan tombol "OK"
                                focusConfirm: false,
                                preConfirm: () => {
                                    const form = document.getElementById('swalForm');
                                    return {
                                        nama_pengunjung: form.querySelector(
                                            'input[name="nama_pengunjung"]').value,
                                        rating: form.querySelector('input[name="rating"]:checked')
                                            .value,
                                        ulasan: form.querySelector('textarea[name="ulasan"]').value,
                                    };
                                },
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Submit form atau lakukan sesuai kebutuhan Anda
                                    document.getElementById('swalForm').submit();
                                }
                            });
                        });

                    </script>

                </div>
            </div>
            @include('pelanggan.review.index')
        </div>
    </div>

</section>
@endsection