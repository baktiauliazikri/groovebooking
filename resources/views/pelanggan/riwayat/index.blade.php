@extends('pelanggan.layout.app')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    @forelse ($bookings as $booking)
                    <div class="col-md-4 mb-4">
                        <div class="card border-2 bg-success"> 
                            <div class="card-body text-center ">
                                <p class="card-title text-dark"><strong>{{ $booking->service->nama_service }}</strong></p>
                                <p class="card-text text-dark"><strong>Barberman: {{ $booking->barberman->name }}</strong></p>
                                <p class="card-text text-dark"><strong>Tanggal: {{ $booking->tanggal }}</strong></p>
                                <p class="card-text text-dark"><strong>Jam: {{ $booking->jam }}</strong></p>
                                <p class="card-text text-dark"><strong>Status: {{ $booking->status }}</strong></p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <p>Tidak ada riwayat booking.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection