@foreach ($quizzes as $quiz)
<div class="modal fade" tabindex="-1" role="dialog" id="modalUpdateData{{ $quiz->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="createRecord" action="{{ url('/admin/quiz/'.$quiz->id.'/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Update Quiz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Quiz</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Tulis judul quiz anda" value="{{ $quiz->name }}">
                    </div>
                    {{-- <div class="form-group">
                        <label>Pilih Waktu Quiz</label>
                        <select class="form-control select2">
                            <option value="1">30 Menit</option>
                            <option value="2">60 Menit</option>
                            <option value="3">120 Menit</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label class="form-label">Start Date</label>
                        <input type="text" class="form-control datetimepicker" name="start_date" value="{{ $quiz->start_date }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">End Date</label>
                        <input type="text" class="form-control datetimepicker" name="end_date" value="{{ $quiz->end_date }}">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach