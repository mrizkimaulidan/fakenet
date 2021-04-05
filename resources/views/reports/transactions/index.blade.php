@extends('layouts.app', [
'title' => 'Halaman Laporan Tagihan'
])

@section('content')

<div class="row my-2">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Laporan Tagihan</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#recapModal">
                    Rekapitulasi Pendapatan
                </button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#listOfDues">
                    Daftar Iuran
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modal')
@include('reports.transactions.modal.recap')
@include('reports.transactions.modal.list_of_dues')
@endpush

@push('js')
@include('reports.transactions.script')
@endpush