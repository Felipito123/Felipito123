
function verificarCamposVacioFormulario() {
    var formulario = document.getElementById("formuRSF");
    formulario.rut.value = formulario.rut.value.toUpperCase();
    var usuario = formulario.rut.value;
    while (usuario.indexOf(".") != -1) {
        usuario = usuario.replace(".", "");
    }
    usuario = usuario.replace("-", "");
    /*document.getElementById("login").rut.value=usuario;*/
    var rut = usuario.substring(0, usuario.length - 1);
    var digitoVerificador = usuario.substring(usuario.length - 1, usuario.length);

    for (i = 0; i < rut.length; i++) {
        if (!((rut.charAt(i) >= "0") && (rut.charAt(i) <= "9"))) {
            toastr.error("El valor ingresado no corresponde a un RUT válido");
            return false;
        }
    }
    if (rut > 50000000) {
        toastr.error("El valor ingresado no corresponde a un RUT válido");
        return false;
    }
    if (usuario == "") {
        toastr.error("Debe ingresar un RUT");
        return false;
    } else if (usuario == "") {
        toastr.error("Ingrese RUT");
        return false;
    } else if (digitoVerificador != calcularDigitoVerificadorRUT(rut)) {
        toastr.error("Ingrese un RUT válido");
        return false;
    } else {
        console.log("Rut correcto");
    }
}

function calcularDigitoVerificadorRUT(strRutSinDv) {
    var lengthRut = strRutSinDv.length;
    var lngSumaTotal = calculaSumaRut(strRutSinDv, lengthRut);
    /* var intRestoSumaTotal = 11 - (lngSumaTotal mod 11); */
    var intRestoSumaTotal = 11 - (lngSumaTotal % 11);
    var strDVCalculado;

    switch (intRestoSumaTotal) {
        case 10: {
            strDVCalculado = "K";
            break
        }
        case 11: {
            strDVCalculado = "0";
            break
        }
        default: {
            strDVCalculado = "" + intRestoSumaTotal;
            break
        }
    }
    return strDVCalculado;
}

function calculaSumaRut(strRut, lngRut) {
    var sumaRut;
    if (lngRut == 0) {
        sumaRut = 0;
    } else {
        var i = strRut.length - lngRut + 2;
        if (i >= 8) {
            i = i - 6;
        }
        var a = strRut.substr(lngRut - 1, 1);
        var lngSumParcial = a * i;
        sumaRut = lngSumParcial + calculaSumaRut(strRut, lngRut - 1);
    }
    return sumaRut;
}

function formatoRut() {
    var formulario = document.getElementById("formuRSF");
    var sRut1 = formulario.rut.value.toUpperCase();
    sRut1 = quitarEspacios(sRut1);
    // var sRut1 = rut.value;
    // contador para saber cuando insertar el . o la -
    var nPos = 0;

    // Guarda el rut invertido con los puntos y el guión agregado
    var sInvertido = "";

    // Guarda el resultado final del rut como debe ser
    var sRut = "";
    while (sRut1.indexOf(".") != -1) {
        sRut1 = sRut1.replace(".", "");
    }
    sRut1 = sRut1.replace("-", "");

    for (var i = sRut1.length - 1; i >= 0; i--) {
        sInvertido += sRut1.charAt(i);
        // console.log("Invertido1: " + sInvertido);
        if (i == sRut1.length - 1)
            sInvertido += "-";
        else if (nPos == 3) {
            sInvertido += ".";
            nPos = 0;
        }
        nPos++;
    }

    for (var j = sInvertido.length - 1; j >= 0; j--) {
        if (sInvertido.charAt(sInvertido.length - 1) != ".")
            sRut += sInvertido.charAt(j);
        else if (j != sInvertido.length - 1)
            sRut += sInvertido.charAt(j);

    }
    // Pasamos al campo el valor formateado
    // rut.value = sRut.toUpperCase();
    document.getElementById("formuRSF").rut.value = sRut.toUpperCase();

}

function quitarEspacios(rut) {
    var i = 0;
    // alertify.success("quitar espacios");
    while (rut.length > i) {
        if ((rut.substring(i, i + 1) == " ") || (rut.codePointAt(i) == 173)) {
            rut = rut.substring(0, i) + rut.substring(i + 1, rut.length);
        } else {
            i = i + 1;
        }
    }
    return rut;
}

function rut(value) {
    var sRut1 = value;
    while (sRut1.indexOf(".") != -1) {
        sRut1 = sRut1.replace(".", "");
    }
    sRut1 = sRut1.replace("-", "");
    if (sRut1.length > 9) {
        $('#rut').val("");
        // alertify.success("Longitud mayor a 9");
    } else {
        var str = value.substring(value.length - 1, value.length);
        if (str != "0" && str != "1" && str != "2" && str != "3" && str != "4" && str != "5" &&
            str != "6" && str != "7" && str != "8" && str != "9" && str != "K" && str != "k") {
            $('#rut').val("");
            // alertify.success("v1");
        }
    }

}

function esRutLogin(evt) {
    var charCode = getCharCode(evt);
    if (charCode == 0 || largo(evt)) {
        return esRUT(evt);
    }
    return false;
}

function largo(evt) {
    var formulario = document.getElementById("formuRSF");
    var sRut1 = formulario.rut.value.toUpperCase();
    while (sRut1.indexOf(".") != -1) {
        sRut1 = sRut1.replace(".", "");
    }
    sRut1 = sRut1.replace("-", "");
    if (sRut1.length < 9) {
        return true;
    }
    return false;
}