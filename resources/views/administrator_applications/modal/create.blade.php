<!-- Modal -->
<div class="modal fade" id="addAdministratorApplicationModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="addAdministratorApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdministratorApplicationModalLabel">Tambah Administrator Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('administrator-aplikasi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama">
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Masukkan alamat email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Ulangi Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation" placeholder="Ulangi password">
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