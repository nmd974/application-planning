<div class="modal fade" id="edit_promotion_{{$promotion->id}}" tabindex="-1" aria-labelledby="edit_promotion_{{$promotion->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_promotion_{{$promotion->id}}Label">Modifier la promotion {{$promotion->label}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('updatePromotion',$promotion->id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="label" value="{{$promotion->label}}">
                        <label>Intitulé<span class="text-danger">*</span></label>
                    </div>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="exam_id" value="{{ $promotion->id }}">
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
