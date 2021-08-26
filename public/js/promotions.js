//Validation rules
let validator;

const promotion_validator = (formulaire_id) => {
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
const btn_submit_create = document.getElementById("create_promotion_button");
btn_submit_create.addEventListener("click", (e) => {
    e.preventDefault();
    promotion_validator("form_create_promotion");
    if($("#form_create_promotion").valid()){
        validator.destroy();
        $("#form_create_promotion").submit();
    }
})


//Gestion du modal update
const btn_update = document.querySelectorAll("[data-action='update']");
const btn_submit_update = document.getElementById("update_promotion_button");
const modal_update = new bootstrap.Modal(document.getElementById('edit_promotion'), {
    keyboard: false,
    backdrop: 'static'
});
var id_promotion = null;
btn_update.forEach(element => {
    element.addEventListener('click', (e) => {
        id_promotion = element.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}promotion/${id_promotion}/infos`);
        // console.log(`${url}promotion/${id_promotion}`);
        xhr.responseType = "json";
        xhr.send();
        xhr.onload = function(){
            if (xhr.status != 200){
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
            }else{
                var data = xhr.response;
                console.log(data);
                document.getElementById("edit_promotionLabel").innerHTML = "Modifier la promotion : " + data.label;
                document.querySelector("#edit_promotion [name='label']").value = data.label;
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
    promotion_validator("form_update_promotion");
    if($("#form_update_promotion").valid()){
        var formulaire = document.querySelector("#edit_promotion [method='post'");
        formulaire.setAttribute("action", `${url}promotion/${id_promotion}/update`);
        validator.destroy();
        $("#form_update_promotion").submit();
    }
})
