<!DOCTYPE html>
<html lang="en">

<head>
    @include('stisla.head')
    <style>
    #uploadBtn {
        position: absolute;
        object-position: center;
        text-align: center;
        left:0px;
        transform: translateY(-162%);
        z-index: 100;
        opacity: 0.8;
        cursor: pointer;
        padding: 10%;
        display: none;
        background-color: black;
    }
    </style>
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
                        <h1>Profile</h1>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
                        <p class="section-lead">
                            Silahkan Ubah Informasi Pribadi Anda.
                        </p>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card profile-widget">
                                <div class="profile-widget-header human">
                                    @if(Auth::user()->profile == NULL)
                                        <img alt="image" id="pp" src="../assets/img/avatar/avatar-1.png"
                                        class="rounded-circle profile-widget-picture" style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px;">
                                    @else
                                        <img alt="image" id="pp" src="{{ asset('data_user/'.Auth::user()->id.'/profile/'.Auth::user()->profile)}}"
                                        class="rounded-circle profile-widget-picture" style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px;">
                                    @endif
                                </div>
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name">{{ Auth::user()->name}} <div
                                            class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div> {{Auth::user()->getRoleNames()}}
                                        </div>
                                        <br>
                                        <label for="image" class="rounded-circle text-white profile-widget-picture mt-2" id="uploadBtn" style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px; padding: 40px;"><i class="fas fa-plus-circle" id="iconPlus"></i></label>
                                    </div>
                                    <form method="POST" action="{{url('profile')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap"
                                                name="name" value="{{$user->name}}" required>
                                            <input type="file" name="profile" id="image" class="update-foto" style="display:none;">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Pegawai</label>
                                            <input type="email" class="form-control" placeholder="Masukkan Email Pegawai"
                                                name="email" value="{{$user->email}}" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                        <center>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </center>
                                    </form>
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
    @include('stisla.script')
    <script>
    const imgDiv = document.querySelector('.human');
    const img = document.querySelector('#pp');
    const uploadBtn = document.querySelector('#uploadBtn');
    const file = document.querySelector('#image');
    imgDiv.addEventListener('mouseenter', function() {
        uploadBtn.style.display = "block";
    })

    imgDiv.addEventListener('mouseleave', function() {
        uploadBtn.style.display = "none";
    })

    file.addEventListener('change', function() {
        const choosedFile = this.files[0];
        if (choosedFile) {
        const reader = new FileReader();
        reader.addEventListener('load', function() {
            img.setAttribute('src', reader.result);
        })
        reader.readAsDataURL(choosedFile)
        console.log(file.value);
        //Nama File atau Src bisa masuk ke dalam input value
        }
    })
    </script>
</body>
</html>
