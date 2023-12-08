<div class="owl-carousel owl-theme">
    @foreach ($imageSlider as $data)
    <div class="owl-carousel-info-wrap item">
        <img src="{{ asset('storage/' .$data->model) }}" class="owl-carousel-image img-fluid" alt="{{ $data->name }}">

        <div class="owl-carousel-info">
            <h4 class="mb-2 uppercase">
                {{ $data->name }}
                <img src="{{ asset('fe/images/gunting.png') }}" class="owl-carousel-verified-image img-fluid" alt="">
            </h4>

            <a href="{{ url('/detail-model', $data->id) }}" class="badge">Detail</a>
        </div>
    </div>
    @endforeach
</div>