<div class="modal fade" id="delete_exam" tabindex="-1" aria-labelledby="delet_examLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delet_examLabel">Suppression d'un examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                @method('PATCH')
                @csrf

                <div class="modal-body">
                    <p id="text_confirmation"></p>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="delete" id="delete_exam_button">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>

