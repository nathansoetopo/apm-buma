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
                        <h1>Page Data Lokasi</h1>
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
                                                        data-target="#modalAddData" type="button"><i
                                                            class="fas fa-user-plus"></i></button>
                                                </div>
                                                <div class="col-md-4 col-6 float-right">
                                                    <input type="text" class="form-control" placeholder="Cari Pegawai"
                                                        style="width: 100%;" id="pegawaisearch">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            #
                                                        </th>
                                                        <th>Name</th>
                                                        <th>Latitude</th>
                                                        <th>Longitude</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($locations as $key => $quiz)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $key+1 }}
                                                        </td>
                                                        <td>
                                                            {{ $quiz->name }}
                                                        </td>
                                                        <td>
                                                            {{ $quiz->latitude }}
                                                        </td>
                                                        <td>
                                                            {{ $quiz->longitude }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a class="btn btn-info"
                                                                    href="{{ url('admin/'.$quiz->id.'/download-barcode') }}">Download
                                                                    Barcode</a>
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#modalDeleteData{{ $quiz->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-danger">Delete</button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <nav class="d-inline-block">
                                            <ul class="pagination mb-0">
                                                <li
                                                    class="{{ ($locations->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                                                    <a class="page-link"
                                                        href="{{ $locations->url($locations->currentPage()-1) }}"
                                                        tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                                </li>
                                                @for ($i = 1; $i <= $locations->lastPage(); $i++)
                                                    <li
                                                        class="{{ ($locations->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
                                                        <a class="page-link"
                                                            href="{{ $locations->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                    @endfor
                                                    <li
                                                        class="{{ ($locations->currentPage() == $locations->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                                                        <a class="page-link"
                                                            href="{{ $locations->url($locations->currentPage()+1) }}"><i
                                                                class="fas fa-chevron-right"></i></a>
                                                    </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                @include('stisla.footer')
            </footer>
        </div>
    </div>
    @include('admin.modal.create-location')
    @include('admin.modal.delete-location')
    @include('stisla.script')
    <script>
        $('#modalAddData').on('shown.bs.modal', function () {
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(startMap);
            }
        });

        function startMap(position) {
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13);
            var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            marker = new L.marker([position.coords.latitude, position.coords.longitude], {
                draggable: 'true'
            });
            marker.on('dragend', function (event) {
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng), {
                    draggable: 'true'
                });
                map.
                panTo(new L.LatLng(position.lat, position.lng))
                $("#lat").val(position.lat);
                $("#lng").val(position.lng);
            });
            map.addLayer(marker);
        }

    </script>
</body>

</html>
