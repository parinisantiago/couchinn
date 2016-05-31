function valNumTar(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-nroTarjeta").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-nroTarjeta").innerHTML = "debe completar este campo";

    }else if ( /[\- 0-9]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-nroTarjeta").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-nroTarjeta").innerHTML = "El numero no puede poseer letras ni simbolos";

    } else if ( text.value.length != 16) {
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-nroTarjeta").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-nroTarjeta").innerHTML = "El numero debe ser de 16 digitos";
        
    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-nroTarjeta").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-nroTarjeta").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valNomHos(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-nomTipo").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-nomTipo").innerHTML = "debe completar este campo";

    }else if ( /[A-Za-z áéíóúàèìòùñ]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-nomTipo").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-nomTipo").innerHTML = "El nombre del tipo no puede poseer numeros ni simbolos";

    } else {
        return(true);
    }
    return(false);
}

function valNom(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-nom").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-nom").innerHTML = "Debe completar este campo";

    }else if ( /[A-Za-z áéíóúàèìòùñ]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-nom").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-nom").innerHTML = "Su nombre no puede poseer numeros ni simbolos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-nom").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-nom").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valAp(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");

        document.getElementById("glyphicon-ap").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-ap").innerHTML = "debe completar este campo";

    }else if (/[A-Za-z áéíóúàèìòùñ]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-ap").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-ap").innerHTML = "su apellido no puede contener numeros ni simbolos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Puto el que lee */
        document.getElementById("glyphicon-ap").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-ap").innerHTML = " ";
        return(true);
    }
    return(false);
}


function valPass(pass, confirmation) {
    if (pass.value.length == 0){
        pass.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-pass").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-pass").innerHTML = "debe completar este campo";
    } else if (pass.value != confirmation.value){
        pass.parentNode.setAttribute("class", "form-group has-error has-feedback");
        confirmation.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-pass").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-pass").innerHTML = "las contrasenas no coinciden";
    } else if(/[()[\]{};<>="']/.test(pass.value)){
        pass.parentNode.setAttribute("class", "form-group has-error has-feedback");

        document.getElementById("glyphicon-pass").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-pass").innerHTML = "su contrasena no puede contener caracteres especiales";
    } else {
        pass.parentNode.setAttribute("class", "form-group has-success has-feedback");
        confirmation.parentNode.setAttribute("class", "form-group has-success has-feedback");
        document.getElementById("glyphicon-pass").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-pass").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valEmail(email, confirmation) { /*agregarle una expresion regular*/
    if (email.value.length == 0){
        email.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-email").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-email").innerHTML = "debe completar este campo";
    } else if (email.value != confirmation.value){
        email.parentNode.setAttribute("class", "form-group has-error has-feedback");
        confirmation.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-email").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-email").innerHTML = "los campos de email no coinciden";
    } else if(!/.+@.+/.test(email.value) ){
        email.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-email").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-email").innerHTML = "escriba un formato valido de email";
    } else {
        email.parentNode.setAttribute("class", "form-group has-success has-feedback");
        confirmation.parentNode.setAttribute("class", "form-group has-success has-feedback");
        document.getElementById("glyphicon-email").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-email").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valDate(date){
    if (date.value.length == 0){
        date.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-fNac").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-fNac").innerHTML = "debe completar este campo";
    } else if (/\d{4}\/\d{2}\/\d{2}/.test(date.value)) {
        date.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-fNac").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-fNac").innerHTML = "el formato de fecha no es valido, debe ser YYYY-MM-DD";
    } else{
        date.parentNode.setAttribute("class", "form-group has-success has-feedback");
        document.getElementById("glyphicon-fNac").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-fNac").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valTel(number){
    if (number.value.length == 0) {
        number.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-num").setAttribute("class", "glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-num").innerHTML = "debe completar este campo";
    }else if(/[\+\- 0-9]+/.exec(number.value) != number.value){
        number.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-num").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-num").innerHTML = "el formato de telefono no es valido";
    } else {
        number.parentNode.setAttribute("class", "form-group has-success has-feedback");
        document.getElementById("glyphicon-num").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-num").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valUsuario(){
    var boolNom = valNom(document.getElementById("nomUser"));
    var boolAp = valAp(document.getElementById("apUser"));
    var boolPass = valPass(document.getElementById("passUser"), document.getElementById("rePassUser"));
    var boolEmail = valEmail(document.getElementById("emailUser"), document.getElementById("reEmailUser"));
    var boolFnac = valDate(document.getElementById("fNacUser"));
    var boolTel =    valTel(document.getElementById("numUser"));
    return ( boolNom && boolAp && boolPass && boolEmail && boolFnac && boolTel );
}

