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
            <form action="{{ url('quiz/'.$quizID.'/submit-answer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                @foreach ($questions as $key => $q)
                <h4>{{ $q->question }}</h4>
                <input type="hidden" name="questions{{ $key }}" value="{{ $q->id }}">
                <input type="hidden" name="panjang" value="{{ count($questions) }}">
                    @foreach ($options[$q->id] as $o)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="exampleRadios1"
                            value="{{ $o->id }}" name="options{{ $key }}">
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