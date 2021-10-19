
function validarcorreo(parametrodelcorreo) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(parametrodelcorreo);
}

function esunnumero(valor) {
    var re = /^\d+$/;
    return re.test(valor);
}

function esunrut(valor) { // sólo puede contener la k
    // var re = /^(?:\d+)(?:\k)?$/;
    var re = /^(\d+)(\k|K)?$/;
    return re.test(valor);
}

function esunvideo(valor) { // sólo puede ser .mp4
    var re = /\.(mp4)$/;
    return re.test(valor);
}

function esunaimagen(valor) {
    var re = /\.(jpg|png|jpe?g)$/; // sólo puede ser .jpg, png, jpeg
    return re.test(valor);
}

function essolotexto(valor) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    return regex.test(valor);
}


function validaLaUrl(parametro) {
    var variable = new RegExp("^(http?:\\/\\/(www\\.)?|https:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?");//http[s]?:\\/\\/(www\\.)?|localhost
    return variable.test(parametro);
}

//console.log(arreglo([1, 2, 3, 4]));
function validavacioynulo(vane) {
    var valor = false;
    for (let i = 0; i < vane.length; i++) {
        if (vane[i] === '' || vane[i] === null) {
            valor = true;
        }
    }
    return valor;
}

function validaimagen(valor) {
    var variable = false;
    for (var i = 0; i < valor.length; i++) {
        if (!esunaimagen(valor[i].name)) {
            //console.log(valor[i].name+ " no es una imagen");
            var variable = true;
        }
    }
    return variable;
}

function isAlphaNumeric(c) {
    const CHAR_CODE_A = 65;
    const CHAR_CODE_Z = 90;
    const CHAR_CODE_AS = 97;
    const CHAR_CODE_ZS = 122;
    const CHAR_CODE_0 = 48;
    const CHAR_CODE_9 = 57;

    let code = c.charCodeAt(0);

    if (
        (code >= CHAR_CODE_A && code <= CHAR_CODE_Z) ||
        (code >= CHAR_CODE_AS && code <= CHAR_CODE_ZS) ||
        (code >= CHAR_CODE_0 && code <= CHAR_CODE_9)
    ) {
        return true;
    }

    return false;
}

function isAlphaNumericString(s) {
    for (let i = 0; i < s.length; i++) {
        if (!isAlphaNumeric(s[i])) {
            return false;
        }
    }

    return true;
}

//========================REESTRINGE LO QUE EL USUARIO DEBE TECLEAR======================================//
function sololetras(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóúÁÉÍÓÚ ";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function sololetrasycomillasimple(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóúÁÉÍÓÚ '";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function solocorreo(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@."; //no son válidos los caracteres áéíóúÁÉÍÓÚñ
    especiales = "8-37-38-39-46-164";
    teclado_especial = false;

    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function sololetrasynumeros(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789 ";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function validabannervideos(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789# ";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function dosis(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789 ,./";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function solodireccion(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚáéíóú0123456789-°#, ";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function solotelefono(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "1234567890+-";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function fecha(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú´0123456789, ";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function validacontrasena(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789.,:;!?$()_áéíóúÁÉÍÓÚ";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function solorut(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "1234567890kK";
    especiales = "8-37-38-39-46-164";
    teclado_especial = false;

    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function soloconletrasypuntos(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "1234567890kK-.";
    especiales = "8-37-38-39-46-164";
    teclado_especial = false;

    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function solonumeros(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function diasVacaciones(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function numeroSinCero(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "123456789";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function sololink(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789.:-/&=%?_";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function soloCaractDeConversacion(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789áéíóúÁÉÍÓÚ() _-.,:;!¿?%$/";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}


function soloSoporteTecnico(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789áéíóúÁÉÍÓÚ() _-.,:;¡!¿?%$/";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function soloNombreMaterialBodega(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789áéíóúÁÉÍÓÚ -./()";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function soloAsunto(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789áéíóúÁÉÍÓÚ() .,:;¡!¿?%$/";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

//========================REESTRINGE LO QUE EL USUARIO DEBE TECLEAR======================================//


function fechazoom(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789-";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function fechausuarios(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789-";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function horazoom(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789:";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function fechaEventos(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789-";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function fechaLibroRSF(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789/";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function horaEventos(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789:";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function limpiabuscador(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = " ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú'"; //es lo que se permite en el input cuando se presiona el teclado (keypress)
    especiales = "8-37-38-39-46-164";
    teclado_especial = false;

    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function colorEventos(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFabcdef0123456789#";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function fechavacaciones(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789-";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}

function comprobarRUT(rutobtenido) {

    // alertify.success("asajka");
    //document.getElementById('rutpaciente')

    // Despejar Puntos
    var valor = rutobtenido.value.replace('.', '');

    // valor = rutobtenido.value.trim(); //Quito los espacios en blanco al principio y al final de la cadena, esto ya que en el celular la validacion en keyup no funciona

    // Despejar Guión
    valor = valor.replace('-', '');


    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    // rutobtenido.value = cuerpo + '-' + dv;

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 7) {
        rutobtenido.setCustomValidity("RUT Incompleto");
        return false;
    }

    if (/\s/.test(rutobtenido.value)) {
        // Compruebo en caso que contenga espacios
        rutobtenido.setCustomValidity("RUT sin espacios");
        return false;
    }

    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {

        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);

        // Sumar al Contador General
        suma = suma + index;

        // Consolidar Múltiplo dentro del rango [2,7]
        if (multiplo < 7) {
            multiplo = multiplo + 1;
        } else {
            multiplo = 2;
        }

    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
        rutobtenido.setCustomValidity("RUT Inválido");
        return false;
    }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rutobtenido.setCustomValidity('');
}