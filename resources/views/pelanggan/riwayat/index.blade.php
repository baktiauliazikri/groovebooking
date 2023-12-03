@extends('pelanggan.layout.app')

@section('menuMyBooking', 'active')
@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row mb-3">

            <h1 class="text-center text-white">My Booking</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    @forelse ($bookings as $booking)
                    <div class="col-md-4 mb-4">
                        <div class="card border-2">
                            <div class="card-body text-center ">
                                <table class="table">
                                    <thead>
                                        <tr style="display:none">
                                            <th scope="col" style="width:50px;">title</th>
                                            <th scope="col">:</th>
                                            <th scope="col">input</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row text-left">Service</th>
                                            <td>:</td>
                                            <td>{{ $booking->service->nama_service }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Barberman</th>
                                            <td>:</td>
                                            <td>{{ $booking->barberman->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Tanggal</th>
                                            <td>:</td>
                                            <td>{{ $booking->tanggal }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Jam</th>
                                            <td>:</td>
                                            <td>{{ $booking->jam }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Status</th>
                                            <td>:</td>
                                            <td>
                                                <span class="badge 
                                                    @if($booking->status == 'Selesai')
                                                        badge-warning
                                                    @elseif($booking->status == 'Dibatalkan')
                                                        badge-danger
                                                    @else
                                                        badge-success
                                                    @endif">
                                                    {{ $booking->status }}
                                                </span>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <div class="center" style="text-align:center;">
                                                    <a href="{{route('my-booking.show', $booking->id)}}">
                                                        Lihat Detail
                                                    </a>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>


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
