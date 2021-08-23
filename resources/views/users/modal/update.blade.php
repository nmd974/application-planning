<div class="modal fade" id="edit_user_{{$user->id}}" tabindex="-1" aria-labelledby="edit_user_{{$user->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_user_{{$user->id}}Label">Modifier un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="last_name" value="{{$user->last_name}}">
                        <label>Nom<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" required name="first_name" value="{{$user->first_name}}">
                        <label>Prenom<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" required name="email" value="{{$user->email}}">
                        <label>Email<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="date_birth" value="{{$user->date_birth}}">
                        <label>Date de naissance<span class="text-danger">*</span></label>
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
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
