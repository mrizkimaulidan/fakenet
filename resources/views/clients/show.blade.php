@extends('layouts.app', [
'title' => 'Halaman Detail Klien'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card px-3 py-3">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="name">Nama Klien</label>
                        <input type="text" class="form-control" value="{{ $client->name }}" disabled>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="ip_address">Alamat IP</label>
                        <input type="text" class="form-control" value="{{ $client->ip_address }}" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="internet_package_name">Nama Paket Internet</label>
                            <input type="text" class="form-control" value="{{ $client->internet_package->name }}"
                                disabled>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="internet_package_price">Harga Paket Internet</label>
                            <input type="text" class="form-control"
                                value="{{ indonesian_currency($client->internet_package->price) }}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Nomor Handphone</label>
                        <input type="text" class="form-control" value="{{ $client->phone_number }}" disabled>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="house_image">Foto Rumah</label>
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset($client->house_image) }}" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Alamat Lengkap</label>
                        <textarea class="form-control" rows="5" disabled>{{ $client->address }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <a href="{{ route('klien.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('klien.edit', $client->id) }}" class="btn btn-success">Ubah</a>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('js')
    @include('clients.script')
    @endpush