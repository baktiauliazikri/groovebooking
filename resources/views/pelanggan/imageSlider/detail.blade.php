@extends('pelanggan.layout.master')

@section('content')
{{-- @foreach ($imageSlider as $data) --}}

<section class="hero-section">
    <div class="container">
        <div class="row mb-3">
            <h1 class="text-center text-white">Detail {{ $imageSlider->name }}</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="card">
                    <div class="row mx-4 my-4">
                        <div class="col-lg-4 col-12 text-center mb-4">
                            <img src="{{ asset('storage/' . $imageSlider->model) }}"
                                class="custom-block-image img-fluid" alt="{{ $imageSlider->name }}"
                                style="width: 300px; height: 300px; border-radius object-fit: cover;">
                            {{-- <a href="/booking" class="btn btn-primary mt-3">Book Service</a> --}}
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th style="white-space: nowrap; ">Nama Model</th>
                                            <td>{{ $imageSlider->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td style="text-align: justify;">{{ $imageSlider->desc }}</td>
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
{{-- @endforeach --}}
@endsection