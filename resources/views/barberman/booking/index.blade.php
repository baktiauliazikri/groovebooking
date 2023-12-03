@extends('admin.layout.master')

@section('menuBookingBarberman', 'active')
@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Booking
            </div>
            <div class="card-body">
                <a href="{{route('/cetak-booking-barberman')}}" target="_blank" class="btn btn-primary"><i class="fas fa print"></i>Cetak Data</a>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Service</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->pelanggan -> name}}</td>
                            <td>{{ $data->service -> nama_service }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->jam }}</td>
                            <td>
                                @if ($data->status == 'Selesai')
                                <span class="badge badge-success">
                                    {{ $data->status }}
                                </span>
                                @else
                                <span class="badge badge-warning">
                                    {{ $data->status }}
                                </span>
                                @endif
                            </td>
                            <td>
                                @if ($data->status_orders == 'Selesai')
                                @else
                                <form action="{{ route('booking-barberman.update', $data->id) }}" method="POST"
                                    class="d-inline">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success mt-2"
                                        onclick="return confirm('Anda yakin untuk selesaikan pesan ini ?')">
                                        <i class="fas fa-check"></i>
                                        Selesai
                                    </button>
                                </form>

                                @endif
                                <form action="{{ route('data-booking.destroy', $data->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm my-2"
                                        onclick="return confirm('Anda yakin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                        Hapus
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