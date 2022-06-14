@foreach ($quizzes as $quiz)
<div class="modal fade" tabindex="-1" role="dialog" id="modalDeleteData{{ $quiz->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data {{ $quiz->name }}?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a type="button" href="{{ url('/admin/quiz/'.$quiz->id.'/delete') }}"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: rgb(255, 0, 0);"
                        class="btn text-white">Hapus</a>
                </div>
        </div>
    </div>
</div>
@endforeach