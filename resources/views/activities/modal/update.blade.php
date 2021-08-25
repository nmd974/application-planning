<div class="modal fade" id="edit_activitie" tabindex="-1" aria-labelledby="edit_activitie_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_activitieLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="label">
                        <label>Intitulé<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">

                        <input type="time" class="form-control" id="duration" name="duration">
                        <label for="duration" required>Durée</label>
                    </div>
                    <div class="form-floating mb-3">

                        <input type="number" class="form-control" id="order" name="order">
                        <label for="order" required>Ordre</label>
                    </div>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="exam_id" value="{{ $exam->id }}">
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
{{-- {{ route('updateExamActivitie',[$activitie->pivot->exam_id, $activitie->pivot->activitie_id]) }} --}}
{{-- http://127.0.0.1/exam/8/activities/1/update --}}
