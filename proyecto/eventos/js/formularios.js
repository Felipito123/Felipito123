function agregarEvento() {
    form = $("#form_agregar_evento");
    var formData = new FormData(form[0]); //form[0]

    let tipoboton = 1;
    let titulo = $('#txttituloIngresar').val();
    let descripcion = $('#txtdescripcionIngresar').val();

    let fechaingresarI = $('#txtfechaIngresarI').val();
    let fechaingresarF = $('#txtfechaIngresarF').val();

    let horaingresarI = $('#txthoraIngresarI').val();
    let horaingresarF = $('#txthoraIngresarF').val();
    let rutusuarios = $('#grupo_usuarios').val();

    //COMPARAR FECHAS, YA QUE LA FECHA DE FIN NO DEBE SER MENOR A LA FECHA DE INICIO//
    let date1 = new Date(fechaingresarI);
    let date2 = new Date(fechaingresarF);
    let tiempoinicio = date1.getTime();
    let tiempofin = date2.getTime();

    let contadoruno = 0;
    let contadordos = 0;
    for (var i = 0; i < horaingresarI.length; i++) {
        if (horaingresarI[i] == ':') {
            contadoruno++;
        }
    }
    for (var i = 0; i < horaingresarF.length; i++) {
        if (horaingresarF[i] == ':') {
            contadordos++;
        }
    }

    if (contadoruno == 1) horaingresarI = horaingresarI + ':00'; //y aumenta a 8 caracteres
    if (contadordos == 1) horaingresarF = horaingresarF + ':00'; //y aumenta a 8 caracteres

    let start = fechaingresarI + " " + horaingresarI;
    let color = $('#txtcolorIngresar').val();
    let end = fechaingresarF + " " + horaingresarF;


    if (validavacioynulo([tipoboton, titulo, start, color, end, horaingresarI, horaingresarF, rutusuarios])) { alertify.error("¡Campo(s) vacio(s)!"); }
    else if (titulo.length < 2 || titulo.length > 200) { swalfire("Tamaño del titulo, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
    else if (fechaingresarI.length < 10 || fechaingresarI.length > 10) { swalfire("Tamaño de la Fecha inicio, \nmínimo: 10 y máximo: 10 caracteres", "info"); }
    else if (horaingresarI.length < 8 || horaingresarI.length > 8) { swalfire("Tamaño de la Hora inicio, \nmínimo: 5 y máximo: 5 caracteres", "info"); }
    else if (fechaingresarF.length < 10 || fechaingresarF.length > 10) { swalfire("Tamaño de la Fecha fin, \nmínimo: 10 y máximo: 10 caracteres", "info"); }
    else if (horaingresarF.length < 8 || horaingresarF.length > 8) { swalfire("Tamaño de la Hora fin, \nmínimo: 5 y máximo: 5 caracteres", "info"); }
    else if (descripcion.length < 2 || descripcion.length > 1000) { swalfire("Tamaño de la descripcion, \nmínimo: 2 y máximo: 1000 caracteres", "info"); }
    else if (color.length < 3 || color.length > 8) { swalfire("Tamaño del color, \nmínimo: 3 y máximo: 8 caracteres", "info"); }
    else if (horaingresarI == horaingresarF) {
        alertify.error("¡Hora deben ser distintas!");
    } else if (tiempofin < tiempoinicio) {
        alertify.error("¡La fecha de fin no debe ser menor a la fecha de inicio!");
    } else {

        formData.append('tipo', parseInt(tipoboton));
        formData.append('titulo', titulo);
        formData.append('descripcion', descripcion);
        formData.append('inicio', start);
        formData.append('color', color);
        formData.append('fin', end);

        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
            }
        }).done(function (response) {
            console.log(response);

            if (response == 1) {
                alertify.error("¡Campos vacios,<br> compruebe datos!");
            } else if (response == 2) {
                alertify.error("La fecha u hora de inicio <br> estan vacias");
            } else if (response == 3) {
                alertify.error("La fecha u hora de fin <br> estan vacias");
            } else if (response == 4) {
                alertify.error("Ha ocurrido un error <br> al registrar el evento");
            } else if (response == 5) {
                $('.js-example-basic-multiple').select2('');
                form[0].reset();
                $("#calendariop").fullCalendar("refetchEvents");
                $('#modal-ingresar').modal('hide');
                alertify.success("Evento registrado");
            } else if (response == 400 || response == 401) {
                alertify.error("No se han recibido parámetros");
            }

        });


        // $.post('funciones/acceso.php', { tipo: parseInt(tipoboton), titulo: titulo, descripcion: descripcion, inicio: start, color: color, fin: end }, function (response) {
        //     console.log(response);
        //     if (response == 1) {
        //         alertify.error("¡Campos vacios,<br> compruebe datos!");
        //     } else if (response == 2) {
        //         alertify.error("La fecha u hora de inicio <br> estan vacias");
        //     } else if (response == 3) {
        //         alertify.error("La fecha u hora de fin <br> estan vacias");
        //     } else if (response == 4) {
        //         alertify.error("Ha ocurrido un error <br> al registrar el evento");
        //     } else if (response == 5) {
        //         $("#calendariop").fullCalendar("refetchEvents");
        //         $('#modal-ingresar').modal('hide');
        //         alertify.success("Evento registrado");
        //     } else if (response == 400 || response == 401) {
        //         alertify.error("No se han recibido parámetros");
        //     }
        // });


    }
}

