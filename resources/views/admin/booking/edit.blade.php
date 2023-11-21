@extends('admin.layout.master')

@section('menuDataBooking', 'active')
@section('content')
<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-booking.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Tambahkan metode PUT untuk formulir update -->

            <div class="card">
                <div class="card-header">
                    Edit Data Booking
                </div>
                <div class="card-body">

                    <!-- Tambahkan hidden input untuk menyimpan ID -->
                    <input type="hidden" name="id" value="{{ $booking->id }}">

                    <div class="mb-3">
                        <label class="form-label">Pelanggan</label>
                        <select class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                            <option value="">Pilih Pelanggan</option>
                            @foreach($pelanggan as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $booking->pelanggan_id ? 'selected' : '' }}>
                                {{ $data->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nama Service</label>
                        <select class="form-control" id="service_id" name="service_id">
                            <option value="">Pilih Service</option>
                            @foreach($service as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $booking->service_id ? 'selected' : '' }}>
                                {{ $data->nama_service }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Barberman</label>
                        <select class="form-control" id="barberman_id" name="barberman_id">
                            <option value="">Pilih Barberman</option>
                            @foreach($barberman as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $booking->barberman_id ? 'selected' : '' }}>
                                {{ $data->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

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

                                @for ($i = 10; $i < 24; $i++) 
                                <input type="radio" class="btn-check" name="jam"
                                    id="btn-check-outlined-{{ $i }}" value="{{ $i }}.00" {{ $i==$booking->jam ?
                                    'checked' :
                                    '' }} >
                                        <label class="btn btn-outline-primary" for="btn-check-outlined-{{ $i }}">{{ $i
                                            }}.00</label>
                                        @endfor
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="booking" {{ $booking->status == 'booking' ? 'selected' : '' }}>Booking
                            </option>
                            <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai
                            </option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('data-booking.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection