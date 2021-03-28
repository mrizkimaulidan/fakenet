<!-- Modal -->
<div class="modal fade" id="addTransactionModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransactionModalLabel">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Klien</label>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="day">Hari</label>
                                <input type="number" class="form-control" name="day" id="day" value="{{ date('d') }}"
                                    placeholder="Masukkan angka hari">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="month">Bulan</label>
                                <select class="form-control" name="month" id="month">
                                    <option selected>--Pilih Bulan--</option>
                                    @foreach ($months as $key => $month)
                                    <option value="{{ $key + 1 }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Total Bayar</label>
                                <input type="number" class="form-control" name="amount" id="amount"
                                    placeholder="Masukkan total bayar">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option selected>--Pilih Status--</option>
                                    <option value="1">Lunas</option>
                                    <option value="0">Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>