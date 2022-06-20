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
    <center>
        <div class="text-center">
            {!! QrCode::size(250)->generate(env('APP_URL') . '/apm-test/scan/' . $apm->id . '/detail'); !!}
        </div>
    </center>
</div>
@endsection
