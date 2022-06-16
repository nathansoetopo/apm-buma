@extends('pegawai.master')

@section('title','Riwayat Hasil Quiz')
    
@section('content')
    {{-- Content --}}
    <div class="container riwayat">
        <h4 class="mb-4">Riwayat Hasil Quiz</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Hari dan Tanggal</th>
                    <th scope="col">Score</th>
                    <th scope="col" style="text-align: center;">Indikator</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                    $users = DB::table('users')->get('id');
                    echo $users;
                @endphp --}}
                @foreach ($users as $u)
                    <tr>
                        <th scope="row">{{$u->created_at}}</th>
                        <td>{{$u->pivot->grade}}</td>
                        <td>
                            @if($u->pivot->grade >= 580)
                                <center>
                                    <div class="container bg-danger"><b>N</b></div>
                                </center>
                            @elseif($u->pivot->grade < 580 && $u->pivot->grade >= 410)
                                <center>
                                    <div class="container" style="background-color:#F9690E;"><b>N</b></div>
                                </center>
                            @elseif(240 <= $u->pivot->grade && $u->pivot->grade < 410)
                                <center>
                                    <div class="container bg-warning"><b>N</b></div>
                                </center>
                            @elseif($u->pivot->grade <= 150)
                                <center>
                                    <div class="container bg-success"><b>N</b></div>
                                </center>
                            @endif
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        <center>
            <ul class="pagination justify-content-center mt-5">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </center>
    </div>
    @endsection
    