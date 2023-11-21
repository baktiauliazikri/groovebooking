@extends('admin.layout.master')

@section('menuDataBarberman', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-barberman.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Barberman
                </div>
                <div class="card-body">
                    <!-- Nama Pelanggan -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Nama Barberman:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ @old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ @old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Foto Profil -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="foto_profile" class="form-label">Foto Profil:</label>
                            <input type="file" class="form-control @error('foto_profile') is-invalid @enderror"
                                id="foto_profile" name="foto_profile" accept="image/*">
                            @error('foto_profile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" required>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="social" class="form-label">Social:</label>
                            <input type="text" class="form-control" id="social" name="social">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection