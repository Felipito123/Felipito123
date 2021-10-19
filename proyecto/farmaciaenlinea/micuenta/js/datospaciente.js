$(document).ready(function () {
    $.post('funciones/acciones.php', {
        seleccionar: 1
    }, function (respuesta) {
        // console.log(JSON.parse(respuesta));
        if (respuesta == 1) {
            swalfire("¡Ha ocurrido un error al completar los campos!", "error");
        } else {
            let datos = JSON.parse(respuesta);

            $('#rut').val(datos[0].RUT);
            $('#patologia').text(datos[0].PATOLOGIA);
            $('#nombres').val(datos[0].NOMBRES);
            $('#apellidos').val(datos[0].APELLIDOS);
            $('#correo').val(datos[0].CORREO);
            $('#telefono').val(datos[0].TELEFONO);
            $('#direccion').val(datos[0].DIRECCION);
        }
    });
    
    $('#telefono').on('keydown', function (ev) { //si se presiona enter en el último input se activa el formulario
        if (ev.key === 'Enter') {
            $('#btnactualizardatos').trigger("click");
        }
    });

    $("#fomEditarDatosPaciente").on('submit', function (event) {
        event.preventDefault();
        form = $("#fomEditarDatosPaciente");

        let nombres = $('#nombres').val();
        let apellidos = $('#apellidos').val();
        let correo = $('#correo').val();
        let telefono = $('#telefono').val();
        let direccion = $('#direccion').val();

        if (nombres.length < 2 || nombres.length > 50) { swalfire("Tamaño de los nombres inválido, \nmínimo: 2 y máximo: 50 caracteres", "info"); }
        else if (apellidos.length < 2 || apellidos.length > 50) { swalfire("Tamaño de los apellidos inválido, \nmínimo: 2 y máximo: 50 caracteres", "info"); }
        else if (correo.length < 11 || correo.length > 70) { swalfire("Tamaño del correo inválido, \nmínimo: 11 y máximo: 70 caracteres", "info"); }
        else if (telefono.length < 8 || telefono.length > 9) { swalfire("Tamaño del teléfono inválido, \nmínimo: 8 y máximo: 9 caracteres", "info"); }
        else if (direccion.length < 2 || direccion.length > 100) { swalfire("Tamaño de la dirección inválido, \nmínimo: 2 y máximo: 100 caracteres", "info"); }
        else {
            if (validavacioynulo([nombres, apellidos, correo, telefono, direccion])) { swalfire("¡Campo(s) vacio(s)!", "info"); }
            else {
                $.post('funciones/acciones.php', {
                    seleccionar: 2,
                    nombres:nombres,
                    apellidos: apellidos,
                    correo:correo,
                    telefono: telefono,
                    direccion:direccion
                }, function (respuesta) {
                    //console.log(respuesta);
                    if (respuesta == 1) {
                        swalfire("¡Campos vacios!", "error");
                    } else if (respuesta == 2) {
                        swalfire("¡Hubo un error, no se pudo actualizar los datos, contacte a soporte!", "error");
                    } else if (respuesta == 3) {
                        // form[0].reset();
                        alertify.set('notifier', 'position', 'top-left');
                        alertify.success("¡Datos actualizados!");
                    } else if (respuesta == 4) {
                        swalfire("No se han recibido parámetros, verifique datos o contacte a soporte", "error");
                    }else if (respuesta == 5) {
                        swalfire("No se ha podido actualizar datos, porque la sesión a finalizado", "error");
                    }
                });
            }
        }
    });

});