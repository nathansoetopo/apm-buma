@foreach ($quizzes as $quiz)
<div class="modal fade" tabindex="-1" role="dialog" id="modalUpdateStatus{{ $quiz->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengupdate status {{ $quiz->name }}?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a type="button" href="{{ url('/admin/quiz/'.$quiz->id.'/update-status') }}"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: rgb(0, 136, 255);"
                        class="btn text-white">Update</a>
                </div>
        </div>
    </div>
</div>
@endforeach