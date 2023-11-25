@extends('pelanggan.layout.app')

@section('menuProfile', 'active')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Profile</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        @if (Auth()->user()->level == 'Pelanggan' &&
                                        Auth()->user()->foto_profile)
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
                                    <th class="text-center">Social Media</th>
                                    <td class="text-left">{{ Auth()->user()->social }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Update Profile</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('pelanggan-profile.update', Auth()->user()) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">

                                <!-- Nama -->
                                <div class="col">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth()->user()->name }}" required>
                                </div>

                                <!-- Email -->
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth()->user()->email }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone"
                                        value="{{ Auth()->user()->phone }}" required>
                                </div>
                                <div class="col">
                                    <label for="social" class="form-label">Social Media</label>
                                    <input type="social" class="form-control" id="social" name="social"
                                        value="{{ Auth()->user()->social }}" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <!-- Password -->
                                <div class="col">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <!-- Konfirmasi Password -->
                                <div class="col">
                                    <label for="password_confirmation" class="form-label">Konfirmasi
                                        Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation">
                                </div>
                            </div>

                            <!-- Foto Profile -->
                            <div class="mb-3">
                                <label for="foto_profile" class="form-label">Foto Profile</label>
                                <input type="file" class="form-control" id="foto_profile" name="foto_profile">
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="alamat" class="form-control" id="alamat" name="alamat"
                                    value="{{ Auth()->user()->alamat }}" required>
                            </div>

                            <div class="float-end">
                                <button type="submit" class="btn btn-warning ">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection