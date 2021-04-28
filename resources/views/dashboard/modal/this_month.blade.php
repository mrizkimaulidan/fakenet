<div class="modal fade" id="thisMonthModal" tabindex="-1" aria-labelledby="thisMonthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thisMonthModalLabel">Bulan Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="badge badge-warning px-3 py-3 w-100">Ada {{ count($clients_who_not_paid_this_month) }}
                    orang belum membayar pada bulan ini!</span>
                <div class="row">
                    @forelse ($clients_who_not_paid_this_month as $client_who_not_paid_this_month)
                    <div class="col-lg-6">
                        <div class="list-group py-3">
                            <div class="list-group-item flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $loop->iteration }}. {{ $client_who_not_paid_this_month->name }}
                                    </h5>
                                </div>
                                <p class="mb-1">{{ $client_who_not_paid_this_month->address }}</p>
                                <small
                                    class="font-weight-bold">{{ $client_who_not_paid_this_month->phone_number }}</small>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-12 text-center">
                        <div class="font-weight-bold bg-success rounded text-white mt-3 px-2 py-2">
                            <span>Tidak ada klien yang belum ditagih pada bulan ini! <i
                                    class="fas fa-fw fa-smile"></i></span>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>