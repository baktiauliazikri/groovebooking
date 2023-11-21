@extends('admin.layout.master')

@section('menuDataReview', 'active')

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Review
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengunjung</th>
                            <th>Rating</th>
                            <th>Ulasan</th>
                            {{-- <th>Harga</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_pengunjung }}</td>
                            <td>{{ $data->rating }}</td>
                            <td>{{ $data->ulasan }}</td>
                            <td>

                                <form action="{{ route('data-review.destroy', $data->id) }}" method="POST">
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