<div class="modal fade" id="delete_user_{{$user->id}}" tabindex="-1" aria-labelledby="delet_user_{{$user->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delet_user_{{$user->id}}Label">Suppression d'un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="get" action="{{ route('user_promotions.destroy', $user->pivot_user_id) }}">
                {{-- @method('DELETE') --}}
                @csrf

                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'utilisateur : "{{$user->first_name }} {{$user->last_name }}"</p>
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

