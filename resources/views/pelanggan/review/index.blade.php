<!-- resources/views/pelanggan/dashboard/review.blade.php -->

<div class="container">
    <div class="row">


        <!-- Row kedua untuk menampilkan list review -->
        <div class="col-lg-12 col-12">
            <div class="row">
                @foreach($reviews->take(6) as $index => $data)
                <div class="col-lg-6 col-12 mb-3 scroll-animation">
                    <div class="card">
                        <div class="card-body" ">
                            <p class="card-title "   >Nama : <strong>{{ $data->nama_pengunjung }}</strong></p>
                            <p class="card-text"  >Rating :<strong><span class="star-rating"> {!! str_repeat('&#9733;',
                                        $data->rating) !!}</span></strong></p>
                            <p class="card-text"  >Ulasan : <strong>{{ $data->ulasan }}</strong></p>
                            <p class="mb-3"  >Tanggal : <strong>{{ $data->created_at->format('d M Y') }}</strong></p>

                        </div>
                    </div>
                </div>

                @if(($index + 1) % 2 == 0)
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
