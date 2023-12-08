<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Booking</title>
    <link href="{{ asset('/fe/css/templatemo-pod-talk.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/fe/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fe/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/fe/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fe/css/owl.theme.default.min.css') }}">
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
        .company-slogan {
            font-size: 16px;
            font-weight: bold;
        }

        .company-address {
            font-size: 14px;
        }

        /* Style untuk garis pemisah */
        .separator {
            border-top: 2px solid #ccc;
            margin: 20px 0;
        }

        .logo {
            width: 160px;
            /* Ubah lebar logo sesuai kebutuhan */
            height: auto;
            /* Tinggi akan disesuaikan agar proporsional dengan lebar */
        }

        .alert {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="../images/logo.png" alt="Logo Perusahaan" class="logo">
        <div class="company-info">Groove Baberhouse</div>
        <div class="company-slogan">"Consult your Haircut
            Sculpting Handsome Excellence Elevate Your Handsomeness Here!"</div>
        <div class="company-address">Jalan Soekarno Hatta No 23, Mandiangin Pakan Kurai, Kecamatan Guguk Panjang, Kota
            Bukittinggi, Sumatera Barat 26137</div>
    </div>
    <div class="separator"></div>
    <div class="card">
        <div class="company-info">
            <h2 style="text-align: center">Data Booking Barberman </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Service</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
                @forelse ($bookings as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->pelanggan->name }}</td>
                    <td>{{ $data->service->nama_service }}</td>
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
                @empty
                <tr>
                    <td colspan="6" class="alert alert-info">Tidak ada data booking pada periode yang diminta.</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>