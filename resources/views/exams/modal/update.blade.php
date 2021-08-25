<div class="modal fade" id="edit_exam" tabindex="-1" aria-labelledby="edit_examLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_examLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="form_update_exam">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="label">
                        <label>Intitulé<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="start_date">
                        <label>Date<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="time" class="form-control" required name="start_time">
                        <label>Heure de début<span class="text-danger">*</span></label>
                    </div>
                </div>
                <input type="hidden" name="promotion_id" value="{{ $promotion_id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cancel_button_update" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update" id="update_exam_button">Modifier</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
