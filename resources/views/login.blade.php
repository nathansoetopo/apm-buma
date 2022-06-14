<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>
<style>
    .group {
        position: relative;
        margin-bottom: 45px;
    }

    input {
        font-size: 18px;
        padding: 10px 10px 10px 5px;
        display: block;
        width: 300px;
        border: none;
        border-bottom: 1px solid #757575;
    }

    input:focus {
        outline: none;
    }

    /* LABEL ======================================= */
    label {
        color: #999;
        font-size: 18px;
        font-weight: normal;
        position: absolute;
        left: 5px;
        top: 10px;
        transition: 0.2s ease all;
        -moz-transition: 0.2s ease all;
        -webkit-transition: 0.2s ease all;
    }

    /* active state */
    input:focus~label,
    input:valid~label {
        top: -20px;
        font-size: 14px;
        color: #5264AE;
    }

    /* BOTTOM BARS ================================= */
    .bar {
        position: relative;
        display: block;
        width: 300px;
    }

    .bar:before,
    .bar:after {
        content: '';
        height: 2px;
        width: 0;
        bottom: 1px;
        position: absolute;
        background: #0E9C4A;
        transition: 0.2s ease all;
        -moz-transition: 0.2s ease all;
        -webkit-transition: 0.2s ease all;
    }

    .bar:before {
        left: 50%;
    }

    .bar:after {
        right: 50%;
    }

    /* active state */
    input:focus~.bar:before,
    input:focus~.bar:after {
        width: 50%;
    }

    /* HIGHLIGHTER ================================== */
    .highlight {
        position: absolute;
        height: 60%;
        width: 100px;
        top: 25%;
        left: 0;
        pointer-events: none;
        opacity: 0.5;
    }

    /* active state */
    input:focus~.highlight {
        -webkit-animation: inputHighlighter 0.3s ease;
        -moz-animation: inputHighlighter 0.3s ease;
        animation: inputHighlighter 0.3s ease;
    }

    /* ANIMATIONS ================ */
    @-webkit-keyframes inputHighlighter {
        from {
            background: #0E9C4A;
        }

        to {
            width: 0;
            background: transparent;
        }
    }

    @-moz-keyframes inputHighlighter {
        from {
            background: #0E9C4A;
        }

        to {
            width: 0;
            background: transparent;
        }
    }

    @keyframes inputHighlighter {
        from {
            background: #0E9C4A;
        }

        to {
            width: 0;
            background: transparent;
        }
    }

    .footer-bg2 {
        position: absolute;
        width: 100%;
        height: 90px;
        background-color: #0E9C4A;
        z-index: -1;
    }

    @media only screen and (max-width: 600px) {
        .footer-bg2 {
            margin-top: 250px;
            bottom: 0;
        }
    }

    .section {
        position: relative;
        z-index: 1;
        background-image: url("../assets/img/loginbg.png");
    }

    @media only screen and (max-width: 600px) {
        .section {
            background-image: none;
        }
    }

    .navbar-bg {
        content: ' ';
        position: absolute;
        width: 100%;
        height: 80px;
        background-color: #6777ef;
        z-index: -1;
    }

    .navbar-bg2 {
        position: absolute;
        width: 100%;
        height: 90px;
        background-color: #0E9C4A;
        z-index: -1;
    }

    .footer-bg2 {
        position: absolute;
        width: 100%;
        height: 90px;
        background-color: #0E9C4A;
        z-index: -1;
    }

</style>
<div class="navbar-bg2" style="background-image: url(../startboot/assets/headerbg.png);"></div>
</br> </br>
</br> </br>



<body>
    <div id="app">
        <section class="section" style="padding-top: 10px; background-image: url(../startboot/login-bg.png);">
            <div class="container mt-5">
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
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-8"
                        style="padding-top: 5%;">
                        <div class="card card" style="border-radius: 47px;">
                            <center>
                                <div class="card-header justify-content-center" style="background-color: transparent;">
                                    <h2 style="color: #0E9C4A;">MASUK</h2>
                                </div>
                            </center>
                            <div class="card-body">
                                <form method="POST" action="#" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                  @csrf
                                    <div class="group">
                                        <input type="email" name="email" value="{{ old('email') }}" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #0E9C4A;">Email</label>
                                    </div>

                                    <div class="group">
                                        <input type="password" name="password" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #0E9C4A;">Password</label>
                                    </div>

                                    <div class="group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label style="color: #0E9C4A;" class="custom-control-label"
                                                for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <center>
                                            <button type="submit" class="btn btn btn-lg btn-block"
                                                style="background-color: #0E9C4A; color: white; width: 60%; border-radius: 15px;">
                                                Login
                                            </button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </br>
                        </br></br>
                    </div>
                </div>
            </div>

        </section>
        <footer>
            <div class="footer-bg2" style="background-image: url(../startboot/assets/headerbg.png); margin-top: 0px;">
            </div>
        </footer>
    </div>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
</body>

</html>
