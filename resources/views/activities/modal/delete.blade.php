<div class="modal fade" id="delete_exam_{{$exam->id}}" tabindex="-1" aria-labelledby="delet_exam_{{$exam->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delet_exam_{{$exam->id}}Label">Suppression d'un examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('deleteExamByPromotion',[$exam->getOriginal('pivot_promotion_id'), $exam->getOriginal("pivot_exam_id")]) }}">
                @method('PATCH')
                @csrf

                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'examen : "{{$exam->label }}"</p>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="delete">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>

