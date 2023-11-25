@extends('pelanggan.layout.app')

@section('content')
    

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <div id="step1" class="card" style="display: block;">
                        <div class="card-header">
                            {{-- <h1>Booking Your Service</h1> --}}
                            <div class="card-body">
                                {{--
                                <livewire:bookingpelanggan.create /> --}}
                                @livewire('bookingpelanggan.create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection