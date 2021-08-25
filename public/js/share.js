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
