@extends('pegawai.master')
@section('title','Riwayat Quiz')

@section('content')

{{-- Content --}}
<div class="container riwayat">
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
    <h4 class="mb-4">Barcode Hasil Test</h4>
    <h5 class="mb-4">Nama : {{ $user->name }}</h5>
    <h5 class="mb-4">NIK : {{ $user->nik }}</h5>
    <center>
        <div class="text-center">
            @if ($apm->status == 'N')
            <h5 class="mb-4 text-success">Normal</h5>
            @elseif ($apm->status == 'KKR')
            <h5 class="mb-4 text-secondary">Kelelahan Kerja Ringan</h5>
            @elseif ($apm->status == 'KKS')
            <h5 class="mb-4 text-warning">Kelelahan Kerja Sedang</h5>
            @elseif ($apm->status == 'KKB')
            <h5 class="mb-4 text-danger">Kelelahan Kerja Berat</h5>
            @endif
            <h5 class="mb-4">{{ $apm->points }} milidetik</h5>
        </div>
        <div class="text-center">
            {!! QrCode::size(250)->generate(env('APP_URL') . '/apm-test/scan/' . $apm->id . '/detail'); !!} <br><br>
            <p>Tanggal & waktu test: {{ $apm->test_date }} {{ $apm->test_time }}</p>
            <p>Durasi Tidur: {{ $apm->duration }}</p>
            <p>Mulai Tidur: {{ $apm->sleep_start }}</p>
            <p>Bangun Tidur: {{ $apm->sleep_end }}</p>
        </div>
    </center>
</div>
@endsection
