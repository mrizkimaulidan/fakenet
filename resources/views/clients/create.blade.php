@extends('layouts.app', [
'title' => 'Halaman Tambah Klien'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card px-3 py-3">
            <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="name">Nama Klien</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Masukkan nama klien" autofocus>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="internet_package_id">Paket Internet</label>
                            <select class="form-control" name="internet_package_id" id="internet_package_id">
                                <option selected>Pilih..</option>
                                @foreach ($internet_packages as $internet_package)
                                <option value="{{ $internet_package->id }}">{{ $internet_package->name }} -
                                    {{ indonesian_currency($internet_package->price) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="ip_address">Alamat IP</label>
                            <input type="text" class="form-control" name="ip_address" id="ip_address"
                                placeholder="Masukkan alamat IP">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Nomor Handphone</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                placeholder="Masukkan nomor handphone">
                        </div>

                        <div class="form-group">
                            <label for="house_image">Foto Rumah</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="house_image" id="house_image">
                                <label class="custom-file-label" for="customFile" id="label_house_image">Pilih
                                    Gambar</label>
                            </div>
                            <small class="text-muted">*Pastikan file berekstensi jpg/jpeg/png</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <img src="https://lh3.googleusercontent.com/proxy/Ussg1OW-ZB6K2xj4gK31oDfofjDtp7st_GTIye_iRlwUyBUtLF0S1kL7-UUe_EAVGDJHLr2UUirzewrfALK3ZtjQY57e7yNj5XsDelHaxReR_enFp5fHvXBGkxps1iH2DPMt5ePkNxP5YP1fwMtkAH2e3UwXQQs"
                                class="img-thumbnail" id="image_preview">
                            <input type="hidden"
                                src="https://lh3.googleusercontent.com/proxy/Ussg1OW-ZB6K2xj4gK31oDfofjDtp7st_GTIye_iRlwUyBUtLF0S1kL7-UUe_EAVGDJHLr2UUirzewrfALK3ZtjQY57e7yNj5XsDelHaxReR_enFp5fHvXBGkxps1iH2DPMt5ePkNxP5YP1fwMtkAH2e3UwXQQs"
                                id="old_image_preview">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <textarea class="form-control" name="address" id="address" rows="3"
                                placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                    </div>
                </div>

                <a href="{{ route('klien.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
@include('clients.script')
@endpush