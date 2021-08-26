<button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_role">
    <i class="fa fa-plus" aria-hidden="true"></i> Créer un role
</button>

<div class="modal fade" id="create_role" tabindex="-1" aria-labelledby="create_roleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_roleLabel">Ajouter un role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('role.store')}}" id="form_create_role">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="label" required>
                        <label>Role<span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="create" id="create_role_button">Créer</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">


            </form>
        </div>
    </div>
</div>
