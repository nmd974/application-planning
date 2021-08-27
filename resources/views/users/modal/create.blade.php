<button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_user">
    <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un élève
</button>

<div class="modal fade show" id="create_user" class="display: block; padding-right: 17px;" tabindex="-1" aria-labelledby="create_userLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_userLabel">Ajouter un élève</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route("users.store") }}" id="form_create_user">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="last_name" required>
                        <label>Nom<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="first_name" required>
                        <label>Prenom<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" required>
                        <label>Email<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="birthday">
                        <label>Date de naissance<span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="create" id="create_user_button">Créer</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="hidden" name="promotion_id" value="{{ $promotion_id }}">
            </form>
        </div>
    </div>
</div>


