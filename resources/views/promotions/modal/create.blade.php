<button type="button" class="btn btn-outline-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_promotion">
    <i class="fa fa-plus" aria-hidden="true"></i>
</button>

<div class="modal fade" id="create_promotion" tabindex="-1" aria-labelledby="create_userLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="create_userLabel">Créer une Promotion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('promotion.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="label" required>
                        <label>label<span class="text-danger"></span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="create" >Créer</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>



