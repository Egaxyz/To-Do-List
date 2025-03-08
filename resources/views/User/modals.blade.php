<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ url('/user') }}">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" autocomplete="off" id="name" name="name"
                            required>
                    </div>
                    <div class="form-group row">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" autocomplete="off" id="email" name="email"
                            required>
                    </div>
                    <div class="form-group row" id="passwordField">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" autocomplete="off" id="password" name="password"
                            required>
                    </div>
                    <div class="form-group row">
                        <label for="kontak">Kontak</label>
                        <input type="number" class="form-control" autocomplete="off" id="kontak" name="kontak"
                            required>
                    </div>
                    <div class="form-group row">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="pria" selected>Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="status_akun">Status Akun</label>
                        <select id="status_akun" name="status_akun" class="form-control">
                            <option value="aktif" selected>Aktif</option>
                            <option value="nonaktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
