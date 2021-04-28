@extends('layouts.app', [
'title' => 'Halaman Dashboard'
])

@section('content')
<div class="row">

    <!-- Start of statistics -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Klien</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 counter">{{ $total_client }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
                <div class="justify-content-center pt-2">
                    <h4 class="small font-weight-bold py-1">Klien baru pada hari ini : <span
                            class="float-right text-{{ $count_new_client_this_day > 0 ? 'success' : 'danger' }} counter">{{ $count_new_client_this_day }}</span>
                    </h4>
                    <h4 class="small font-weight-bold py-1">Klien baru pada bulan ini : <span
                            class="float-right text-{{ $count_new_client_this_month > 0 ? 'success' : 'danger' }} counter">{{ $count_new_client_this_month }}</span>
                    </h4>
                    <h4 class="small font-weight-bold py-1">Klien baru pada tahun ini : <span
                            class="float-right text-{{ $count_new_client_this_year > 0 ? 'success' : 'danger' }} counter">{{ $count_new_client_this_year }}</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Paket Internet</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 counter">
                            {{ $total_internet_package }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
                <div class="justify-content-center pt-2">
                    @foreach ($internet_packages as $internet_package)
                    <h4 class="small font-weight-bold py-1">{{ $internet_package->name }} : <span
                            class="float-right">{{ indonesian_currency($internet_package->price) }}</span>
                    </h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Transaksi Bulan Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sum_this_month }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Transaksi Tahun Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sum_this_year }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <!-- End of statistics -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    Klien Yang Belum Ditagih
                </h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 pb-3">
                        <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                            data-target="#thisMonthModal">
                            Bulan Ini
                        </button>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                            data-target="#subMonthModal">
                            Bulan Kemarin
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Statistik Transaksi Tahun Ini ({{ date('Y') }})
                </h6>
                <div class="btn btn-sm btn-success" id="refresh-chart"><i class="fas fa-fw fa-recycle"></i></div>
            </div>
            <div class="card-body">
                <div class="chart-Area">
                    <canvas id="yearChart" height="100vh"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    5 Transaksi Terakhir
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Klien</th>
                                <th>Paket</th>
                                <th>Tanggal</th>
                                <th>Total Bayar</th>
                                <th>Penagih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions_by_limit as $transaction_by_limit)
                            <tr>
                                <td>{{ $transaction_by_limit->client->name }}</td>
                                <td>
                                    <span
                                        class="badge badge-primary px-2 py-2 w-100">{{ $transaction_by_limit->client->internet_package->name }}
                                        -
                                        {{ indonesian_currency($transaction_by_limit->client->internet_package->price) }}</span>
                                </td>
                                <td>{{ "$transaction_by_limit->day-$transaction_by_limit->month-$transaction_by_limit->year" }}
                                </td>
                                <td>{{ indonesian_currency($transaction_by_limit->amount) }}</td>
                                <td>{{ $transaction_by_limit->user->name }}</td>
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

@push('modal')
@include('dashboard.modal.this_month')
@include('dashboard.modal.submonth')
@endpush

@push('js')
@include('script')
@endpush