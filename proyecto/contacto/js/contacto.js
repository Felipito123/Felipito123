$(document).ready(function (event) {

    /*Formulario del contacto*/
    $("#formContacto").on('submit', function (event) {
        form = $("#formContacto");
        event.preventDefault();
        let contacto_nombre = $("#contacto_nombre").val();
        let contacto_correo = $("#contacto_correo").val();
        let contacto_telefono = $("#contacto_telefono").val();
        let contacto_asunto = $("#contacto_asunto").val();
        let contacto_descripcion = $("#contacto_descripcion").val();

        //console.log("Nombre: " + contacto_nombre + "\nCorreo:" + contacto_correo + "\nTeléfono:" + contacto_telefono + "\nAsunto:" + contacto_asunto+ "\nDescripción:" + contacto_descripcion);

        if (validavacioynulo([contacto_nombre, contacto_correo, contacto_telefono, contacto_asunto, contacto_descripcion])) { swalfire("¡Datos inválidos!", "error"); }
        else if (contacto_nombre.length<2 || contacto_nombre.length>50) { swalfire("Tamaño del nombre inválido, \nmínimo: 2 y máximo: 50 caracteres", "error"); }
        else if (contacto_correo.length<11 || contacto_correo.length>100) { swalfire("Tamaño del correo inválido, \nmínimo: 11 y máximo: 100 caracteres", "error"); }
        else if (!validarcorreo(contacto_correo)) { swalfire("¡Correo inválido!", "error"); }
        else if (/^[0-9\s]+$/.test(contacto_telefono)) { swalfire('El campo teléfono debe contener sólo números', "error");}
        else if (contacto_telefono.length<9 || contacto_telefono.length>9) { swalfire('La logitud del campo teléfono inválida. (Se requieren 9 dígitos numéricos)', "error"); }
        else if (validavacioynulo([contacto_telefono])) { swalfire('El campo teléfono vacio', "error"); }
        else if (parseInt(contacto_telefono) < 922222222) { swalfire('El campo teléfono debe ser superior o igual a 922222222', "error"); }
        else if (contacto_asunto.length<2 || contacto_asunto.length>60) { swalfire("Tamaño del asunto inválido, \nmínimo: 2 y máximo: 60 caracteres", "error"); }
        else if (contacto_descripcion.length<2 || contacto_descripcion.length>10000) { swalfire("Tamaño de la descripción inválido, \nmínimo: 2 y máximo: 10000 caracteres", "error"); }
        else {
            $.ajax({
                type: 'POST',
                url: 'funciones/fun_agregar_contacto.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
                }
            }).done(function (respuesta) {
               // console.log(respuesta);
                if (respuesta == 0) {
                    swalfire("¡Error en la consulta!", "error");
                }else if (respuesta == 1) {
                    form[0].reset();
                    swalfire("¡Mensaje enviado!", "success");
                }else if (respuesta == 2) {
                    swalfire("¡No se ha recibido parametros!", "error");
                }else if (respuesta == 3) {
                    swalfire("¡Correo inválido!", "error");
                }else if (respuesta == 4) {
                    swalfire("Tamaño del nombre inválido, \nmínimo: 2 y máximo: 50 caracteres", "info");
                }else if (respuesta == 5) {
                    swalfire("Tamaño del correo inválido, \nmínimo: 11 y máximo: 100 caracteres", "info");
                }else if (respuesta == 6) {
                    swalfire("Tamaño del teléfono inválido, \nmínimo: 9 y máximo: 13 caracteres", "info");
                }else if (respuesta == 7) {
                    swalfire("Tamaño del asunto inválido, \nmínimo: 2 y máximo: 60 caracteres", "info");
                }else if (respuesta == 8) {
                    swalfire("Tamaño de la descripción inválido, \nmínimo: 2 y máximo: 10000 caracteres", "info");
                }else if (respuesta == 9) {
                    swalfire("Parámetros vacios!", "info");
                }
                else {
                    swalfire("ERROR 1", "error");
                }

            }).fail(function (res) {
                console.log(res);
                swalfire("ERROR 2 ", "error");
            });
        }
    });
    /*Formulario del contacto*/
});