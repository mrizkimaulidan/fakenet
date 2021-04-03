@extends('layouts.app', [
'title' => 'Halaman Laporan Transaksi'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card py-2 px-2">
            <form action="" method="GET">
                <label for="">Filter transaksi berdasarkan bulan dan tahun</label>
                <div class="input-group">
                    <select name="month" id="month" class="form-control">
                        <option selected>Pilih bulan..</option>
                        @foreach (range(1, 31) as $day)
                        <option value="{{ sprintf('%02d', $day) }}">{{ sprintf('%02d', $day) }}</option>
                        @endforeach
                    </select>

                    <input type="number" name="year" id="year" class="form-control" placeholder="Masukkan tahun">

                    <button type="submit" class="btn btn-primary mx-1">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Laporan Tagihan</h6>
            </div>
            <div class="card-body">
                <button class="btn btn-primary float-right mb-3">Export Excel</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Klien</th>
                                <th>Tanggal</th>
                                <th>Penagih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection