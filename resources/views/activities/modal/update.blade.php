<div class="modal fade" id="edit_exam_{{$exam->id}}" tabindex="-1" aria-labelledby="edit_exam_{{$exam->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_exam_{{$exam->id}}Label">Modifier un examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('updateExam',$exam->id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="label" value="{{$exam->label}}">
                        <label>Intitulé<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="start_date" value="{{date("Y-m-d", strtotime($exam->date_start))}}">
                        <label>Date<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="time" class="form-control" required name="start_time" value="{{date("H:i",strtotime($exam->date_start))}}">
                        <label>Heure de début<span class="text-danger">*</span></label>
                    </div>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="promotion_id" value="{{ $promotion_id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
