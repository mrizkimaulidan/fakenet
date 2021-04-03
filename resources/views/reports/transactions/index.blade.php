@extends('layouts.app', [
'title' => 'Halaman Laporan Transaksi'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Bulan Ini</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Klien</th>
                                <th>Tanggal</th>
                                <th>Total Bayar</th>
                                <th>Penagih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions_this_month as $transaction_this_month)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction_this_month->client->name }}</td>
                                <td>
                                    {{ $transaction_this_month->day }}-{{ $transaction_this_month->month }}-{{ $transaction_this_month->year }}
                                </td>
                                <td>{{ indonesian_currency($transaction_this_month->amount) }}</td>
                                <td>{{ $transaction_this_month->user->name }}</td>
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