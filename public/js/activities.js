//Validation rules
let validator;
const activities_validator = (formulaire_id) => {
    validator = $(`#${formulaire_id}`).validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            label:{
                required: true,
                minlength: 3,
                maxlength: 255
            },
            duration:{
                required: true,
                "regex": /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/,
            },
            order:{
                required: true,
                min: 1
            }
        }

    })
}


//Gestion du modal create
//Autocomplete
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
        xhr.open("GET", `${url}activities/${id}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                console.log("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
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
//SUBMIT Create
const btn_submit_create = document.getElementById("create_activitie_button");
btn_submit_create.addEventListener("click", (e) => {
    e.preventDefault();
    activities_validator("form_create_activitie");
    if($("#form_create_activitie").valid()){
        $("#form_create_activitie").submit();
    }
})


//Gestion du modal update
const btn_update = document.querySelectorAll("[data-action='update']");
const btn_submit_update = document.getElementById("update_activitie_button");
const modal_update = new bootstrap.Modal(document.getElementById('edit_activitie'), {
    keyboard: false,
    backdrop: 'static'
});
var id_exam = null;
var id_activitie_update = null;
btn_update.forEach(element => {
    element.addEventListener('click', (e) => {
        id_activitie_update = element.getAttribute("data-id");
        id_exam = element.getAttribute("data-exam");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}exam/${id_exam}/activities/${id_activitie_update}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                document.getElementById("edit_activitieLabel").innerHTML = "Modifier une activité de l'examen : " + data.exams.label;
                document.querySelector("#edit_activitie [name='label']").value = data.activities.label;
                document.querySelector("#edit_activitie [name='duration']").value = `${tranform_hours(data.duration)}`;
                document.querySelector("#edit_activitie [name='order']").value = data.order;
                modal_update.show();
            }
        };
        xhr.onerror = function(){
            alert("La requête a échoué");
        };
    })
})
//SUBMIT Update
btn_submit_update.addEventListener("click", (e) => {
    e.preventDefault();
    activities_validator("form_update_activitie");
    if($("#form_update_activitie").valid()){
        var formulaire = document.querySelector("#edit_activitie [method='post'");
        formulaire.setAttribute("action", `${url}exam/${id_exam}/activities/${id_activitie_update}/update`);
        $("#form_update_activitie").submit();
    }
})


//Gestion du modal delete
const btn_delete = document.querySelectorAll("[data-action='delete']");
const modal_delete = new bootstrap.Modal(document.getElementById('delete_activitie'), {
    keyboard: false,
    backdrop: 'static'
});
btn_delete.forEach(element => {
    element.addEventListener('click', (e) => {
        var id = element.getAttribute("data-id");
        var id_exam = element.getAttribute("data-exam");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}exam/${id_exam}/activities/${id}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                document.getElementById("text_confirmation").innerHTML = "Confirmez vous la suppression de l'activité : " + data.activities.label
                var formulaire = document.querySelector("#delete_activitie [method='post'");
                formulaire.setAttribute("action", `${url}exam/${id_exam}/activities/${id}/delete`);
                modal_delete.show();
            }
        };
        xhr.onerror = function(){
            alert("La requête a échoué");
        };
    })
})
