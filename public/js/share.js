$(document).ready(function (){
    $("#sidebar-toggle").click(function (e) {
        $("#wrapper").toggleClass("toggled");
        $("#starting-page").toggleClass("toggled");
        $('#sidebar-toggle').toggleClass('fa-close');
        $('#sidebar-toggle').toggleClass('fa-bars');
    });
    $('html').css('overflow-y', 'scroll');
    $('#loader_wrapper').remove();
})
var toast = new bootstrap.Toast(document.getElementById('liveToast'))
toast.show();

//******************************************************************* */
//REGLES COMMUNES VALIDATOR
//******************************************************************* */

//Methode verification des regex
jQuery.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        if (regexp.constructor != RegExp)
        regexp = new RegExp(regexp);
        else if (regexp.global)
        regexp.lastIndex = 0;
        return this.optional(element) || regexp.test(value);
    },"Format incorrect"
);


//Modification des messages d'erreurs
jQuery.extend(jQuery.validator.messages, {
    required: "Ce champ est obligatoire",
    remote: "votre message",
    email: "Veuillez saisir une adresse email valide (ex: xxx.yyy@zzz.com)",
    url: "votre message",
    date: "Veuillez saisir une date conforme",
    dateISO: "Veuillez saisir une date conforme (jour/mois/annee)",
    number: "votre message",
    digits: "Seuls les chiffres sont autorisés",
    creditcard: "votre message",
    equalTo: "Les mots de passe sont différents",
    accept: "votre message",
    password: "mot passe incorrecte",
    maxlength: jQuery.validator.format("Ce champ doit contenir au moins {0} caractères."),
    minlength: jQuery.validator.format("{0} caractères minimum."),
    rangelength: jQuery.validator.format("{0} caractères min </br> {1} caractères maximum."),
    range: jQuery.validator.format("votre message  entre {0} et {1}."),
    max: jQuery.validator.format("Ce champ doit être inférieur ou égal à {0}."),
    min: jQuery.validator.format("Ce champ doit être supérieur ou égal à {0}.")
});

//Function transform time en js
const tranform_hours = (data) => {
    var nbHour = parseInt(data / 60);
    if(nbHour < 10){
        nbHour = "0" + nbHour.toString();
    }
    var nbminuteRestante = data % 60;
    if (nbminuteRestante == 0) {
        return nbHour + ":";
    } else {

        return nbHour + ":" + nbminuteRestante;
    }
}

const transform_hours_from_datetime = (data) => {
    return data.substr(11, 5);
}
const transform_date_from_datetime = (data) => {
    return data.substr(0,10);
}

function searchBar() {

    // Déclaration des variables et récupération des balises
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchbar');
    filter = input.value.toUpperCase();
    container = document.getElementById("container");
    tr = container.getElementsByTagName('tr');
    if (tr.length > 0) {
        cells = tr[1].getElementsByTagName('td').length;
    }

    //Si les élements recherchés e sont pas affichés via un tableau
    if (tr.length <= 0) {
        console.log('test');
        let element = document.querySelectorAll(".element");

        for (i = 0; i < element.length; i++) {
            a = element[i].getElementsByTagName("p")[0];
            txtValue = a.textContent || a.innerText;

            if (txtValue.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").indexOf(filter) > -1) {
                element[i].style.display = "";
            } else {
                element[i].style.display = "none";
            }
        }
    }
    else if (cells < 3){
        for (i = 0; i < tr.length; i++) {
            a = tr[i].getElementsByTagName("td")[0];
            txtValue = a.textContent || a.innerText;

            if (txtValue.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    else{
        for (i = 0; i < tr.length; i++) {
            a = tr[i].getElementsByTagName("td")[0];
            b = tr[i].getElementsByTagName("td")[1];
            c = tr[i].getElementsByTagName("td")[2];
            d = tr[i].getElementsByTagName("td")[3];

            txtValue0 = a.textContent.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || a.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            txtValue1 = b.textContent.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || b.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            txtValue2 = c.textContent.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || c.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            txtValue3 = d.textContent .toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "")|| d.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

            if (txtValue0.indexOf(filter) > -1 || txtValue1.indexOf(filter) > -1 || txtValue2.indexOf(filter) > -1 || txtValue3.indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
