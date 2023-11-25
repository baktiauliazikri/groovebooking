<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-booking.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Booking
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Pelanggan</label>
                        <select class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                            <option value="">Pilih Pelanggan</option>
                            @foreach($pelanggan as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nama Service</label>
                        <select class="form-control" id="service_id" name="service_id">
                            <option>Pilih Service</option>
                            @foreach($service as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_service }}</option>
                            @endforeach
                        </select>
                        @error('nama_pelanggan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Barberman</label>
                        <select class="form-control" id="barberman_id" name="barberman_id">
                            <option value="">Pilih Barberman</option>
                            @foreach($barberman as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                        @error('barberman_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" wire:model='tanggal'
                            class="form-control @error('tanggal') is-invalid @enderror" value="{{ @old('tanggal') }}"
                            min="{{ date('Y-m-d')}}">
                        @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label>Jam</label>
                        <div class="col-md-6">

                            @error('jam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            {{-- {{date('Y-m-d')}} --}}
                            {{-- {{$tanggal}} --}}
                            @if ($tanggal == date('Y-m-d'))
                                @for ($i = 10 ; $i<24 ; $i++) 
                                    <input type="radio" class="btn-check" name="jam" id="btn-check-outlined-{{$i}}" value="{{$i}}.00" {{$i < date('H') ? 'disabled':''}}>
                                    <label class="btn btn-outline-primary" for="btn-check-outlined-{{$i}}">{{$i}}.00</label>
                                @endfor

                            @else
                                @for ($i = 10 ; $i<24 ; $i++) <input type="radio" class="btn-check" name="jam"
                                    id="btn-check-outlined-{{$i}}" value="{{$i}}.00">
                                    <label class="btn btn-outline-primary" for="btn-check-outlined-{{$i}}">{{$i}}.00</label>
                                @endfor
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="booking">Booking</option>
                            <option value="selesai">Selesai</option>
                        </select>

                        {{-- <input type="select" name="status"
                            class="form-control @error('status') is-invalid @enderror" value="{{ @old('status') }}">
                        --}}
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>
                    <a href="{{ route('data-booking.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
