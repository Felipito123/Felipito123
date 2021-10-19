    /* LISTAS DUALES :: BEGIN */

    function esNumeroMaxLength(evt, input, maximo) {
        var charCode = getCharCode(evt);
        if (!esNumero(evt)) {
            return false;
        } else if (charCode == 0) {
            return true;
        } else if (document.getElementById(input).value.length >= maximo) {
            return false;
        }

        return true;
    }

    function compareOptionValues(a, b) {
        var sA = parseInt(a.value, 36);
        var sB = parseInt(b.value, 36);
        return sA - sB;
    }

    function compareOptionText(a, b) {
        var sA = parseInt(a.text, 36);
        var sB = parseInt(b.text, 36);
        return sA - sB;
    }

    function moveDualList(srcList, destList, moveAll, srcHiddenList, destHiddenList) {
        if ((srcList.selectedIndex == -1) && (moveAll == false)) {
            return;
        }
        newDestList = new Array(destList.options.length);
        var len = 0;
        for (len = 0; len < destList.options.length; len++) {
            if (destList.options[len] != null) {
                newDestList[len] = new Option(destList.options[len].text,
                    destList.options[len].value,
                    destList.options[len].defaultSelected,
                    destList.options[len].selected);
            }
        }
        for (var i = 0; i < srcList.options.length; i++) {
            if (srcList.options[i] != null &&
                (srcList.options[i].selected == true || moveAll)) {
                newDestList[len] = new Option(srcList.options[i].text,
                    srcList.options[i].value,
                    srcList.options[i].defaultSelected,
                    srcList.options[i].selected);
                len++;
            }
        }
        newDestList.sort(compareOptionValues); // BY VALUES
        for (var j = 0; j < newDestList.length; j++) {
            if (newDestList[j] != null) {
                destList.options[j] = newDestList[j];
            }
        }
        for (var i = srcList.options.length - 1; i >= 0; i--) {
            if (srcList.options[i] != null &&
                (srcList.options[i].selected == true || moveAll)) {
                srcList.options[i] = null;
                //srcList.remove(i);
            }
        }
        ordenarSelect(destList);
        setearCamposOcultos(srcHiddenList, srcList.options.length);
        setearCamposOcultos(destHiddenList, destList.options.length);
    }

    function ordenarSelect(elSelect) {
        items = elSelect.options;
        opciones = new Array();
        for (var a = 0; a < items.length; a++)
            //relleno y ordeno
            opciones[a] = new Array(items[a].text, items[a].value);
        opciones.sort(); // ordeno
        for (var a = 0; a < items.length; a++) { //sobreescribo
            items[a].text = opciones[a][0];
            items[a].value = opciones[a][1];
        }
    }

    function setearCamposOcultos(nombreDelCampo, valor) {
        nombreDelCampo.value = valor;
    }

    /* LISTAS DUALES :: END */

    /* VALIDACIONES :: BEGIN */

    function isNumberKeyOrCharKey(evt) {
        return (isNumberKey(evt) || esLetra(evt));
    }

    function esAlfanumerico(evt) {
        return (isNumberKey(evt) || esLetra(evt));
    }

    function esAlfanumericoSinEnieTildes(evt) {
        return (isNumberKey(evt) || esLetraSinEnieTildes(evt));
    }

    /* acepta nï¿½meros, letras y guiones */
    function esNumeroIdentificacion(evt) {
        return (isNumberKey(evt) || esLetra(evt) || isDash(evt));
    }

    /* nï¿½meros y punto decimal */
    function esImporte(evt) {
        return (isNumberKey(evt) || isDecimalPoint(evt));
    }

    function isNumberKey(evt) {
        var charCode = getCharCode(evt);
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function getCharCode(evt) {
        if (window.event) { // Internet Explorer
            return evt.keyCode;
        } else { // navegadores DOM
            return evt.charCode;
        }
    }

    function isDash(evt) {
        var charCode = getCharCode(evt);
        if (charCode != 45) {
            return false;
        }
        return true;
    }

    function isDecimalPoint(evt) {
        var charCode = getCharCode(evt);
        //if (charCode != 46){
        //Usamos coma como separador decimal
        if (charCode != 44) {
            return false;
        }
        return true;
    }

    function isNumberKeyOrDash(evt) {
        return isNumberKey(evt) || isDash(evt);
    }


    function esNumeroTel(evt) {
        /*var charCode = getCharCode(evt);
    if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode != 45 )
       return false;

    return true;*/

        return isNumberKeyOrDash(evt);
    }

    function esLetra(evt) {
        var charCode = getCharCode(evt);
        if (charCode > 32 && ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) && charCode != 225 && charCode != 233 && charCode != 237 &&
            charCode != 243 && charCode != 250 && charCode != 209 && charCode != 241)
            return false;

        return true;
    }

    function esLetraSinEnieTildes(evt) {

        var charCode = getCharCode(evt);
        if (charCode > 32 && ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) ||
            charCode == 209 || charCode == 241)
            return false;

        if (tieneTilde(evt))
            return false;


        return true;
    }

    function tieneTilde(evt) {

        var charCode = getCharCode(evt);
        if (charCode == 225 || charCode == 233 ||
            charCode == 237 || charCode == 243 || charCode == 250 ||
            charCode == 193 || charCode == 205 ||
            charCode == 201 || charCode == 211 || charCode == 218)
            return true;

        return false;
    }

    /**/
    function esNumero(evt) {
        var charCode = getCharCode(evt);
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    /* VALIDACIONES :: END */

    function isIE() {
        if (navigator.appName.indexOf("Microsoft") != -1) {
            return true;
        } else {
            return false;
        }
    }



    //-------------------------------------------------------------//
    //Funcion que obtiene la tecla presionada Crossbrowser
    function getKey(e) {
        if (isIE()) {
            key = window.event.keyCode; //IE
        } else {
            key = e.which; //firefox
        }
        return key;
    }

    //------------------------------------------------------------//
    //Submitea con la tecla enter
    //idBoton es el Id del submit que clickeara por defecto
    function enterKey(event, idBoton) {
        key = getKey(event);
        if (key == 13) {
            document.getElementById(idBoton).click();
            return false;
        }
    }

    function popUp(URL) {
        window.open(URL);
    }

    function capLock(e) {

        kc = e.keyCode ? e.keyCode : e.which;
        sk = e.shiftKey ? e.shiftKey : ((kc == 16) ? true : false);

        if (event.shiftKey == 1)
            sk = false; // si se tiene la tecla shift presionada junto a cualquier caracter.

        if (((kc >= 65 && kc <= 90) && !sk) || ((kc >= 97 && kc <= 122) && sk) || (kc == 209)) //209=ï¿½
            return false;
        else
            return true;
    }

    /* es rut */
    function esRUT(evt) {
        return (isNumberKey(evt) || isCharRut(evt));
    }

    function isCharRut(evt) {
        var charCode = getCharCode(evt);
        if (charCode != 107 && charCode != 75) {
            return false;
        }
        return true;
    }

    //Retorna true si el parametro permita la edicion de un texbox con contenido numerico. Esta funcion es soportado para eventos onkeydown
    function isNumericEditable(evt) {

        var keyCode = evt.keyCode;

        //48 && 57 entre 0 y 9
        //8 backspace
        //37 arrow left
        //39 arrow right
        //46 delete
        if ((keyCode > 47 && keyCode < 58) || keyCode == 8 || keyCode == 37 || keyCode == 39 || keyCode == 46) {

            return true;

        }

        return false;

    }

    //Retorna true si el parametro de entrada es numerico. Esta funcion es soportado para eventos onkeydown
    function isNumeric(evt) {

        var keyCode = evt.keyCode;

        //47 && 50 entre 0 y 9
        if (keyCode > 47 && keyCode < 58) {

            return true;

        }

        return false;

    }


    function validaEmail(evt) {
        tecla = (document.all) ? evt.keyCode : evt.which;
        if (validatecla(tecla, "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.-_abcdefghijklmnopqrstuvwxyz@") == false) {
            return false;
        }
        return true;
    }

    function validatecla(strtecla, strtextopermitido) {
        var swok = 0;
        if ((strtecla == 13) || (strtecla == 8) || (strtecla == 0)) {
            return (true);
        }

        for (var j = 0; j < strtextopermitido.length; j++) {
            charc = strtextopermitido.charCodeAt(j);
            if (charc == 1121)
                charc = 209;
            if (strtecla == charc) {
                swok++;
                break;
            }
        }

        if (strtecla > 128)
            return false;

        if (swok == 0)
            return (false);
        return (true);
    }

    function getClipboardDataData(event) {

        if (window.clipboardData && window.clipboardData.getData) { // IE
            var pastedText = window.clipboardData.getData('Text');
        } else if (event.clipboardData && event.clipboardData.getData) {
            var pastedText = event.clipboardData.getData('text/plain');
        }

        return pastedText;

    }

    function isNumberPaste(event) {

        var isNumber = true;

        var pastedText = getClipboardDataData(event);

        var charArray = pastedText.split("");

        for (i = 0; i < charArray.length; i++) {
            var isNaNValue = isNaN(charArray[i]);
            if (isNaNValue) {
                isNumber = false;
                break;
            };
        }

        return isNumber;

    }

    function isLetterPaste(event) {

        var isLetter = true;

        var pastedText = getClipboardDataData(event);

        var charArray = pastedText.split("");

        for (i = 0; i < charArray.length; i++) {
            var isNaNValue = isNaN(charArray[i]);
            if (!isNaNValue) {
                isLetter = false;
                break;
            };
        }

        return isLetter;

    }

    function esNumeroOrCopyOrPasteKeyPress(evt) {
        var charCode = getCharCode(evt);

        // 	copy = 99
        // 	paste = 118
        if (charCode == 99 || charCode == 118) return true;

        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function isRutPaste(evt) {

        var isRutKey = true;

        var pastedText = getClipboardDataData(evt);

        var charArray = pastedText.split("");

        for (i = 0; i < charArray.length; i++) {
            var isNaNValue = isNaN(charArray[i]);
            if (isNaNValue && i < charArray.length - 1) {
                isRutKey = false;
                break;
            } else if (isNaNValue && charArray[i] != 'K' && charArray[i] != 'k') {
                isRutKey = false;
                break;
            }
        }

        return isRutKey;

    }


    function esCharacterRut(evt) {
        try {
            return (isCharRut(evt) || isNumberKey(evt));
        } catch (e) {
            return false;
        }
    }

    var showMore = false;

    //Controla logica Ver Mas
    function showHideElementsById(showMoreId, showMinusId, elementsId) {

        //Flag que permite identificar cuando esta habilitada la vista ver mas
        if (!showMore) {
            showMore = true;
        } else if (showMore) {
            showMore = false;
        }

        //Agregamos todos los id que deseamos mostrar/ocultar
        var hideElements = elementsId.split(',');

        var i = 0;
        for (i = 0; i < hideElements.length; i++) {

            var element = $('#' + hideElements[i])

            if (!showMore) {
                $(element).hide();
                $('#' + showMoreId).show();
                $('#' + showMinusId).hide();
            } else {
                $(element).show();
                $('#' + showMinusId).show();
                $('#' + showMoreId).hide();
            }

        }

    }