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
    <h4 class="mb-4">Riwayat Hasil Quiz</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Hari dan Tanggal</th>
                <th scope="col">Quiz</th>
                <th scope="col">Score</th>
                <th scope="col" style="text-align: center;">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quizzes as $quiz)
            <tr>
                <th scope="row">{{ $quiz->start_date }}</th>
                <td>{{ $quiz->name }}</td>
                <td>{{ $quiz->pivot->grade }}</td>
                <td>
                    @if ($quiz->pivot->status == 'Unfinished')
                    <center>
                        <div class="container indikator bg-danger"><b>{{ $quiz->pivot->status }}</b></div>
                    </center>
                    @else
                    <center>
                        <div class="container indikator"><b>{{ $quiz->pivot->status }}</b></div>
                    </center>
                    @endif
                </td>
                <td>
                    <a href="{{ url('quiz/'.$quiz->id.'/show') }}" class="btn btn-outline-info">Kerjakan Quiz</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <center>
        <ul class="pagination justify-content-center mt-5">
            <li class="{{ ($quizzes->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                <a class="page-link" href="{{ $quizzes->url($quizzes->currentPage()-1) }}" tabindex="-1">Previous</a>
            </li>
            @for ($i = 1; $i <= $quizzes->lastPage(); $i++)
                <li class="{{ ($quizzes->currentPage() == $i) ? 'page-item active' : 'page-item' }}"><a
                        class="page-link" href="{{ $quizzes->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li
                    class="{{ ($quizzes->currentPage() == $quizzes->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                    <a class="page-link" href="{{ $quizzes->url($quizzes->currentPage()+1) }}">Next</a>
                </li>
        </ul>
    </center>
</div>
@endsection
