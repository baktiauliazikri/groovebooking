@extends('admin.layout.master')

@section('menuDataService', 'active')
@section('content')
<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Service
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Service</label>
                        <input type="text" name="nama_service"
                            class="form-control @error('nama_service') is-invalid @enderror"
                            value="{{ @old('nama_service') }}">
                        @error('nama_service')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="photo"
                            class="form-control @error('photo') is-invalid @enderror"
                            value="{{ @old('photo') }}">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="text" name="harga"
                            class="form-control @error('harga') is-invalid @enderror"
                            value="{{ @old('harga') }}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" rows="5"
                            class="form-control @error('deskripsi') is-invalid @enderror">{{ @old('deskripsi') }}</textarea>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>
                    <a href="{{ route('data-service.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection