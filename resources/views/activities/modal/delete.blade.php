<div class="modal fade" id="delete_activitie_{{$activitie->id}}" tabindex="-1" aria-labelledby="delet_activitie_{{$activitie->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delet_activitie_{{$activitie->id}}Label">Suppression d'une activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('deleteActivityByExam',[$activitie->pivot->exam_id, $activitie->pivot->activitie_id]) }}">
                @method('PATCH')
                @csrf

                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'activité : "{{$activitie->label }}"</p>
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