function editarEvento() {
    form = $("#form_eventos");

    let tipoboton = 2;
    let identificador = $('#txtID').val();
    let titulo = $('#txttitulo').val();
    let descripcion = $('#txtdescripcion').val();
    let color = $('#txtcolor').val();

    let fechainicio = $('#txtfechainicio').val();
    let horainicio = $('#txthorainicio').val();

    let fechafin = $('#txtfechafin').val();
    let horafin = $('#txthorafin').val();

    //COMPARAR FECHAS, YA QUE LA FECHA DE FIN NO DEBE SER MENOR A LA FECHA DE INICIO//
    let date1 = new Date(fechainicio);
    let date2 = new Date(fechafin);
    let tiempoinicio = date1.getTime();
    let tiempofin = date2.getTime();

    if (validavacioynulo([fechainicio, horainicio])) {
        alertify.error("Fecha de inicio vacia o incompleta");
        return;
    }
    if (validavacioynulo([fechafin, horafin])) {
        alertify.error("Fecha de fin vacia o incompleta");
        return;
    }

    let contadoruno = 0;
    let contadordos = 0;
    for (var i = 0; i < horainicio.length; i++) {
        if (horainicio[i] == ':') {
            contadoruno++;
        }
    }
    for (var i = 0; i < horafin.length; i++) {
        if (horafin[i] == ':') {
            contadordos++;
        }
    }

    if (contadoruno < 2 || contadoruno > 2) horainicio = horainicio + ':00'; //y aumenta a 8 caracteres
    if (contadordos < 2 || contadordos > 2) horafin = horafin + ':00'; //y aumenta a 8 caracteres

    let start = fechainicio + " " + horainicio;
    let end = fechafin + " " + horafin;

    // console.log("ID:" + identificador +
    //     "\nTITULO:" + titulo +
    //     "\nDescripción:" + descripcion +
    //     "\nFechaInicio:" + start +
    //     "\nFechaFin:" + end +
    //     "\nColor:" + color);

    if (validavacioynulo([tipoboton, identificador, titulo, descripcion, start, end, color])) { alertify.error("¡Campo(s) vacio(s)!"); }
    else if (titulo.length < 2 || titulo.length > 200) { swalfire("Tamaño del titulo, \nmínimo: 2 y máximo: 200 caracteres", "error"); }
    else if (fechainicio.length < 10 || fechainicio.length > 10) { swalfire("Tamaño de la fecha de inicio, \nmínimo: 10 y máximo: 10 caracteres", "error"); }
    else if (horainicio.length < 8 || horainicio.length > 8) { swalfire("Tamaño de la hora de inicio, \nmínimo: 5 y máximo: 5 caracteres", "error"); }
    else if (fechafin.length < 10 || fechafin.length > 10) { swalfire("Tamaño de la fecha de fin, \nmínimo: 10 y máximo: 10 caracteres", "error"); }
    else if (horafin.length < 8 || horafin.length > 8) { swalfire("Tamaño de la hora de fin, \nmínimo: 5 y máximo: 5 caracteres", "error"); }
    else if (descripcion.length < 2 || descripcion.length > 1000) { swalfire("Tamaño de la descripcion, \nmínimo: 2 y máximo: 1000 caracteres", "error"); }
    else if (color.length < 3 || color.length > 8) { swalfire("Tamaño del color, \nmínimo: 4 y máximo: 8 caracteres", "error"); }
    else if (horainicio == horafin) {
        alertify.error("¡Hora deben ser distintas!");
    } else if (tiempofin < tiempoinicio) {
        alertify.error("¡La fecha de fin no debe ser menor a la fecha de inicio!");
    }  else {
        $.post('funciones/acceso.php', { tipo: parseInt(tipoboton), ID: parseInt(identificador), titulo: titulo, descripcion: descripcion, inicio: start, fin: end, color: color }, function (response) {
            console.log(response);
            if (response == 1) {
                alertify.error("¡Campos vacios,<br> compruebe datos!");
            } else if (response == 2) {
                alertify.error("La fecha u hora de inicio <br> estan vacias");
            } else if (response == 3) {
                alertify.error("La fecha u hora de fin <br> estan vacias");
            } else if (response == 4) {
                alertify.error("Ha ocurrido un error <br> al editar el evento");
            } else if (response == 5) {
                $("#calendariop").fullCalendar("refetchEvents");
                $('#modal-editar').modal('hide');
                alertify.success("Evento editado");
            } else if (response == 400 || response == 401) {
                alertify.error("No se han recibido parámetros");
            }
        });
    }
}