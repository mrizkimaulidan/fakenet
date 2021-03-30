@extends('layouts.app', [
'title' => 'Halaman Klien'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('components.alert-message')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Klien</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('klien.create') }}" class="btn btn-primary float-right mb-3">
                    Tambah Data
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Klien</th>
                                <th>Paket Internet</th>
                                <th>Nomor Handphone</th>
                                <th>Alamat IP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $client->name }}</td>
                                <td>
                                    <span class="badge badge-pill badge-primary px-2 py-2 w-100">
                                        {{ $client->internet_package->name }} -
                                        {{ indonesian_currency($client->internet_package->price) }}
                                    </span>
                                </td>
                                <td>{{ $client->phone_number }}</td>
                                <td>
                                    <span class="badge badge-pill badge-secondary px-2 py-2 w-100">
                                        {{ $client->ip_address }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('klien.show', $client->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-fw fa-search"></i>
                                        </a>
                                        <a href="{{ route('klien.edit', $client->id) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <form action="{{ route('klien.destroy', $client->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-button">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection