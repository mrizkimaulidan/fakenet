<!-- Modal -->
<div class="modal fade" id="detailTransactionModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="detailTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailTransactionModalLabel">Detail Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client_id">Klien</label>
                                <input type="text" class="form-control" id="client_id" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client_id">Alamat IP</label>
                                <input type="text" class="form-control" id="client_ip" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="internet_package_name">Nama Paket Internet</label>
                                <input type="text" class="form-control" id="internet_package_name" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="internet_package_price">Harga Paket Internet</label>
                                <input type="text" class="form-control" id="internet_package_price" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user_id">Admin Pencatat</label>
                                <input type="text" class="form-control" id="user_id" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="day">Hari</label>
                                <input type="text" class="form-control" id="day" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">Bulan</label>
                                <input type="text" class="form-control" id="month" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">Tahun</label>
                                <input type="text" class="form-control" id="year" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="amount">Total Bayar</label>
                                <input type="text" class="form-control" id="amount" disabled>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>