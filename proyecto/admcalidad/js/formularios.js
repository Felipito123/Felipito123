/*====================================================================FORMULARIOS======================================================*/

function formularioRegistro() {
    form = $("#form-documento-calidad");

    let archivo = $("#archivo_calidad").val();
    let descripcion = $("#descripcion_calidad").val();

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '3');

    // for (var i of formData.entries()) {
    //     console.log(i[0]+ ', ' + i[1]); 
    // }

    if (validavacioynulo([archivo, descripcion])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
    else if (descripcion.length < 2 || descripcion.length > 50) { swalfire("Tamaño de la descripción, \nmínimo: 2y máximo: 50 caracteres", "error"); }
    else {
        // console.log("RUT: " + rutusuario + "\narchivo: " + archivo + "\ndescripcion: " + descripcion);

        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false
        }).done(function (respuesta) {
            console.log("respuesta: " + respuesta);
            if (respuesta == 1) {
                swalfire("Tamaño excedido > 20 MB", "error");
            } else if (respuesta == 2) {
                swalfire("¡Ha ocurrido un error al registrar el archivo!", "error");
            } else if (respuesta == 3) {
                swalfire("¡Ha ocurrido un error!", "error");
            } else if (respuesta == 4) {
                tablacalidad.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Archivo subido exitosamente!", "success");
            } else if (respuesta == 5) {
                swalfire("¡El formato del archivo no es válido!", "error");
            } else if (respuesta == 6 || respuesta == 444) {
                swalfire("¡No se ha recibido el parametro!", "error");
            } else if (respuesta == 11) {
                swalfire("¡Campos vacios, compruebe datos!", "error");
            } else {
                swalfire("ERROR", "error");
            }
        });

    }
}


function formularioEditarArchivo() {
    form = $("#form-modal-editar-calidad");

    let IDDOC = $("#id_modal_editar").val();
    let DESCRIPCIONDOC = $("#descripcion_modal_editar").val();

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '4');

    // for (var i of formData.entries()) {
    //     console.log(i[0] + ', ' + i[1]);
    // }

    if (validavacioynulo([IDDOC, DESCRIPCIONDOC])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
    else if (DESCRIPCIONDOC.length < 2 || DESCRIPCIONDOC.length > 50) { swalfire("Tamaño de la descripción, \nmínimo: 2 y máximo: 50 caracteres", "error"); }
    else {
        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false
        }).done(function (respuesta) {
            //console.log("respuesta: " + respuesta);
            if (respuesta == 1) {
                swalfire("Tamaño excedido > 20 MB", "error");
            } else if (respuesta == 2) {
                swalfire("¡Ha ocurrido un error al editar el archivo!", "error");
            } else if (respuesta == 3) {
                // swalfire("¡Ha ocurrido un error!", "error");
                $('#modal-editar-calidad').modal('hide');
                tablacalidad.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Archivo editado exitosamente!", "success");
            } else if (respuesta == 4) {
                swalfire("¡Ha ocurrido un error al editar el archivo!", "error");
            } else if (respuesta == 5) {
                $('#modal-editar-calidad').modal('hide');
                tablacalidad.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Archivo editado exitosamente!", "success");
            } else if (respuesta == 6) {
                swalfire("¡El formato del archivo no es válido!", "error");
            } else if (respuesta == 7 || respuesta == 444) {
                swalfire("¡No se ha recibido el parametro!", "error");
            } else if (respuesta == 11) {
                swalfire("¡Campos vacios, verifique datos!", "error");
            }
        }).fail(function (res) {
            console.log("Ha ocurrido un error: "+ res);
            // swalfire("¡Ha o!", "error");
        });
    }
}

/*====================================================================FORMULARIOS======================================================*/