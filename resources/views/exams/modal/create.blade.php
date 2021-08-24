<button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_exam">
    <i class="fa fa-plus me-2" aria-hidden="true"></i>Ajouter un examen
</button>

<div class="modal fade show" id="create_exam" class="display: block; padding-right: 17px;" tabindex="-1" aria-labelledby="create_examLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_examLabel">Ajouter un examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route("createExamByPromotion", $promotion_id) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="label" required>
                        <label>Intitulé<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">

                        <input type="date" class="form-control" id="start_date" name="start_date">
                        <label for="start_date" required>Date</label>
                    </div>
                    <div class="form-floating mb-3">

                        <input type="time" class="form-control" id="start_time" name="start_time">
                        <label for="start_time" required>Heure de début</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="create">Créer</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="hidden" name="promotion_id" value="{{ $promotion_id }}">
            </form>
        </div>
    </div>
</div>


