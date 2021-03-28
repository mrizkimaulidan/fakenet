<!-- Modal -->
<div class="modal fade" id="editTransactionModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTransactionModalLabel">Ubah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="client_id">Klien</label>
                                <select class="form-control" name="client_id" id="client_id">
                                    <option selected>--Pilih Klien--</option>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} - {{ $client->ip_address }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="day">Hari</label>
                                <input type="number" class="form-control" name="day" id="day"
                                    placeholder=" Masukkan angka hari">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="month">Bulan</label>
                                <select class="form-control" name="month" id="month">
                                    <option selected>--Pilih Bulan--</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">Tahun</label>
                                <input type="number" class="form-control" name="year" id="year"
                                    placeholder="Masukkan tahun">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Total Bayar</label>
                                <input type="number" class="form-control" name="amount" id="amount"
                                    placeholder="Masukkan total bayar">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_paid">Status</label>
                                <select class="form-control" name="is_paid" id="is_paid">
                                    <option selected>--Pilih Status--</option>
                                    <option value="1">Lunas</option>
                                    <option value="0">Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>