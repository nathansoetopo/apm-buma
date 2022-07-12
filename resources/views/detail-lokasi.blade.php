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
    <h4 class="mb-4">Detail Lokasi</h4>
    <form action="{{ url('scan-lokasi/'.$lokasi->id.'/submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
        </div>
        <div class="form-group">
            <label>NIK</label>
            <input type="text" class="form-control" value="{{ $user->nik }}" readonly>
        </div>
        <div class="form-group">
            <label>Nama Lokasi</label>
            <input type="text" class="form-control" value="{{ $lokasi->name }}" readonly>
        </div>
        <input type="hidden" name="latitude" value="-7.5533">
        <input type="hidden" name="longitude" value="110.831">
        {{-- <a href="{{ url('scan-lokasi/'.$lokasi->id.'/submit') }}" class="btn btn-success">Continue</a> --}}
        <button type="submit" class="btn btn-success">Continue</button>
    </form>
</div>
@endsection
