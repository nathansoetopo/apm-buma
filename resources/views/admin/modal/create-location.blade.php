<div class="modal fade" tabindex="-1" role="dialog" id="modalAddData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/add-pegawai')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="alert alert-warning">
                                <b>Note!</b> Isi Semua Data
                            </div>
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Email Pegawai</label>
                                <input type="email" class="form-control" placeholder="Masukkan Email Pegawai"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor Induk Kependudukan</label>
                                <input type="number" class="form-control" placeholder="Masukkan NIK" name="nik"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
