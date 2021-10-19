/*====================================================================FORMULARIOS======================================================*/

function formularioEditarRegistro() {
    form = $("#formmodaleditar_odonto");

    let ID = $("#ver_articulo_id_odonto").val();
    let titulo = $("#ver_articulo_titulo_odonto").val();
    let descripcion = $("#ver_articulo_descripcion_odonto").val();
    let imagen = $("#ver_articulo_imagen_odonto").val(); //AQUI SE PODRIA VALIDAR NUEVAMENTE LA IMAGEN 
    let estado = $("#ver_articulo_estado_odonto").val();
    let frase = $("#frase_articulo").val();
    let cita = $("#cita_articulo").val();

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '3');

    // for (var i of formData.entries()) {
    //     console.log(i[0]+ ', ' + i[1]); 
    // }

    if (!validavacioynulo([frase, cita])) { //si no estan vacios comprueba longitud
        if (frase.length < 2 || frase.length > 130) { swalfire("Tamaño de la frase, \nmínimo: 2 y máximo: 130 caracteres", "error"); return; }
        if (cita.length < 2 || cita.length > 130) { swalfire("Tamaño de la cita, \nmínimo: 2 y máximo: 130 caracteres", "error"); return; }
    }

    if (!validavacioynulo([imagen])) { //si no esta vacia la imagen comprueba que sea una imagen
        if (!esunaimagen(imagen)) {
            swalfire("No es una imagen", "error");
            return;
        }
    }

    //El return es para terminar la ejecucion y no siga avanzando

    if (validavacioynulo([ID, titulo, descripcion, estado])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
    else if (descripcion.length < 2 || descripcion.length > 10000) { swalfire("Tamaño de la descripción, \nmínimo: 2y máximo: 10000 caracteres", "error"); }
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
                swalfire("¡Campos vacios, compruebe datos!", "error");
            }else if (respuesta == 2) {
                //swalfire("Tamaño excedido > 20 MB", "error");
                tablaarticulodonto.ajax.reload(null, false);
                form[0].reset();
                $('#MEMODALEDITARODONTO').modal('hide');
                swalfire("¡Articulo editado exitosamente!", "success");
            }else if (respuesta == 3) {
                swalfire("¡Ha ocurrido un error al editar el articulo!", "error");
            } else if (respuesta == 4) {
                //swalfire("¡Ha ocurrido un error!", "error");
                tablaarticulodonto.ajax.reload(null, false);
                form[0].reset();
                $('#MEMODALEDITARODONTO').modal('hide');
                swalfire("¡Articulo editado exitosamente!", "success");
            } else if (respuesta == 5) {
                swalfire("¡Ha ocurrido un error al editar el articulo!", "error");
            } else if (respuesta == 6) {
                swalfire("¡El formato de la imagen no es válido!", "error");
            } else if (respuesta == 7 ) {
                swalfire("¡El tamaño de la imagen no es válido!", "error");
            } else if (respuesta == 8 || respuesta == 444) {
                swalfire("¡No se ha recibido el parametro!", "error");
            }
        }).fail(function (res) {
            console.log(res);
        });
    }
}

function registrarAnexo(){
        form = $("#form-modal-registrar-anexo");
    
        let IDarticulo = $("#id_articulo_anexo").val();
        let categoria = $("#categoria_anexo").val();
        let titulo = $("#titulo_anexo").val();
        let descripcion = $("#descripcion_anexo").val();
        let imagen = $("#imagen_anexo").val(); //AQUI SE PODRIA VALIDAR NUEVAMENTE LA IMAGEN 
    
        var formData = new FormData(form[0]); //form[0]
        formData.append('seleccionar', '4');
    
        // for (var i of formData.entries()) {
        //     console.log(i[0]+ ', ' + i[1]); 
        // }
    
        if (validavacioynulo([IDarticulo,categoria,titulo,descripcion,imagen])) { swalfire("¡Campo(s) vacio(s)!", "info"); }
        else if (!esunnumero(IDarticulo)) { swalfire("Tipo de dato del articulo inválido", "info"); }
        else if (!esunnumero(categoria)) { swalfire("Tipo de dato de la categoria inválido", "info"); }
        else if (titulo.length < 2 || titulo.length > 130) { swalfire("Tamaño del titulo, \nmínimo: 2 y máximo: 130 caracteres", "info"); }
        else if (descripcion.length < 2 || descripcion.length > 10000) { swalfire("Tamaño de la descripción, \nmínimo: 2 y máximo: 10000 caracteres", "info"); }
        // else if (!esunaimagen(imagen)) {  swalfire("No es una imagen", "info"); }
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
                //console.log("respuesta: " + respuesta);
                if (respuesta == 1) {
                    swalfire("¡Campos vacios, compruebe datos!", "error");
                }else if (respuesta == 2) {
                    swalfire("¡El tamaño de la imagen no es válido!", "error");
                }else if (respuesta == 3) {
                    swalfire("¡Ha ocurrido un error al registrar el anexo!", "error");
                }else if (respuesta == 4) {
                    swalfire("¡Ha ocurrido un error al registrar el anexo!", "error");
                }else if (respuesta == 5) {
                    tablaarticulodonto.ajax.reload(null, false);
                    form[0].reset();
                    $('#modal-registrar-anexo').modal('hide');
                    swalfire("¡Anexo ingresado exitosamente!", "success");
                } else if (respuesta == 6) {
                    swalfire("¡El formato de la imagen no es válido!", "error");
                } else if (respuesta == 7 || respuesta == 444) {
                    swalfire("¡No se ha recibido el parametro!", "error");
                }
            }).fail(function (res) {
                console.log(res);
            });
        }
}


/*====================================================================FORMULARIOS======================================================*/