function valTipoHospedaje(){
    var boolNom = valNomHos(document.getElementById("nomTipo"));
    return ( boolNom );
}

function valCodigoSeguridadTarjeta(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-codSeguridad").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-codSeguridad").innerHTML = "debe completar este campo";

    }else if ( /[\- 0-9]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-codSeguridad").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-codSeguridad").innerHTML = "El numero no puede poseer letras";
    }else if( text.value.length != 3){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-codSeguridad").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-codSeguridad").innerHTML = "El codigo debe ser un numero de 3 digitos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-codSeguridad").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-codSeguridad").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valCodPost(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-codPostal").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-codPostal").innerHTML = "debe completar este campo";

    }else if ( /[\- 0-9]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-codPostal").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-codPostal").innerHTML = "El numero no puede poseer letras";
    }else if( text.value.length != 4){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-codPostal").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-codPostal").innerHTML = "El codigo debe ser un numero de 4 digitos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-codPostal").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-codPostal").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valFechaCaducidad(date){
    if (date.value.length == 0){
        date.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-fNac").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-fNac").innerHTML = "debe completar este campo";
    } else if (/\d{4}\/\d{2}\/\d{2}/.test(date.value)) {
        date.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-fNac").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-fNac").innerHTML = "el formato de fecha no es valido, debe ser YYYY-MM-DD";
    } else{
        date.parentNode.setAttribute("class", "form-group has-success has-feedback");
        document.getElementById("glyphicon-fNac").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-fNac").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valTitular(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-titular").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-titular").innerHTML = "Debe completar este campo";

    }else if ( /[A-Za-z áéíóúàèìòùñ]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-titular").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-titular").innerHTML = "Su nombre no puede poseer numeros ni simbolos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-titular").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-titular").innerHTML = " ";
        return(true);
    }
    return(false);
}
function valDir(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-direccion").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-direccion").innerHTML = "Debe completar este campo";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-direccion").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-direccion").innerHTML = " ";
        return(true);
    }
    return(false);
}
function valCiu(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-ciudad").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-ciudad").innerHTML = "Debe completar este campo";

    }else if ( /[A-Za-z áéíóúàèìòùñ]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-ciudad").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-ciudad").innerHTML = "Su nombre no puede poseer numeros ni simbolos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-ciudad").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-ciudad").innerHTML = " ";
        return(true);
    }
    return(false);
}
function valProv(text){
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-provincia").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-provincia").innerHTML = "Debe completar este campo";

    }else if ( /[A-Za-z áéíóúàèìòùñ]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-provincia").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-provincia").innerHTML = "Su nombre no puede poseer numeros ni simbolos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-provincia").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-provincia").innerHTML = " ";
        return(true);
    }
    return(false);
}

function valNumTarjeta() {
    var boolNum= valNumTar(document.getElementById("nroTarjeta"));
    var boolFC= valFechaCaducidad(document.getElementById("fechaCaducidad"));
    var boolCD= valCodigoSeguridadTarjeta(document.getElementById("codSeguridad"));
    var boolNom= valTitular(document.getElementById("titular"));
    var boolDir= valDir(document.getElementById("direccion"));
    var boolCiu= valCiu(document.getElementById("ciudad"));
    var boolProv= valProv(document.getElementById("provincia"));
    var boolCP= valCodPost(document.getElementById("codPostal"));
    return ( boolNum && boolFC && boolCD && boolNom && boolDir && boolCiu && boolProv && boolCP );
}

function valAdmin() {
    var boolPass = valPass(document.getElementById("passUser"), document.getElementById("rePassUser"));
    var boolEmail = valEmail(document.getElementById("emailUser"), document.getElementById("reEmailUser"));
    return ( boolPass && boolEmail );
}
function valRecuperarContraseña(){
    var boolEmail = valEmail(document.getElementById("emailUser"), document.getElementById("reEmailUser"));
    return (boolEmail);
}