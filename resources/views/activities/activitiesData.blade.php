@extends('activities.index')
@section('activities')
@include('activities.modal.update')
<div class="row mt-4">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Intitulé</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Ordre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($activities))
                @foreach ($activities as $activitie)
                @include('activities.modal.delete')

                {{-- {{dd($activitie)}} --}}
                @if (!$activitie->pivot->archived)
                <tr>
                    <td class="align-middle">{{ucfirst($activitie->label) }}</td>
                    <td class="align-middle">{{date("H:i", mktime(0,$activitie->pivot->duration)) }}</td>
                    <td class="align-middle">{{ $activitie->pivot->order }}</td>
                    <td class="d-flex justify-content-around flex-wrap">
                        {{-- <button type="button" class="btn btn-success me-4" data-id="{{$activitie->id}}" data-action="update" data-bs-toggle="modal" data-bs-target="#{{"edit_activitie_" . $activitie->id}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button> --}}
                        <button type="button" class="btn btn-success me-4" data-exam="{{$exam->id}}" data-id="{{$activitie->id}}" data-action="update">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger me-4" data-action="delete" data-id="{{$activitie->id}}" data-bs-toggle="modal" data-bs-target="#{{"delete_activitie_" . $activitie->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                @endif
                @endforeach
                @else

                <tr>
                    <td class="align-middle" colspan="4">Vous n'avez pas d'activités enregistrées pour cet examen</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    const btn_update = document.querySelectorAll("[data-action='update']");
    const btn_delete = document.querySelectorAll("[data-action='delete']");
    const modal_update = new bootstrap.Modal(document.getElementById('edit_activitie'), {
        keyboard: false,
        backdrop: 'static'
    });
    btn_update.forEach(element => {
        element.addEventListener('click', (e) => {
            var id = element.getAttribute("data-id");
            var id_exam = element.getAttribute("data-exam");
            var action = element.getAttribute("data-action");
            let xhr = new XMLHttpRequest();
            xhr.open("GET", `{{getenv("APP_URL")}}exam/${id_exam}/activities/${id}`);
            xhr.responseType = "json";
            xhr.send();
            xhr.onload = function(){
                if (xhr.status != 200){
                    alert("Erreur " + xhr.status + " : " + xhr.statusText);
                }else{
                    data = xhr.response;
                    document.getElementById("edit_activitieLabel").innerHTML = "Modifier une activité de l'examen : " + data.exams.label;
                    document.querySelector("#edit_activitie [name='label']").value = data.activities.label;
                    document.querySelector("#edit_activitie [name='duration']").value = `${tranform_hours(data.duration)}`;
                    document.querySelector("#edit_activitie [name='order']").value = data.order;
                    var formulaire = document.querySelector("#edit_activitie [method='post'");
                    formulaire.setAttribute("action", `{{getenv("APP_URL")}}exam/${id_exam}/activities/${id}/update`);
                    modal_update.show();
                }
            };
            xhr.onerror = function(){
                alert("La requête a échoué");
            };
        })
    })
</script>

@endsection
{{-- value="{{date("H:i", mktime(0,$activitie->pivot->duration)) }}" --}}
