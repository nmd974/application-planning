//Validation rules
let validator;
const users_validator = (formulaire_id) => {
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
            first_name:{
                required: true,
                minlength: 3,
                maxlength: 255
            },
            last_name:{
                required: true,
                minlength: 3,
                maxlength: 255
            },
            birthday:{
                required: true,
                "regex": /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/,
            },
        }

    })
}


//Gestion du modal create
//SUBMIT Create
const btn_submit_create = document.getElementById("create_user_button");
btn_submit_create.addEventListener("click", (e) => {
    e.preventDefault();
    users_validator("form_create_user");
    if($("#form_create_user").valid()){
        $("#form_create_user").submit();
    }
})


//Gestion du modal update
const btn_update = document.querySelectorAll("[data-action='update']");
const btn_submit_update = document.getElementById("update_user_button");
const modal_update = new bootstrap.Modal(document.getElementById('edit_user'), {
    keyboard: false,
    backdrop: 'static'
});
var id_user_update = null;
btn_update.forEach(element => {
    element.addEventListener('click', (e) => {
        id_user_update = element.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("GET",`${url}user/${id_user_update}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                console.log(data);
                document.getElementById("edit_userLabel").innerHTML = "Modifier l'utilisateur : " +  data.first_name + " " + data.last_name;
                document.querySelector("#edit_user [name='last_name']").value = data.last_name;
                document.querySelector("#edit_user [name='first_name']").value = data.first_name;
                document.querySelector("#edit_user [name='email']").value = data.email;
                document.querySelector("#edit_user [name='birthday']").value = data.birthday;
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
    users_validator("form_update_user");
    if($("#form_update_user").valid()){
        var formulaire = document.querySelector("#edit_user [method='post'");
        formulaire.setAttribute("action", `${url}eleve/update/${id_user_update}`);
        $("#form_update_user").submit();
    }
})


//Gestion du modal delete
const btn_delete = document.querySelectorAll("[data-action='delete']");
const modal_delete = new bootstrap.Modal(document.getElementById('delete_user'), {
    keyboard: false,
    backdrop: 'static'
});
btn_delete.forEach(element => {
    element.addEventListener('click', (e) => {
        id_user_update = element.getAttribute("data-id");
        console.log(id_user_update);
        var id_promo = element.getAttribute("data-promotion");

        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}user/${id_user_update}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                document.getElementById("text_confirmation").innerHTML = "Confirmez vous la suppression du l'utilisateur : " + data.first_name + " " + data.last_name
                var formulaire = document.querySelector("#delete_user [method='post'");
                formulaire.setAttribute("action", `${url}eleve/${id_user_update}/promotion/${id_promo}/delete`);
                modal_delete.show();
            }
        };
        xhr.onerror = function(){
            alert("La requête a échoué");
        };
    })
})


//Gestion de l'envoie de mail en AJAX
const btn_send = document.querySelectorAll("[data-action='send_email']");
const modal_send = new bootstrap.Modal(document.getElementById('send_mail_user'), {
    keyboard: false,
    backdrop: 'static'
});
btn_send.forEach(element => {
    element.addEventListener('click', (e) => {
        id_user_update = element.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}user/${id_user_update}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                document.getElementById("text_confirmation_send_mail").innerHTML = "Confirmez vous l'envoie du mail à : " + data.first_name + " " + data.last_name
                var formulaire = document.querySelector("#send_mail_user [method='get'");
                formulaire.setAttribute("action", `${url}contact/student/${id_user_update}`);
                modal_send.show();
            }
        };
        xhr.onerror = function(){
            alert("La requête a échoué");
            console.log(xhr);
        };
    })
})
