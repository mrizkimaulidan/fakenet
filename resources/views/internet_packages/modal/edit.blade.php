<!-- Modal -->
<div class="modal fade" id="editInternetPackageModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editInternetPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInternetPackageModalLabel">Ubah Paket Internet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama paket">
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" name="price" id="price"
                            placeholder="Masukkan harga paket">
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