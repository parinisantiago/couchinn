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
    document.getElementById("nroTarjeta").focus();
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
    document.getElementById("nomTipo").focus();
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
    document.getElementById("nomUser").focus();
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
    document.getElementById("apUser").focus();
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
    document.getElementById("passUser").focus();
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
    document.getElementById("emailUser").focus();
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
    document.getElementById("fNacUser").focus();
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
    document.getElementById("numUser").focus();
    return(false);
}

function valUsuario(){
    var boolTel =    valTel(document.getElementById("numUser"));
    var boolFnac = valDate(document.getElementById("fNacUser"));
    var boolEmail = valEmail(document.getElementById("emailUser"), document.getElementById("reEmailUser"));
    var boolPass = valPass(document.getElementById("passUser"), document.getElementById("rePassUser"));
    var boolAp = valAp(document.getElementById("apUser"));
    var boolNom = valNom(document.getElementById("nomUser"));
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
    document.getElementById("codSeguridad").focus();
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
    document.getElementById("codPostal").focus();
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
    document.getElementById("fNac").focus();
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
    document.getElementById("titular").focus();
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
    document.getElementById("direccion").focus();
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
    document.getElementById("ciudad").focus();
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
    document.getElementById("provincia").focus();
    return(false);
}

function valNumTarjeta() {
    var boolCP= valCodPost(document.getElementById("codPostal"));
    var boolProv= valProv(document.getElementById("provincia"));
    var boolCiu= valCiu(document.getElementById("ciudad"));
    var boolDir= valDir(document.getElementById("direccion"));
    var boolNom= valTitular(document.getElementById("titular"));
    var boolCD= valCodigoSeguridadTarjeta(document.getElementById("codSeguridad"));
    var boolFC= valFechaCaducidad(document.getElementById("fechaCaducidad"));
    var boolNum= valNumTar(document.getElementById("nroTarjeta"));
    return ( boolNum && boolFC && boolCD && boolNom && boolDir && boolCiu && boolProv && boolCP );
}

function valAdmin() {
    var boolPass = valPass(document.getElementById("passUser"), document.getElementById("rePassUser"));
    var boolEmail = valEmail(document.getElementById("emailUser"), document.getElementById("reEmailUser"));
    return ( boolPass && boolEmail );
}

function valEmailRec(email) { /*agregarle una expresion regular*/
    if (email.value.length == 0){
        email.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-email").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-email").innerHTML = "debe completar este campo";
    } else if(!/.+@.+/.test(email.value) ){
        email.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-email").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-email").innerHTML = "escriba un formato valido de email";
    } else {
        email.parentNode.setAttribute("class", "form-group has-success has-feedback");
        document.getElementById("glyphicon-email").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-email").innerHTML = " ";
        return(true);
    }
    document.getElementById("emailRec").focus();
    return(false);
}

function valRecuperarContrasena(){
   var boolEmail = valEmailRec(document.getElementById("emailRec"))
    return (boolEmail);
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function isLetterKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode >= 65 && charCode <= 90)
        || (charCode >= 97 && charCode <= 122)
        || (charCode == 209 || charCode == 241)
        || (charCode == 32))
        return true;  
    return false;
}

function isLetterKeyUb(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode >= 65 && charCode <= 90)
        || (charCode >= 97 && charCode <= 122)
        || (charCode == 209 || charCode == 241)
        || (charCode == 32)
        || (charCode == 44)
        || (charCode == 46))
        return true;  
    return false;
}

function deshabilitar(){
    document.getElementById("Despublicar").disabled = true;
}

function fechasReserva(){
    if (document.getElementById("fIng").value > document.getElementById("fEgre").value){
        document.getElementById("helpBlock-fEgre").innerHTML = "No se pudo enviar su solicitud, la fecha de egreso <br> debe ser posterior a la fecha de ingreso.";
        return false;
    }   
    return true;
}

function valCapCouch(text)
{
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-capCouch").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-capCouch").innerHTML = "Debe completar este campo";

    }else if ( /[\- 0-9]+/.exec(text.value) != text.value){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-capCouch").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-capCouch").innerHTML = "El numero no puede poseer letras ni simbolos";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-capCouch").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-capCouch").innerHTML = " ";
        return(true);
    }
    document.getElementById("capCouch").focus();
    return(false);
    
}
function valTitCouch(text)
{
    var tieneDobleEspacio = text.value.indexOf("  ") > -1;
    if( text.value.length == 0){
        text.parentNode.setAttribute("class", "form-group has-warning has-feedback");
        document.getElementById("glyphicon-titCouch").setAttribute("class","glyphicon glyphicon-warning-sign form-control-feedback");
        document.getElementById("helpBlock-titCouch").innerHTML = "Debe completar este campo";

    }else if (tieneDobleEspacio){
        text.parentNode.setAttribute("class", "form-group has-error has-feedback");
        document.getElementById("glyphicon-titCouch").setAttribute("class","glyphicon glyphicon-remove form-control-feedback");
        document.getElementById("helpBlock-titCouch").innerHTML = "El titulo no puede tener mas de un espacio entre palabras";

    } else {
        text.parentNode.setAttribute("class", "form-group has-success has-feedback"); /* Los pollitos cantan pio pio pio*/
        document.getElementById("glyphicon-titCouch").setAttribute("class","glyphicon glyphicon-ok form-control-feedback");
        document.getElementById("helpBlock-titCouch").innerHTML = " ";
        return(true);
    }
    document.getElementById("titCouch").focus();
    return(false);
}
function valCantFotos(inFile){
    if (inFile.files.length > 3){
         document.getElementById("glyphicon-imgCouch").setAttribute("class","glyphicon glyphicon-warning-sig form-control-feedback");
        document.getElementById("helpBlock-imgCouch").innerHTML = "Se pueden subir 3 fotos como máximo";
        return false;
    }
}

function valCantFotosMod(inFile, cantFotos){
    var aux = 3 - cantFotos;
    if (inFile.files.length + cantFotos > 3){
         document.getElementById("glyphicon-imgCouch").setAttribute("class","glyphicon glyphicon-warning-sig form-control-feedback");
        document.getElementById("helpBlock-imgCouch").innerHTML = "Se pueden subir " + aux + " fotos como máximo, usted posee " + cantFotos + ".El maximo es 3";
        return false;
    }
}

function valCouch()
{
    return valTitCouch(document.getElementById("titCouch")) && valCapCouch(document.getElementById("capCouch")) && valCantFotos(document.getElementById("imgCouch"));
}

function valCouchMod(cantFotos)
{
    return valTitCouch(document.getElementById("titCouch")) && valCapCouch(document.getElementById("capCouch")) && valCantFotosMod(document.getElementById("imgCouch"), cantFotos);
}


function valFechasListado(){
    if (document.getElementById("finicio").value > document.getElementById("ffin").value){
        document.getElementById("helpBlock-ffin").innerHTML = "No se pudo generar el listado, compruebe las fechas ingresadas.";
        return false;
    }   
    return true;
}
