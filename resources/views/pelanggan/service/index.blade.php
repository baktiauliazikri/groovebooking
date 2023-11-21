@foreach ($services as $data)
<div class="col-lg-4 col-12 mb-4 mb-lg-0">
    {{-- <div class="custom-block d-flex"> --}}
        <div class="custom-block custom-block-overlay">
            {{-- <div class=""> --}}
                <div class="custom-block-icon-wrap">
                    <div class="section-overlay"></div>
                    <div class="custom-block-image-wrap">
                        <a href="detail-page.html">
                            <img src="{{ asset('storage/' . $data->photo) }}" class="custom-block-image img-fluid"
                                alt="" style="width: 300px; height: 300px;">
                        </a>
                    </div>

                </div>
                <div class="custom-block-info">
                    <h5 class="mb-2">
                        {{ $data->nama_service }}
                    </h5>
                    
                    <div class="profile-block d-flex">
                        <p>
                            <strong>{{ $data->harga }}</strong>
                        </p>
                    </div>
                    
                    <p class="mb-0">{{ $data->deskripsi }}</p>
                </div>
            {{-- </div> --}}
        </div>
    {{-- </div> --}}
</div>
@endforeach