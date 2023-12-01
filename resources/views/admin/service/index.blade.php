@extends('admin.layout.master')
@section('menuDataService', 'active')

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Service
            </div>
            <div class="card-body">
                <a href="{{ route('data-service.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Service
                </a>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Service</th>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_service }}</td>
                                <td><img src="{{ asset('storage/' . $data->photo) }}" alt="gambar" class="img-fluid"
                                        width="80"></td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->harga }}</td>
                                {{-- <td>{{ $data->deskripsi }}</td> --}}
                                <td>
                                    <a href="{{ route('data-service.edit', $data->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('data-service.destroy', $data->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="text" name="oldPicture" class="form-control"
                                            value="{{ $data->photo }}" hidden>
                                        <button type="submit" class="btn btn-danger btn-sm my-2"
                                            onclick="return confirm('Anda yakin menghapus data ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection