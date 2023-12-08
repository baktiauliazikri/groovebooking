<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Bulanan</title>

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
    </style>
</head>

<body>
    <div class="header">
        <img src="../images/logo.png" alt="Logo Perusahaan" class="logo">
        <div class="company-info">Groove Baberhouse</div>
        <div class="company-slogan">"Consult your Haircut
            Sculpting Handsome Excellence Elevate Your Handsomeness Here!"</div>
        <div class="company-address">Jalan Soekarno Hatta No 23, Mandiangin, Kecamatan Guguk Panjang, Kota
            Bukittinggi, Sumatera Barat 26137</div>
    </div>
    <div class="separator"></div>

    <table class=" table table-bordered">
        <p style="font-weight: bold">Bulan: {{ carbon\carbon::parse($bulan)->isoFormat('MMMM') }}</p>
        <thead>

            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Service</th>
                <th>Barberman</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->created_at->isoFormat('MMMM') }}</td>
                <td>{{ $booking->pelanggan->name }}</td>
                <td>{{ $booking->service->nama_service }}</td>
                <td>{{ $booking->barberman->name }}</td>
                <td>Rp {{ number_format($booking->service->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right; font-weight: bold;">Total Pemasukan:</td>
                <td>Rp {{ number_format($total_pemasukan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>
