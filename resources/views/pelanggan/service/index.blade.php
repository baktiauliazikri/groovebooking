@foreach ($services as $data)
<div class="col-lg-4 col-12 mb-4 mb-lg-0">
    <div class="custom-block custom-block-overlay">
        <div class="custom-block-icon-wrap">
            <div class="custom-block-image-wrap">
                <a href="{{route('detail-service.show', $data->id)}}">
                    <img src="{{ asset('storage/' . $data->photo) }}" class="custom-block-image img-fluid" alt=""
                        style="width: 300px; height: 300px;">
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach