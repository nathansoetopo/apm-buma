 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: #12CB60;">
    <div class="container">
    <img class="navbar-brand" src="{{ asset('startboot/logobuma.png') }}" style="width: 10%;" />
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/riwayat-test') }}">Riwayat Test</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/logout') }}">Logout</a></li>
                {{-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/') }}">Riwayat Quiz</a></li> --}}
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
