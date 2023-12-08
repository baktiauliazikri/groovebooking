@extends('admin.layout.master')

@section('menuImageSlider', 'active')
@section('content')
<div class="row">
    <div class="col-lg">
        <form action="{{ route('image-slider.update', $imageSlider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    Edit Image Slider
                </div>
                <div class="card-body">
                    {{-- <div class="mb-3">
                        <label>Current Image</label>
                        <img src="{{ asset('storage/' . $imageSlider->model) }}" alt="Current Image"
                            class="img-thumbnail">
                    </div> --}}
                    <div class="mb-3">

                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $imageSlider->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label>New Image (optional)</label>
                        <input type="file" name="model" class="form-control @error('model') is-invalid @enderror">
                        @error('model')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="desc" rows="5"
                            class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $imageSlider->desc) }}</textarea>
                        @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Update Data
                    </button>
                    <a href="{{ route('image-slider.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection