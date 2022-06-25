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
    <h4 class="mb-4">Riwayat Hasil Test</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tanggal Test</th>
                <th scope="col">Waktu Test</th>
                <th scope="col">Mulai Tidur</th>
                <th scope="col">Bangun Tidur</th>
                <th scope="col">Durasi Tidur</th>
                <th scope="col">Durasi Test APM</th>
                <th scope="col" style="text-align: center;">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apm as $a)
            <tr>
                <th scope="row">{{ $a->test_date }}</th>
                <th scope="row">{{ $a->test_time }}</th>
                <td>{{ $a->sleep_start }}</td>
                <td>{{ $a->sleep_end }}</td>
                <td>{{ $a->duration }}</td>
                <td>{{ $a->points }} milidetik</td>
                <td>
                    @if ($a->status == 'N')
                    <center>
                        <div class="container indikator bg-success"><b>{{ $a->status }}</b></div>
                    </center>
                    @elseif ($a->status == 'KKR')
                    <center>
                        <div class="container indikator bg-info"><b>{{ $a->status }}</b></div>
                    </center>
                    @elseif ($a->status == 'KKS')
                    <center>
                        <div class="container indikator bg-warning"><b>{{ $a->status }}</b></div>
                    </center>
                    @elseif ($a->status == 'KKB')
                    <center>
                        <div class="container indikator bg-danger"><b>{{ $a->status }}</b></div>
                    </center>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/riwayat-test/'.$a->id.'/barcode') }}" class="btn btn-info">Show Barcode</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <center>
        <ul class="pagination justify-content-center mt-5">
            <li class="{{ ($apm->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                <a class="page-link" href="{{ $apm->url($apm->currentPage()-1) }}" tabindex="-1">Previous</a>
            </li>
            @for ($i = 1; $i <= $apm->lastPage(); $i++)
                <li class="{{ ($apm->currentPage() == $i) ? 'page-item active' : 'page-item' }}"><a
                        class="page-link" href="{{ $apm->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li
                    class="{{ ($apm->currentPage() == $apm->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                    <a class="page-link" href="{{ $apm->url($apm->currentPage()+1) }}">Next</a>
                </li>
        </ul>
    </center>
</div>
@endsection
