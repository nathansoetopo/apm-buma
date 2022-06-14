<div class="modal fade" tabindex="-1" role="dialog" id="modalAddData">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="createRecord" action="{{ url('/admin/quiz/'.$questionID.'/store-option') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Create Option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Option</label>
                        <input type="text" class="form-control" id="name" name="option"
                            placeholder="Tulis opsi anda" value="{{ old('option') }}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Status</label>
                        <input type="number" min="1" max="4" class="form-control" id="name" name="status"
                            placeholder="Tulis nilai" value="{{ old('status') }}">
                    </div>
                    {{-- <br>
                    <div class="form-group">
                        <label for="name" class="form-label">Option 2</label>
                        <input type="text" class="form-control" id="name" name="option2"
                            placeholder="Tulis pertanyaan anda" value="{{ old('option2') }}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Status 2</label>
                        <input type="number" min="1" max="4" class="form-control" id="name" name="status2"
                            placeholder="Tulis pertanyaan anda" value="{{ old('status2') }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="name" class="form-label">Option 3</label>
                        <input type="text" class="form-control" id="name" name="option3"
                            placeholder="Tulis pertanyaan anda" value="{{ old('option3') }}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Status 3</label>
                        <input type="number" min="1" max="4" class="form-control" id="name" name="status3"
                            placeholder="Tulis pertanyaan anda" value="{{ old('status3') }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="name" class="form-label">Option 4</label>
                        <input type="text" class="form-control" id="name" name="option4"
                            placeholder="Tulis pertanyaan anda" value="{{ old('option4') }}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Status 4</label>
                        <input type="number" min="1" max="4" class="form-control" id="name" name="status4"
                            placeholder="Tulis pertanyaan anda" value="{{ old('status4') }}">
                    </div> --}}
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
