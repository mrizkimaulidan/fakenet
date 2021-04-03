@extends('layouts.app', [
'title' => 'Halaman Laporan Transaksi'
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
            </div>
        </div>
    </div>
</div>
@endsection

@push('modal')
<div class="modal fade" id="recapModal" tabindex="-1" aria-labelledby="recapLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recapLabel">Rekapitulasi Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="year">Masukkan tahun</label>
                    <input type="number" class="form-control" name="year" id="year" placeholder="Masukkan tahun">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="export">Rekap Excel</button>
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $(function() {
        $('#recapModal .modal-footer #export').click(function(e) {
            e.preventDefault();
            
            let url = "{{ route('laporan.export.year', 'year') }}";
            let year = $('#year').val();

            url = url.replace('year', year);
            window.open(url, '_blank');
        })
    });
</script>
@endpush