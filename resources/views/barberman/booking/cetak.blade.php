<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Booking</title>
    <style>
        .header {
            color: black;
            padding: 20px;
            text-align: center;
        }

        /* Style untuk informasi perusahaan */
        .company-info {
            font-weight: bold;
            font-size: 25px;
            margin-top: 10px;
        }

        /* Style untuk alamat perusahaan */
        .company-address {
            font-size: 14px;
        }

        /* Style untuk garis pemisah */
        .separator {
            border-top: 2px solid #ccc;
            margin: 20px 0;
        }

        /* Style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* Style untuk header kolom tabel */
        th {
            background-color: gainsboro;
            color: black;
            font-weight: bold;
            padding: 10px;
            text-align: left;
            border: 1px solid white
        }

        /* Style untuk baris tabel */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Style untuk sel dalam tabel */
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        /* Style untuk sel dengan data harga */
        td:nth-child(4) {
            text-align: right;
        }

        /* Style untuk sel dengan tanggal pesanan */
        td:nth-child(5) {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo Perusahaan" class="logo" width="100">
        <div class="company-info">Groove Barberhouse</div>
        <div class="company-address">Jl Soekarno-Hatta, Kec. Mandiangin Koto Selayan, Kota Bukittinggi, Sumatera Barat
        </div>
    </div>

    <div class="separator"></div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Service</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
        </tr>
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
        </tr>
        @endforeach
    </table>
</body>

</html>