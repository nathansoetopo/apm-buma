@extends('pegawai.master')

@section('title','Home')

@section('content')

<header class="container masthead text-white text-center"
    style="background-image: url('../startboot/assets/hal1.png'); z-index:1;">
    @if (!empty($data))
        @if ($data->status == 'N')
        <img src="{{ asset('startboot/assets/nilaibg.png') }}"
            style="width:100%; height: auto; max-height:700px; min-height:500px;" />
        @elseif ($data->status == 'KKR')
        <img src="{{ asset('startboot/assets/nilaibg-kkr.png') }}"
            style="width:100%; height: auto; max-height:700px; min-height:500px;" />
        @elseif($data->status == 'KKS')
        <img src="{{ asset('startboot/assets/nilaibg-kks.png') }}"
            style="width:100%; height: auto; max-height:700px; min-height:500px;" />
        @elseif ($data->status == 'KKB')
        <img src="{{ asset('startboot/assets/nilaibg-kkb.png') }}"
            style="width:100%; height: auto; max-height:700px; min-height:500px;" />
        @endif
    @else
    <img src="{{ asset('startboot/assets/nilaibg.png') }}"
        style="width:100%; height: auto; max-height:700px; min-height:500px;" />
    @endif
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
    <div class="container d-flex align-items-center flex-column" style="position:absolute; top:200px;">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Start Boot</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <div class="text-center mt-4" style="z-index: 99;">
            <a class="btn btn-xl btn-outline-light" href="{{ url('/sleep-kuisioner') }}">
                Mulai Test
            </a>
        </div>
    </div>
</header>
<section class="page-section portfolio" id="portfolio" style="padding-bottom: 0px;">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Nilai Anda</h2>
        </br></br>
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            <div style="width: 50%;">
                <div class="card-columns">
                    @if (!empty($data))
                    @if($data->status == 'N')
                    <div class="card" style="background-image: url('startboot/assets/nilaibg.png'); height:500px;">
                        <div class="card-body text-center" style="padding-top:15%;">
                            <h2 class="card-text">{{$data->points}} APM Points</h2>
                            {!! QrCode::size(250)->generate(env('APP_URL') . '/apm-test/scan/' . $data->id . '/detail'); !!}
                            <p>Normal</p>
                        </div>
                    </div>
                    @elseif($data->status == 'KKR')
                    <div class="card" style="background-image: url('startboot/assets/nilaibg-kkr.png'); height:500px;">
                        <div class="card-body text-center" style="padding-top:15%;">
                            <h2 class="card-text">{{$data->points}} APM Points</h2>
                            {!! QrCode::size(250)->generate(env('APP_URL') . '/apm-test/scan/' . $data->id . '/detail'); !!}
                            <p>Kelelahan Kerja Ringan</p>
                        </div>
                    </div>
                    @elseif($data->status == 'KKS')
                    <div class="card" style="background-image: url('startboot/assets/nilaibg-kks.png'); height:500px;">
                        <div class="card-body text-center" style="padding-top:15%;">
                            <h2 class="card-text">{{$data->points}} APM Points</h2>
                            {!! QrCode::size(250)->generate(env('APP_URL') . '/apm-test/scan/' . $data->id . '/detail'); !!}
                            <p>Kelelahan Kerja Sedang</p>
                        </div>
                    </div>
                    @elseif($data->status == 'KKB')
                    <div class="card" style="background-image: url('startboot/assets/nilaibg-kkb.png'); height:500px;">
                        <div class="card-body text-center" style="padding-top:15%;">
                            <h2 class="card-text">{{$data->points}} APM Points</h2>
                            {!! QrCode::size(250)->generate(env('APP_URL') . '/apm-test/scan/' . $data->id . '/detail'); !!}
                            <p>Kelelahan Kerja Berat</p>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="card" style="background-image: url('startboot/assets/nilaibg.png'); height:200px;">
                        <div class="card-body text-center" style="padding-top:15%;">
                            <h2 class="card-text">Anda belum test</h2>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Parameter</h2>
        </br></br>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            <div class="col-md-6 col-lg-2 mb-5">
                <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#33FF00; height:200px">
                        <center>
                            <br>
                            <b>150,0</b>
                            <p>-</p>
                            <p>240,0</p>
                            <p>mili detik</p>
                        </center>
                    </h4>
                    <div class="card-body">
                        <center>
                            <b>
                                <p class="card-title">Normal</p>
                            </b>
                        </center>

                    </div>
                </div>
            </div>
            <!-- Portfolio Item 2-->
            <div class="col-md-6 col-lg-2 mb-5">
                <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#FAFF00; height:200px">
                        <br>
                        <center>
                            <b>240,0</b>
                            <p>-</p>
                            <p>410,0</p>
                            <p>mili detik</p>
                        </center>
                    </h4>
                    <div class="card-body">
                        <center>
                            <b>
                                <p class="card-title">KKR (Kelelahan Kerja Ringan)</p>
                            </b>
                        </center>

                    </div>
                </div>
            </div>
            <!-- Portfolio Item 3-->
            <div class="col-md-6 col-lg-2 mb-5">
                <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#FFA800; height:200px">
                    <br>
                        <center>
                            <b>410,0</b>
                            <p>-</p>
                            <p>580,0</p>
                            <p>mili detik</p>
                        </center>
                    </h4>
                    <div class="card-body">
                        <center>
                            <b>
                                <p class="card-title">KKS (Kelelahan Kerja Sedang)</p>
                            </b>
                        </center>

                    </div>
                </div>
            </div>
            <!-- Portfolio Item 4-->
            <div class="col-md-6 col-lg-2 mb-5">
                <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#FF0000; height:200px">
                        <br>
                        <center>
                            <p>>= 580,0</p>
                            <p>mili detik</p>
                        </center>
                    </h4>
                    <div class="card-body">
                        <center>
                            <b>
                                <p class="card-title">KKB (Kelelahan Kerja Berat)</p>
                            </b>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
