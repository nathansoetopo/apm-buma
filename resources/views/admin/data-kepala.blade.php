<!DOCTYPE html>
<html lang="en">

<head>
    @include('stisla.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('stisla.navbar')
            @include('stisla.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $error }}
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @if (session('status'))
                    <div class="alert alert-info alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif
                    <div class="section-header">
                        <h1>Page Tambah Kepala</h1>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
                        {{-- Test --}}
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8 col-6 float-left">
                                                    <button class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal" type="button"><i
                                                            class="fas fa-user-plus"></i></button>
                                                </div>
                                                <div class="col-md-4 col-6 float-right">
                                                    <input type="text" class="form-control" placeholder="Cari Pegawai"
                                                        style="width: 100%;" id="kepalasearch">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="resultkepala">
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        @if ($user->status == 1)
                                                            <div class="badge badge-success">Active</div>
                                                        @else
                                                            <div class="badge badge-danger">Non</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal"
                                                            data-target="#edit{{$user->id}}" type="button">Edit</button>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#delete{{$user->id}}">Hapus</a>
                                                        <a href="#" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#non{{$user->id}}">Status</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <nav class="d-inline-block">
                                            <ul class="pagination mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"><i
                                                            class="fas fa-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1 <span
                                                            class="sr-only">(current)</span></a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#"><i
                                                            class="fas fa-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Test --}}
                        <!-- This is where your code ends -->
                    </div>
                </section>
            </div>
            {{-- Modal Edit --}}
            @foreach ($users as $user)
            <div class="modal fade" tabindex="-1" role="dialog" id="edit{{$user->id}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Kepala</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{url('admin/update-kepala/'.$user->id.'')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="alert alert-warning">
                                            <b>Note!</b> Isi Semua Data
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kepala</label>
                                            <input type="text" class="form-control" value="{{$user->name}}"
                                                placeholder="Masukkan Nama Lengkap" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Induk Kependudukan</label>
                                            <input type="number" class="form-control"
                                            placeholder="Masukkan NIK" value="{{$user->nik}}" name="nik" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Kepala</label>
                                            <input type="email" class="form-control" value="{{$user->email}}"
                                                placeholder="Masukkan Email Pegawai" name="email" required readonly>
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
            {{-- Modal Delete --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$user->id}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" action="{{'delete-kepala/'.$user->id.''}}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus Kepala</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Anda Yakin Akan Menghapus <b>{{$user->name}}</b>?</p>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            {{-- Modal Nonaktif --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="non{{$user->id}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" action="{{ url('admin/status-kepala/'.$user->id.'')}}">
                        @csrf
                        <div class="modal-header">
                            @if ($user->status == 0)
                                <h5 class="modal-title">Konfirmasi Aktifkan Kepala</h5>
                            @else
                                <h5 class="modal-title">Konfirmasi Nonaktif Kepala</h5>
                            @endif
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($user->status == 0)
                                <p>Anda Yakin Akan Aktifkan <b>{{$user->name}}</b>?</p>
                            @else
                                <p>Anda Yakin Akan Me-nonaktifkan <b>{{$user->name}}</b>?</p>
                            @endif
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Modal Create --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Kepala</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{url('admin/add-kepala')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="alert alert-warning">
                                            <b>Note!</b> Isi Semua Data
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kepala</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap"
                                                name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Kepala</label>
                                            <input type="email" class="form-control"
                                                placeholder="Masukkan Email Pegawai" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Induk Kependudukan</label>
                                            <input type="number" class="form-control"
                                            placeholder="Masukkan NIK" name="nik" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                required>
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
            <footer class="main-footer">
                @include('stisla.footer')
            </footer>
        </div>
    </div>
    @include('stisla.script')
</body>

</html>