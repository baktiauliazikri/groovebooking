<div class="row justify-content-center">
    @foreach ($barberman as $data)
    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
        <div class="custom-block custom-block-overlay">
            <a href="detail-page.html" class="custom-block-image-wrap">
                <img src="{{ asset('/storage/foto_profile/barberman/' . $data->foto_profile) }}"
                    class="custom-block-image img-fluid" alt="">
            </a>

            <div class="custom-block-info custom-block-overlay-info text-center">
                <h5 class="mb-1">
                    {{ $data->name }}
                </h5>
                <a href="https://www.instagram.com/{{ $data->social }}" target="_blank" class="badge mb-0">
                    <i class="bi bi-instagram">{{ $data->social }}</i>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>