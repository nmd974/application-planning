<button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_eleve">
    <i class="fa fa-plus" aria-hidden="true"></i> Créer un utilisateur
</button>

<div class="modal fade show" id="create_eleve" class="display: block; padding-right: 17px;" tabindex="-1" aria-labelledby="create_eleveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_eleveLabel">Ajouter un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route("user.add") }}">
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

                    <div class="form-floating mb-3">
                        <select name="role_id" id="role" class="form-control">
                            <option value="">Choisir un role</option>

                            @foreach($roles as $role)
                                <option value="{{$role->id}}"> {{$role->label}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="create">Créer</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>
</div>


