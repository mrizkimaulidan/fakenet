@extends('layouts.app', [
'title' => 'Halaman Transaksi'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                    data-target="#addTransactionModal">
                    Tambah Data
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Klien</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Admin Pencatat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->clients->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($transaction->date)) }}</td>
                                <td>{{ get_is_paid_status($transaction->is_paid) }}</td>
                                <td>{{ $transaction->users->name }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fas fa-fw fa-search"></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm edit-button"
                                            data-toggle="modal" data-target="#editTransactionModal"
                                            data-id="{{ $transaction->id }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
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
@include('transactions.script')
@endpush

@push('modal')
@include('transactions.modal.create')
@include('transactions.modal.edit')
@endpush