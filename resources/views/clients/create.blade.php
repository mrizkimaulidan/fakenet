@extends('layouts.app', [
'title' => 'Halaman Tambah Klien'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('components.alert-message')
        <div class="card px-3 py-3">
            <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="name">Nama Klien</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                placeholder="Masukkan nama klien" autofocus>
                            @error('name')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="internet_package_id">Paket Internet</label>
                            <select class="form-control selectize" name="internet_package_id" id="internet_package_id">
                                <option selected>Pilih..</option>
                                @foreach ($internet_packages as $internet_package)
                                <option value="{{ $internet_package->id }}">{{ $internet_package->name }} -
                                    {{ indonesian_currency($internet_package->price) }}</option>
                                @endforeach
                            </select>
                            @error('internet_package_id')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('internet_package_id') }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="ip_address">Alamat IP</label>
                            <input type="text" class="form-control" name="ip_address" id="ip_address"
                                value="{{ old('ip_address') }}" placeholder="Masukkan alamat IP">
                            @error('ip_address')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('ip_address') }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Nomor Handphone</label>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ old('phone_number') }}" id="phone_number"
                                placeholder="Masukkan nomor handphone">
                            @error('phone_number')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('phone_number') }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="house_image">Foto Rumah</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="house_image" id="house_image">
                                <label class="custom-file-label" for="customFile" id="label_house_image">Pilih
                                    Gambar</label>
                            </div>
                            <small class="text-muted">*Pastikan file berekstensi jpg/jpeg/png</small><br />
                            @error('house_image')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('house_image') }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/no-image.jpg') }}" class="img-thumbnail" id="image_preview">
                            <input type="hidden" src="{{ asset('img/no-image.jpg') }}" id="old_image_preview">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <textarea class="form-control" name="address" id="address" rows="3"
                                placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                            @error('address')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('address') }}</small>
                            @enderror
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