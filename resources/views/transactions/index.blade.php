@extends('layouts.app', [
'title' => 'Halaman Tagihan'
])

@section('content')
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Keuntungan (Bulan Ini)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $amount_this_month }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Keuntungan (Tahun Ini)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $amount_this_year }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('components.alert-message')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
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
                                <th>Penagih</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->client->name }}</td>
                                <td>{{ "$transaction->day-$transaction->month-$transaction->year" }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-sm detail-button"
                                            data-toggle="modal" data-target="#detailTransactionModal"
                                            data-id="{{ $transaction->id }}">
                                            <i class="fas fa-fw fa-search"></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm edit-button"
                                            data-toggle="modal" data-target="#editTransactionModal"
                                            data-id="{{ $transaction->id }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <form action="{{ route('tagihan.destroy', $transaction->id) }}" method="POST">
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
@include('transactions.script')
@endpush

@push('modal')
@include('transactions.modal.create')
@include('transactions.modal.show')
@include('transactions.modal.edit')
@endpush