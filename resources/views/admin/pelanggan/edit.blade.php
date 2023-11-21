@extends('admin.layout.master')
@section('menuDataPelanggan', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    Edit Data Pelanggan
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $pelanggan->name) }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $pelanggan->email }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="foto_profile" class="form-label">Foto Profil:</label>
                            <input type="file" name="foto_profile"
                                class="form-control @error('foto_profile') is-invalid @enderror">
                            @error('foto_profile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ $pelanggan->phone }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label">New Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="social" class="form-label">Social:</label>
                            <input type="text" class="form-control @error('social') is-invalid @enderror" id="social"
                                name="social" value="{{ old('social', $pelanggan->social) }}">
                            @error('social')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </div>
</div>

@endsection