<button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_activitie">
    <i class="fa fa-plus me-2" aria-hidden="true"></i>Ajouter une activité à l'examen
</button>

<div class="modal fade show" id="create_activitie" class="display: block; padding-right: 17px;" tabindex="-1" aria-labelledby="create_activitieLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_activitieLabel">Ajouter un examen à l'activité {{$exam->label}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route("createExamActivitie", $exam->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input autocomplete="false" type="text" list="activities_list" class="form-control" name="label" required>
                        <datalist id="activities_list">
                            @foreach ($list_activities as $a)
                                <option value="{{$a->label}}" data-id="{{$a->id}}">
                            @endforeach
                          </datalist>
                        <label>Intitulé<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">

                        <input type="time" class="form-control" id="duration" name="duration">
                        <label for="duration" required>Durée*</label>
                    </div>
                    <div class="form-floating mb-3">

                        <input type="number" class="form-control" id="order" name="order">
                        <label for="order" required>Ordre*</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="create">Créer</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                <input type="hidden" name="exam_date" value="{{ date("m/d/Y", strtotime($exam->date_start)) }}">
            </form>
        </div>
    </div>
</div>


<script>
    const input_label = document.querySelector("[list='activities_list']");
    var id = 0;
    input_label.addEventListener('keyup', (e) => {
        setTimeout(() => {
            const elements = document.querySelectorAll("#activities_list option");
            elements.forEach(el => {
                if(el.value == e.target.value){
                    id = el.getAttribute("data-id");
                    return false;
                }
            })
            let xhr = new XMLHttpRequest();
            xhr.open("GET", `{{getenv("APP_URL")}}activities/${id}`);
            xhr.responseType = "json";
            xhr.send();
            xhr.onload = function(){
                if (xhr.status != 200){
                    console.log("Erreur " + xhr.status + " : " + xhr.statusText);
                }else{
                    data = xhr.response;
                    console.log(data);
                    document.querySelector("#create_activitie [name='label']").value = data.activities.label;
                    document.querySelector("#create_activitie [name='duration']").value = `${tranform_hours(data.duration)}`;
                    document.querySelector("#create_activitie [name='order']").value = data.order;
                }
            };
            xhr.onerror = function(){
                console.log("La requête a échoué");
            };
        }, 500);
    })
</script>

