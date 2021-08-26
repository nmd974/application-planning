//Validation rules
let validator;

const exams_validator = (formulaire_id) => {
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
            start_time:{
                required: true,
                "regex": /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/,
            },
            start_date:{
                required: true,
                "regex": /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/,
            },
        }

    })
}


//Gestion du modal create
//SUBMIT Create
const btn_submit_create = document.getElementById("create_exam_button");
btn_submit_create.addEventListener("click", (e) => {
    e.preventDefault();
    exams_validator("form_create_exam");
    if($("#form_create_exam").valid()){
        validator.destroy();
        $("#form_create_exam").submit();
    }
})


//Gestion du modal update
const btn_update = document.querySelectorAll("[data-action='update']");
const btn_submit_update = document.getElementById("update_exam_button");
const modal_update = new bootstrap.Modal(document.getElementById('edit_exam'), {
    keyboard: false,
    backdrop: 'static'
});
var id_exam = null;
btn_update.forEach(element => {
    element.addEventListener('click', (e) => {
        id_exam = element.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}exam/${id_exam}`);
        // console.log(`${url}exam/${id_exam}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                console.log(data);
                document.getElementById("edit_examLabel").innerHTML = "Modifier l'examen : " + data.label;
                document.querySelector("#edit_exam [name='label']").value = data.label;
                document.querySelector("#edit_exam [name='start_time']").value = `${transform_hours_from_datetime(data.date_start)}`;
                document.querySelector("#edit_exam [name='start_date']").value = `${transform_date_from_datetime(data.date_start)}`;
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
    exams_validator("form_update_exam");
    if($("#form_update_exam").valid()){
        var formulaire = document.querySelector("#edit_exam [method='post'");
        formulaire.setAttribute("action", `${url}exam/${id_exam}/update`);
        validator.destroy();
        $("#form_update_exam").submit();
    }
})
// const btn_cancel = document.getElementById("cancel_button_update");
// btn_cancel.addEventListener("click", (e) => {
//     validator.destroy();
// })


//Gestion du modal delete
const btn_delete = document.querySelectorAll("[data-action='delete']");
const modal_delete = new bootstrap.Modal(document.getElementById('delete_exam'), {
    keyboard: false,
    backdrop: 'static'
});
btn_delete.forEach(element => {
    element.addEventListener('click', (e) => {
        var promotion_id = element.getAttribute("data-promotion");
        var id_exam = element.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}exam/${id_exam}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                data = xhr.response;
                document.getElementById("text_confirmation").innerHTML = "Confirmez vous la suppression de l'examen : " + data.label
                var formulaire = document.querySelector("#delete_exam [method='post'");
                formulaire.setAttribute("action", `${url}promotion/${promotion_id}/exams/${id_exam}/delete`);
                modal_delete.show();
            }
        };
        xhr.onerror = function(){
            alert("La requête a échoué");
        };
    })
})
