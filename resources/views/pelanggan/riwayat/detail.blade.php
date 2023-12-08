<!-- resources/views/pelanggan/riwayat/detail.blade.php -->

@extends('pelanggan.layout.app')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row mb-3">
            <h1 class="text-center text-white">Detail Booking</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-2">
                    <div class="card-body text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row text-left">Service</th>
                                    <td>{{ $booking->service->nama_service }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Harga</th>
                                    <td>Rp {{number_format($booking->service->harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Barberman</th>
                                    <td>{{ $booking->barberman->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Tanggal</th>
                                    <td>{{ $booking->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Jam</th>
                                    <td>{{ $booking->jam }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Status</th>
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
                            </tbody>
                        </table>
                        <div class="float-end" style="text-align:center;">
                            <form action="{{ route('my-booking.destroy', $booking->id) }}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger my-2"
                                    onclick="return confirm('Anda yakin cancel booking ini?')" @if($booking->status ==
                                    'Selesai' || $booking->status == 'Dibatalkan') disabled @endif>
                                    <i class="fas fa-trash">Cancel</i>
                                </button>
                            </form>
                            <a href="{{ route('booking.index') }}" class="btn btn-primary">Order More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
