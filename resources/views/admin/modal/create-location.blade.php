<div class="modal fade" tabindex="-1" role="dialog" id="modalAddData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/data-lokasi')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="alert alert-warning">
                                <b>Note!</b> Isi Semua Data
                            </div>
                            <div class="form-group">
                                <label>Nama Lokasi</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Lokasi" name="name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" placeholder="Masukkan Data Latitude"
                                    name="latitude" required>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" placeholder="Masukkan Data Longitude"
                                    name="longitude" required>
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
