@extends('layouts.app', [
'title' => 'Halaman Administrator Aplikasi'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('components.alert-message')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Administrator Aplikasi</h6>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                    data-target="#addAdministratorApplicationModal">
                    Tambah Data
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th>Tanggal Ditambahkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($administrator_applications as $administrator_application)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $administrator_application->name }}</td>
                                <td>{{ $administrator_application->position->name }}</td>
                                <td>{{ $administrator_application->email }}</td>
                                <td>{{ $administrator_application->created_at->format('d-m-Y H:i') }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-success btn-sm edit-button"
                                            data-toggle="modal" data-target="#editAdministratorApplicationModal"
                                            data-id="{{ $administrator_application->id }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <form
                                            action="{{ route('administrator-aplikasi.destroy', $administrator_application->id) }}"
                                            method="POST">
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

@push('js')
@include('administrator_applications.script')
@endpush

@push('modal')
@include('administrator_applications.modal.create')
@include('administrator_applications.modal.edit')
@endpush