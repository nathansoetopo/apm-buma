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
        <form action="{{ url('/sleep-kuisioner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">NIK</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->nik }}" readonly>
            </div>
            <div class="form-group">
                <label>Mulai Tidur</label>
                <input type="datetime-local" id="sleep_start" class="form-control" name="sleep_start">
            </div>
            <div class="form-group">
                <label>Date Time Picker</label>
                <input type="datetime-local" id="sleep_end" class="form-control" name="sleep_end">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection
