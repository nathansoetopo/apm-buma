@extends('pegawai.master')
@section('title','Scan Barcode')

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
    <h4 class="mb-4">Scan Barcode</h4>
    <center>
        <div class="container">
            <div id="preview" class="videoScan" style="width: 100%; height:auto;"></div>
            <br>
            <button class="ml-4 btn btn-primary" onclick="switchCamera()" style="padding-left: 9%; padding-right: 9%;"><i class="fas fa-camera fa-3x"></i></button>
            <input type="hidden" value="1" id="camera">
        </div>
    </center>
</div>
@endsection
