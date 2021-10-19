/*====================================================================FORMULARIOS======================================================*/

function formularioRegistroOdonto() {
    form = $("#formcreararticulo_odonto");

    let titulo = $("#titulo_articulo_odonto").val();
    let descripcion = $("#descripcion_odonto").val();
    let imagen = $("#archivo_odonto").val(); //AQUI SE PODRIA VALIDAR NUEVAMENTE LA IMAGEN 
    let frase = $("#frase").val();
    let cita = $("#cita").val();

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '1');

    // for (var i of formData.entries()) {
    //     console.log(i[0]+ ', ' + i[1]); 
    // }

    if (!validavacioynulo([frase, cita])) { //si no estan vacios comprueba longitud
        if (frase.length < 2 || frase.length > 130) { swalfire("Tamaño de la frase, \nmínimo: 2 y máximo: 130 caracteres", "error"); return;}
        if (cita.length < 2 || cita.length > 130) { swalfire("Tamaño de la cita, \nmínimo: 2 y máximo: 130 caracteres", "error"); return;}
    }

    if (!validavacioynulo([imagen])) { //si no esta vacia la imagen comprueba que sea una imagen
        if (!esunaimagen(imagen)) {
            swalfire("No es una imagen", "error");
            return; 
        }
    }


    //El return es para terminar la ejecucion y no siga avanzando

    if (validavacioynulo([titulo, descripcion])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
    else if (titulo.length < 2 || titulo.length > 130) { swalfire("Tamaño del titulo, \nmínimo: 2 y máximo: 130 caracteres", "error"); }
    else if (descripcion.length < 2 || descripcion.length > 10000) { swalfire("Tamaño de la descripción, \nmínimo: 2 y máximo: 10000 caracteres", "error"); }
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
            } else if (respuesta == 2) {
                swalfire("Tamaño excedido > 20 MB", "error");
            } else if (respuesta == 3) {
                swalfire("¡Ha ocurrido un error al registrar el articulo!", "error");
            } else if (respuesta == 4) {
                swalfire("¡Ha ocurrido un error!", "error");
            } else if (respuesta == 5) {
                form[0].reset();
                limpiardescripcion();
                swalfire("¡Articulo subido exitosamente!", "success");
            } else if (respuesta == 6) {
                swalfire("¡El formato de la imagen no es válida!", "error");
            } else if (respuesta == 7 || respuesta == 444) {
                swalfire("¡No se ha recibido el parametro!", "error");
            }
        });
    }
}
/*====================================================================FORMULARIOS======================================================*/