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
                        <h1>Scanner Page</h1>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
                        <div class="container">
                            <center>
                            <div id="preview" class="videoScan" style="width: 100%; height:auto;">{{-- Scanner --}}</div>
                            <br>
                            <button class="ml-4 btn btn-primary" onclick="switchCamera()" style="padding-left: 9%; padding-right: 9%;"><i class="fas fa-camera fa-3x"></i></button>
                            <input type="hidden" value="1" id="camera">
                            </center>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                @include('stisla.footer')
            </footer>
        </div>
    </div>
    @include('stisla.script')
    <!--Script Qr Code Scanner and Generator-->
    <script>
    window.onload = function(){
        startCamera();
    };
    var camera = document.getElementById("camera").value;
    const html5QrCode = new Html5Qrcode("preview");
    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
      //alert(decodedText);
      window.location.href = decodedText;
    };
    const config = { fps: 10, qrbox: { width: 250, height: 250} };
    //If you want to prefer front camera
    function startCamera(){
      if(camera == 0){
        html5QrCode.start({ facingMode: "user"}, config, qrCodeSuccessCallback).catch((err) => {
          window.location = 'https://www.online-qr-scanner.com/';
        });
      }else if(camera==1){
        html5QrCode.start({ facingMode: "environment"}, config, qrCodeSuccessCallback).catch((err) => {
          window.location = 'https://www.online-qr-scanner.com/';
        });
      }
    }
    //Function
    function switchCamera(){
      if(camera == 1){
        camera = 0;
      }else if(camera == 0){
        camera = 1;
      }
      html5QrCode.stop().then((ignore) => {
        startCamera()
        console.log('Stopped')
      }).catch((err) => {
        // Stop failed, handle it.
        window.location = 'https://www.online-qr-scanner.com/';
      });
    }
  </script>
  <!--Script Qr Code Scanner and Generator-->
</body>
</html>