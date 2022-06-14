<!DOCTYPE html>
<html lang="en">

<head>
    @include('stisla.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('stisla.navbar')
            @include('stisla.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
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
                    <div class="section-header">
                        <h1>Index Quiz</h1>
                    </div>

                    <div class="section-body">
                        <!-- This is where your code starts -->
                        <div class="card-body p-0">
                            <a class="btn btn-primary" href="#" data-toggle="modal"
                                data-target="#modalAddData">Create Quiz</a></br></br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($quizzes as $key => $quiz)
                                        <tr>
                                            <td class="text-center">
                                                {{ $key+1 }}
                                            </td>
                                            <td>
                                                {{ $quiz->name }}
                                            </td>
                                            <td>
                                                {{ $quiz->start_date }}
                                            </td>
                                            <td>
                                                {{ $quiz->end_date }}
                                            </td>
                                            <td>
                                                {{ $quiz->status }}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('admin/quiz/'.$quiz->id.'/questions') }}" class="btn btn-primary">Detail</a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#modalUpdateStatus{{ $quiz->id }}">
                                                        <button type="button" class="btn btn-info">Status</button>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#modalUpdateData{{ $quiz->id }}">
                                                        <button type="button" class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#modalDeleteData{{ $quiz->id }}">
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <!-- This is where your code ends -->
                        </div>
                </section>
            </div>
            <footer class="main-footer">
                @include('stisla.footer')
            </footer>
        </div>
    </div>
    @include('admin.modal.create-quiz')
    @include('admin.modal.update-quiz')
    @include('admin.modal.delete-quiz')
    @include('admin.modal.update-quiz-status')
    @include('stisla.script')
</body>

</html>
