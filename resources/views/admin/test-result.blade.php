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
                        <h1>Test Result</h1>
                    </div>

                    <div class="section-body">
                        <!-- This is where your code starts -->
                        <div class="card-body p-0">
                            @if(!empty($apm))
                                @if ($apm->status == 'N')
                                <div class="col-12 mb-4">
                                    <div class="hero align-items-center bg-success text-white">
                                        <div class="hero-inner text-center">
                                            <h2>{{ $apm->users->name }}</h2>
                                            <p class="lead">{{ $apm->status }}</p>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left">{{ $apm->points }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($apm->status == 'KKR')
                                <div class="col-12 mb-4">
                                    <div class="hero align-items-center bg-secondary text-white">
                                        <div class="hero-inner text-center">
                                            <h2>{{ $apm->users->name }}</h2>
                                            <p class="lead">{{ $apm->status }}</p>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left">{{ $apm->points }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($apm->status == 'KKS')
                                <div class="col-12 mb-4">
                                    <div class="hero align-items-center bg-warning text-white">
                                        <div class="hero-inner text-center">
                                            <h2>{{ $apm->users->name }}</h2>
                                            <p class="lead">{{ $apm->status }}</p>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left">{{ $apm->points }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($apm->status == 'KKB')
                                <div class="col-12 mb-4">
                                    <div class="hero align-items-center bg-danger text-white">
                                        <div class="hero-inner text-center">
                                            <h2>{{ $apm->users->name }}</h2>
                                            <p class="lead">{{ $apm->status }}</p>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left">{{ $apm->points }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @else
                            <div class="col-12 mb-4">
                                <div class="hero align-items-center bg-info text-white">
                                    <div class="hero-inner text-center">
                                        <h2>{{ $apm->users->name }}</h2>
                                        <p class="lead">Belum ada Test</p>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left">{{ $apm->points }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            <!-- This is where your code ends -->
                        </div>
                </section>
            </div>
            <footer class="main-footer">
                @include('stisla.footer')
            </footer>
        </div>
    </div>
    @include('stisla.script')
</body>

</html>
