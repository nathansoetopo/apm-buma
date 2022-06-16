@extends('pegawai.master')
    <!-- Masthead-->

    @section('title','Form Quiz')
        
    @section('content')

    <header class="masthead text-white text-center"
        style="background-image: url('../startboot/assets/hal1.png'); z-index:1;">

        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Start Bootstrap</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </header>

    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <form action="#" method="POST" enctype="multipart/form-data">
                @foreach ($questions as $key => $q)
                <h4>{{ $q->question }}</h4>
                    @foreach ($options[$key+1] as $o)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="{{ $o->id }}" name="option{{ $key }}">
                        <label class="form-check-label" for="exampleRadios1">
                            {{ $o->option }}
                        </label>
                    </div>
                    @endforeach
                    <br>
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    @endsection