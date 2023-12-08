<!-- resources/views/pelanggan/dashboard/review.blade.php -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="row">
                @foreach($reviews->take(6) as $data)
                <div class="col-lg-4 col-12 mb-3 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">{{ $data->created_at->format('d M Y') }}</div>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>: </td>
                                    <td>  <strong>{{ $data->nama_pengunjung }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Rating</td>
                                    <td>: </td>
                                    <td>  
                                        <span class="star-rating">{!! str_repeat('&#9733;', $data->rating) !!}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ulasan</td>
                                    <td>: </td>
                                    <td>  <strong>{{ $data->ulasan }}</strong></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>