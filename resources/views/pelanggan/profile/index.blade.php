@extends('pelanggan.layout.master')

@section('menuProfile', 'active')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mx-auto">
                    <div class="card-body">
                        <div class="user-menu">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            @if (Auth()->user()->level == 'Pelanggan' && Auth()->user()->foto_profile)
                                            <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                                class="img-circle elevation-2" alt="User Image"
                                                style="width: 90px; height: 90px;">
                                            @else
                                            <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2"
                                                alt="User Image" style="width: 90px; height: 90px;"
                                                onerror="console.error('Gagal memuat gambar.');">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <td class="text-left">{{ Auth()->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Email</th>
                                        <td class="text-left">{{ Auth()->user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Phone</th>
                                        <td class="text-left">{{ Auth()->user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Alamat</th>
                                        <td class="text-left">{{ Auth()->user()->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Social</th>
                                        <td class="text-left">{{ Auth()->user()->social }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection