@extends('pelanggan.layout.master')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row mb-3">
            <h1 class="text-center text-white">Detail {{ $service->nama_service }}</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-4 col-12 text-center mb-4">
                            <img src="{{ asset('storage/' . $service->photo) }}" class="custom-block-image img-fluid"
                                alt="gambar_service" style="width: 300px; height: 300px;">
                            <a href="/booking" class="btn btn-primary mt-3">Book Service</a>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th style="white-space: nowrap; ">Service Name</th>
                                            <td>{{ $service->nama_service }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Price</th>
                                            <td class="text-left text-secondary">Rp {{
                                                number_format($service->harga, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td style="text-align: justify;">{{ $service->deskripsi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection