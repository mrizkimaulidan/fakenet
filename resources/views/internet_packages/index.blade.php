@extends('layouts.app', [
'title' => 'Halaman Paket Internet'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('components.alert-message')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Paket Internet</h6>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                    data-target="#addInternetPackageModal">
                    Tambah Data
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>10MB</td>
                                <td>250000</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-success btn-sm edit-button"
                                            data-toggle="modal" data-target="#editInternetPackageModal" data-id="#">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-sweetalert">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
{{--  --}}
@endpush

@push('modal')
{{--  --}}
@endpush