

$(document).ready(function () {
    var fechayhorainicio;
    var fechayhorafin;
    var nuevoformatofechayhorainicio;
    var nuevoformatofechayhorafin;
    // weekends: false,    Esconde los fines de semana
    // saque el -> right: 'agendaDay,agendaWeek
    // eventLimit,  limitar la cantidad de eventos que se muestran en un día
    $('#calendariop').fullCalendar({
        header: {
            left: 'today,prev,next',
            center: 'title',
            right: 'basicDay,basicWeek,month'
        },
        weekends: false,
        eventLimit: 5,
        dayClick: function (date, jsEvent, view) {
            $('#txtfechaIngresarI').val(date.format()); //Agregar
            $('#txtfechafinIngresarI').val(date.format());
            $('#txtfechaIngresarF').val(date.format()); //Agregar
            $('#txtfechafinIngresarF').val(date.format());
            $('#txttituloIngresar').val('');
            $('#txtdescripcionIngresar').val('');
            $('#txtcolorIngresar').val('');

            $('.js-example-basic-multiple').select2('');

            $('#modal-ingresar').modal();

            $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
                $("#modal-ingresar").appendTo("body");
                $('#modal-ingresar').modal('show');
            });
        },
        events: 'funciones/llenar_calendario.php',
        eventClick: function (calEvent, jsEvent, view) {
            let iddelevento = calEvent.id;
            $('#txtID').val(calEvent.id);
            $('#txttitulo').val(calEvent.title);
            $('#txtdescripcion').val(calEvent.descripcion);
            $('#txtcolor').val(calEvent.color);

            //OJO, RESTRINGIR EN INGRESAR QUE LAS HORAS DE INICIO Y DE FIN NO SEAN IGUALES, PORQUE SINO ME GENERA ERROR CON EL _i
            fechayhorainicio = calEvent.start._i.split(" ");
            $('#txtfechainicio').val(fechayhorainicio[0]);
            $('#txthorainicio').val(fechayhorainicio[1]);

            fechayhorafin = calEvent.end._i.split(" ");
            $('#txtfechafin').val(fechayhorafin[0]);
            $('#txthorafin').val(fechayhorafin[1]);

            $.post('funciones/acceso.php', { tipo: 4, id_del_evento: iddelevento }, function (respuesta) {
                //  console.log("RESPP: " + respuesta);
                $('#txtdestinatarios').html(respuesta);
            }).fail(function () {
                swalfire("No se pudo cargar los destinatarios del evento", "error")
            });

            $('#modal-editar').modal(); //Editar y eliminar

            $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
                $("#modal-editar").appendTo("body");
                $('#modal-editar').modal('show');
            });

        },
        dayRender: function (date, cell) {

            // https://www.googleapis.com/calendar/v3/calendars/es.cl%23holiday%40group.v.calendar.google.com/events?key=AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE
            
            $.getJSON("https://apis.digital.gob.cl/fl/feriados/2021", function (data) {
                let largo = data.length;
                let abbe= JSON.parse(JSON.stringify(data));
                let irr='';
                // console.log("DATA: " + abbe);
                for (let i = 0; i < largo; i++) {
                    // console.log("DATA: " + abbe[i].irrenunciable);

                    if(abbe[i].irrenunciable == 1){
                        irr='IRRENUNCIABLE';
                    }else{
                        irr='';
                    }

                    if(date.format() == abbe[i].fecha){
                        cell.css("background-color", "#dce3f9");
                        cell.html('<div class="container"><div class="row"><div class="col-xl-12 col-sm-12"><small class="pl-1"><strong>FERIADO <br> '+irr+'</strong></small> <br> <label> '+abbe[i].nombre+' </label></div></div></div>');
                    }
                }
            });


        },
        editable: true, //HAGO EDITABLE LOS VALORES
        eventDrop: function (calEvent) {
            let tipoboton = 2;
            let identificador = calEvent.id;
            let titulo = calEvent.title;
            let descripcion = calEvent.descripcion;
            let color = calEvent.color;

            //CARGO LOS NUEVOS VALORES CUANDO SUELTE EL EVENTO EDITABLE
            $('#txtID').val(calEvent.id);
            $('#txttitulo').val(calEvent.title);
            $('#txtdescripcion').val(calEvent.descripcion);
            $('#txtcolor').val(calEvent.color);

            fechayhorainicio = calEvent.start.format().split("T"); //.split("T");
            nuevoformatofechayhorainicio = fechayhorainicio[0] + " " + fechayhorainicio[1];
            $('#txtfechainicio').val(fechayhorainicio[0] + " " + fechayhorainicio[1]);

            fechayhorafin = calEvent.end.format().split("T"); //.split("T");
            nuevoformatofechayhorafin = fechayhorafin[0] + " " + fechayhorafin[1];
            $('#txtfechafin').val(fechayhorafin[0] + " " + fechayhorafin[1]);

            recolectar(); //OBTENGO LOS NUEVOS VALORES


            // console.log("ID: " + $('#txtID').val() + "\nTITULO:" + $('#txttitulo').val() + "\nDESCRIPCION: " + $('#txtdescripcion').val() + "\nCOLOR:" + $('#txtcolor').val() + "\nFECHAINICIO:" + nuevoformatofechayhorainicio + "\nFECHAFIN:" + nuevoformatofechayhorafin);

            // console.log("INICIO: " + fechayhorainicio+ "\nFIN:" + fechayhorafin);
            // console.log("P1: " + fechayhorafin[0]+ "\nP2:" + fechayhorafin[1]);

            if (validavacioynulo([identificador, titulo, descripcion, color, tipoboton, nuevoformatofechayhorainicio, nuevoformatofechayhorafin])) { swalfire("¡Campos inválidos!", "error"); }
            else {
                $.post('funciones/acceso.php', {
                    tipo: tipoboton,
                    ID: identificador,
                    titulo: titulo,
                    descripcion: descripcion,
                    inicio: nuevoformatofechayhorainicio,
                    color: color,
                    fin: nuevoformatofechayhorafin
                }, function (response) {
                    // console.log("EventDrop editable: "+response);
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
                        alertify.success("Evento editado");
                    } else if (response == 400 || response == 401) {
                        alertify.error("No se han recibido parámetros");
                    }
                });
            }
        }
    });

    // $('.fc-sat').prop('disabled',true);
    // $('.fc-sun').prop('disabled',true);


    $("#form_agregar_evento").on('submit', function (event) {
        event.preventDefault();
        agregarEvento()
    });

    $("#form_eventos").on('submit', function (event) {
        event.preventDefault();
        editarEvento()
    });

    $(document).on('click', '#botoneliminar', function () {
        let tipoboton = 3;
        let identificador = $('#txtID').val();
        //console.log("ID ELIMINAR:" + identificador);
        if (validavacioynulo([tipoboton, identificador])) { alertify.error("¡Campo(s) vacio(s)!"); }
        else if (!esunnumero(tipoboton) && !esunnumero(identificador)) { alertify.error("¡Parámetros inválidos!"); }
        else {
            $.post('funciones/acceso.php', { tipo: parseInt(tipoboton), ID: parseInt(identificador) }, function (response) {
                //console.log(response);
                if (response == 1) {
                    alertify.error("¡Campos vacios,<br> compruebe datos!");
                } else if (response == 2) {
                    alertify.error("Ha ocurrido un error <br> al eliminar el evento");
                } else if (response == 3) {
                    $("#calendariop").fullCalendar("refetchEvents");
                    $('#modal-editar').modal('hide');
                    alertify.success("Evento eliminado");
                }
            });
        }
    });



    function recolectar() {

        $('#txtID').val();
        $('#txttitulo').val();
        $('#txtdescripcion').val();
        $('#txtcolor').val();
        $('#txtfechainicio').val();
        $('#txtfechafin').val();

    }
});

