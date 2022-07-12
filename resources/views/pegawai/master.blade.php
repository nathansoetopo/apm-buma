<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('startboot/css/styles.css') }}" rel="stylesheet" />
    @if (Request::is('test-barcode'))
    <script type="text/javascript" src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    @endif
    <style>
        .result-card {
            width: fit-content;
            padding: 8%;
        }

    </style>
</head>

<body id="page-top">
    @include('pegawai.components.navbar')


    @yield('content')


    @include('pegawai.components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('startboot/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    @if (Request::is('test-barcode'))
    <!--Script Qr Code Scanner and Generator-->
    <script>
        window.onload = function () {
            startCamera();
        };
        var camera = document.getElementById("camera").value;
        const html5QrCode = new Html5Qrcode("preview");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            window.location.href = decodedText;
        };
        const config = {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        };
        //If you want to prefer front camera
        function startCamera() {
            if (camera == 0) {
                html5QrCode.start({
                    facingMode: "user"
                }, config, qrCodeSuccessCallback).catch((err) => {
                    window.location = 'https://www.online-qr-scanner.com/';
                });
            } else if (camera == 1) {
                html5QrCode.start({
                    facingMode: "environment"
                }, config, qrCodeSuccessCallback).catch((err) => {
                    window.location = 'https://www.online-qr-scanner.com/';
                });
            }
        }
        //Function
        function switchCamera() {
            if (camera == 1) {
                camera = 0;
            } else if (camera == 0) {
                camera = 1;
            }
            html5QrCode.stop().then((ignore) => {
                startCamera()
            }).catch((err) => {
                // Stop failed, handle it.
                window.location = 'https://www.online-qr-scanner.com/';
            });
        }
    </script>
    <!--Script Qr Code Scanner and Generator-->
    @endif
    @if (!empty($lokasi->id))
        @if (Request::is('scan-lokasi/'.$lokasi->id.'/detail'))
        <script>
            navigator.geolocation.getCurrentPosition(getLatLon);

            function getLatLon(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var input1 = document.getElementById('lat');
                var input2 = document.getElementById('long');
                input1.value = latitude;
                input2.value = longitude;
            }

        </script>
        @endif
    @endif
</body>

</html>
