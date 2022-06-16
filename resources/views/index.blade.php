@extends('pegawai.master')
    
    @section('title','Home')
    
    @section('content')
    
        <header class="container masthead text-white text-center" style="background-image: url('../startboot/assets/hal1.png'); z-index:1;">
            <img src="{{ asset('startboot/assets/nilaibg.png') }}" style="width:100%; height: auto; max-height:700px; min-height:500px;"/>
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
                    <a class="btn btn-xl btn-outline-light" href="{{ url('/apm') }}">
                        Mulai Quiz
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
                    <div class="card" style="background-image: url('startboot/assets/nilaibg.png'); height:200px;">
                        <div class="card-body text-center" style="padding-top:15%;">
                            <h2 class="card-text">{{$data->grade}}</h2>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
                </br></br>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-2 mb-5">
                    <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#33FF00; height:200px">
                    <center>
                        <b>150,0</b>
                            <p>-</p>
                                <p>240,0</p>
                                    <p>mili detik</p>
                    </center>
                    </h4>
                        <div class="card-body">
                            <center>
                                <b><p class="card-title">Normal</p></b>
                             </center>

                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-2 mb-5">
                    <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#FAFF00; height:200px">
                    <center>
                        <b>150,0</b>
                            <p>-</p>
                                <p>240,0</p>
                                    <p>mili detik</p>
                    </center>
                    </h4>
                        <div class="card-body">
                            <center>
                                <b><p class="card-title">Normal</p></b>
                             </center>

                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Item 3-->
                    <div class="col-md-6 col-lg-2 mb-5">
                    <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#FFA800; height:200px">
                    <center>
                        <b>150,0</b>
                            <p>-</p>
                                <p>240,0</p>
                                    <p>mili detik</p>
                    </center>
                    </h4>
                        <div class="card-body">
                            <center>
                                <b><p class="card-title">Normal</p></b>
                             </center>

                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Item 4-->
                    <div class="col-md-6 col-lg-2 mb-5">
                    <div class="card">
                    <img class="card-img-top">
                    <h4 class="" style="background-color:#FF0000; height:200px">
                    <center>
                        <b>150,0</b>
                            <p>-</p>
                                <p>240,0</p>
                                    <p>mili detik</p>
                    </center>
                    </h4>
                        <div class="card-body">
                            <center>
                                <b><p class="card-title">Normal</p></b>
                             </center>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection
       