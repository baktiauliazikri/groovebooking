<!-- resources/views/pelanggan/dashboard/review.blade.php -->

<div class="container">
    <div class="row">
        <!-- Row pertama untuk form -->
        <div class="col-lg-6 col-12">
            <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_pengunjung">Nama Pengunjung</label>
                    <input type="text" name="nama_pengunjung" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="rating">Rating</label>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ulasan">Ulasan</label>
                    <textarea name="ulasan" rows="4" class="form-control"></textarea>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn custom-btn custom-border-btn smoothscroll">Kirim Ulasan</button>
                </div>
            </form>
        </div>

        <!-- Row kedua untuk menampilkan list review -->
        <div class="col-lg-4 col-12 ms-auto">
            <ul class="list-group" style="max-height: 300px; overflow-y: auto;">
                <!-- Loop through each review and display -->
                @foreach($reviews as $data)
                <li class="list-group-item">
                    <h5>{{ $data->nama_pengunjung }}</h5>
                </li>
                <li class="list-group-item">
                    <p>
                        Rating:
                        @for ($i = 1; $i <= 5; $i++) <i class="fas fa-star{{ $i <= $data->rating ? ' filled' : '' }}">
                            </i>
                            @endfor
                    </p>
                </li>
                <li class="list-group-item">
                    <p>{{ $data->ulasan }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>