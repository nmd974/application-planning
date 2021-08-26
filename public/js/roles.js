//Validation rules
let validator;
const roles_validator = (formulaire_id) => {
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
            }
        }

    })
}


//Gestion du modal create
//SUBMIT Create
const btn_submit_create = document.getElementById("create_role_button");
btn_submit_create.addEventListener("click", (e) => {
    e.preventDefault();
    roles_validator("form_create_role");
    if($("#form_create_role").valid()){
        $("#form_create_role").submit();
    }
})


//Gestion du modal update
const btn_update = document.querySelectorAll("[data-action='update']");
const btn_submit_update = document.getElementById("update_role_button");
const modal_update = new bootstrap.Modal(document.getElementById('edit_role'), {
    keyboard: false,
    backdrop: 'static'
});
var id_role_update = null;
btn_update.forEach(element => {
    element.addEventListener('click', (e) => {
        id_role_update = element.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("GET",`${url}role/${id_role_update}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                console.log(data);
                document.getElementById("edit_roleLabel").innerHTML = "Modifier le rôle : " + data.label;
                document.querySelector("#edit_role [name='label']").value = data.label;
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
    roles_validator("form_update_role");
    if($("#form_update_role").valid()){
        var formulaire = document.querySelector("#edit_role [method='post'");
        formulaire.setAttribute("action", `${url}role/update/${id_role_update}`);
        $("#form_update_role").submit();
    }
})


//Gestion du modal delete
const btn_delete = document.querySelectorAll("[data-action='delete']");
const modal_delete = new bootstrap.Modal(document.getElementById('delete_role'), {
    keyboard: false,
    backdrop: 'static'
});
btn_delete.forEach(element => {
    element.addEventListener('click', (e) => {
        id_role_update = element.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}role/${id_role_update}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                document.getElementById("text_confirmation").innerHTML = "Confirmez vous la suppression du role : " + data.label
                var formulaire = document.querySelector("#delete_role [method='post'");
                formulaire.setAttribute("action", `${url}role/delete/${id_role_update}`);
                modal_delete.show();
            }
        };
        xhr.onerror = function(){
            alert("La requête a échoué");
        };
    })
})
