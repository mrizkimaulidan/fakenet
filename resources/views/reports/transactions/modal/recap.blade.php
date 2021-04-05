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
                    <input type="number" class="form-control" name="year" id="year" value="{{ date('Y') }}"
                        placeholder="Masukkan tahun">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="export">Rekap Excel</button>
            </div>
        </div>
    </div>
</div>