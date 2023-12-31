@extends('admin.layout.master')

@section('menuDataPelanggan', 'active')
@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Pelanggan
            </div>
            <div class="card-body">
                <a href="{{ route('data-pelanggan.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Pelanggan
                </a>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Foto</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Social</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td><img src="{{ asset('/storage/foto_profile/pelanggan/' .$data->foto_profile) }}" alt="gambar" class="img-fluid"
                                width="80"></td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->social }}</td>
                            {{-- <td>{{ $data->ulasan }}</td> --}}
                            <td>
                                <a href="{{ route('data-pelanggan.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('data-pelanggan.destroy', $data->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
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
@endsection