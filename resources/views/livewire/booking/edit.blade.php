<div class="">
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" wire:model='tanggal'
            class="form-control @error('tanggal') is-invalid @enderror"
            value="{{ $booking->tanggal }}" min="{{ date('Y-m-d')}}">
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

            @for ($i = 10; $i < 24; $i++) <input type="radio" class="btn-check" name="jam"
                id="btn-check-outlined-{{ $i }}" value="{{ $i }}.00" {{ $i==$booking->jam ?
                'checked' :
                '' }} {{ $i < date('H') ? 'disabled' : '' }}>
                    <label class="btn btn-outline-primary" for="btn-check-outlined-{{ $i }}">{{ $i
                        }}.00</label>
                    @endfor
        </div>
    </div>
</div>