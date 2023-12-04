<!-- resources/views/pelanggan/dashboard/review.blade.php -->

<div class="container">
    <div class="row">


        <!-- Row kedua untuk menampilkan list review -->
        <div class="col-lg-8 col-12" style="max-height: 400px; overflow-y: auto;">
            <div class="row">
                @foreach($reviews as $index => $data)
                <div class="col-lg-6 col-12 mb-3 scroll-animation">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title"><strong>Nama :</strong> {{ $data->nama_pengunjung }}</p>
                            <p class="card-text">
                                <strong>Rating :</strong> {{ $data->rating }}/5
                            </p>
                            <p class="card-text"><strong>Ulasan :</strong> {{ $data->ulasan }}</p>
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


        <!-- Row pertama untuk form -->
        <div class="col-lg-4 col-12">
            <div class="card-body">
                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_pengunjung">Nama Pengunjung</label>
                        <input type="text" name="nama_pengunjung" class="form-control" required>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="rating">Rating</label>
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <label for="rating">Rating</label>
                        <div class="rating">
                            @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" value="{{ $i }}" id="{{ $i }}"><label
                                for="{{ $i }}">☆</label>
                            @endfor
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="ulasan">Ulasan</label>
                        <textarea name="ulasan" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn custom-btn custom-border-btn smoothscroll">Kirim
                            Ulasan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>