<!-- Modal -->
<div class="modal fade" id="addInternetPackageModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="addInternetPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInternetPackageModalLabel">Tambah Paket Internet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('paket-internet.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}" placeholder="Masukkan nama paket">
                        @error('name')
                        <small class="d-block font-weight-bold invalid-feedback">{{ $errors->first('name') }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" value="{{ old('price') }}" placeholder="Masukkan harga paket">
                        @error('price')
                        <small class="d-block font-weight-bold invalid-feedback">{{ $errors->first('price') }}</small>
                        @enderror
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