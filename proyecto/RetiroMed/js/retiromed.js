$(document).ready(function () {

    resultadostabla();
    function resultadostabla() {

        tabla_retiro_medicamento = $('#tabla_retiro_medicamento').DataTable({
            "responsive": true,
            "cache": false,
            "ordering": false, //le quito el ordenamiento ascendente o descendente
            "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
            "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
            "ajax": {
                "url": "funciones/acceso.php",
                "method": 'POST', //usamos el metodo POST
                "data": { seleccionar: 1 }, //enviamos una opcion para que haga un SELECT
                "dataSrc": "",
                error: function (jqXHR, textStatus, error) {
                    console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
                }
            },
            "columns": [
                {
                    "data": "ID_ESTADO_MED",
                    "render": function (data, type, JsonResultRow, row) {

                        if (data == 1) {
                            return '<span><i class="fas fa-circle fa-sm" style="color: #009688 !important;"></i> Aprobada</span>'; // <span class="badge badge-secondary" style="width:80px">En espera</span>
                        } else if (data == 2) {
                            return '<span><i class="fas fa-circle fa-sm" style="color: #808080 !important;"></i> No respondida </span>';
                        } else if (data == 3) {
                            return '<span><i class="fas fa-circle fa-sm" style="color: #e74a3b !important;"></i> Rechazada </span>';
                        }
                    }
                },
                { "data": "NOMBRE_PACIENTE" },
                { "data": "APELLIDOS_PACIENTE" },
                { "data": "CORREO_PACIENTE" },
                {
                    "data": "EDAD_PACIENTE",
                    "render": function (data, type, JsonResultRow, row) {
                        var hoy = new Date();
                        var cumpleanos = new Date(data);
                        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                        var m = hoy.getMonth() - cumpleanos.getMonth();

                        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                            edad--;
                        }
                        return edad + ' años';
                    }
                },
                {
                    "data": "FECHA_RETIRO",
                    "render": function (data, type, JsonResultRow, row) {
                        let separar = data.split("-");
                        let fecha = separar[2] + '/' + separar[1] + '/' + separar[0];
                        return fecha;
                    }
                },
                {
                    render: function (data, type, JsonResultRow, row) {
                        let concatenar = `
                        <div class='row justify-content-center'>
                            <div class='col align-items-center'>
                                <div class='btn-group'>
                    `;
                        if (JsonResultRow.ID_ESTADO_MED == 1) { //si ya esta en transito aparece solo el boton de entrega
                            concatenar += `<label class='btn btn-danger btn-sm btnRechazar ml-2' title='Rechazar solicitud'><i class="far fa-thumbs-down"></i></label>`;
                        } else if (JsonResultRow.ID_ESTADO_MED == 2) { //si ya esta en entrega aparece solo el boton de en transito, en caso que quiera retroceder el paso
                            concatenar += `<label class='btn btn-gris btn-sm btnAprobar' title='Aprobar solicitud'><i class="far fa-thumbs-up"></i></label>
                            <label class='btn btn-danger btn-sm btnRechazar' title='Rechazar solicitud'><i class="far fa-thumbs-down"></i></label>`;
                        } else if (JsonResultRow.ID_ESTADO_MED == 3) { //si ya esta en entrega aparece solo el boton de en transito, en caso que quiera retroceder el paso
                            concatenar += `<label class='btn btn-gris btn-sm btnAprobar' title='Aprobar solicitud'><i class="far fa-thumbs-up"></i></label>`;
                        }
                        // else {
                        //     concatenar += `<label>Ya Está aprobada</label>`;
                        // }
                        concatenar += `
                    </div></div></div>`;
                        return concatenar;
                    }
                }
            ], "columnDefs": [{
                "targets": [], //oculto la columna ID_USUARIO que tiene posición 0 Y 4
                "visible": false,
                "searchable": true
            },

            ],
            "oLanguage": {
                "sProcessing": "Procesando...",
                "sLengthMenu": 'Mostrar <select>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="40">40</option>' +
                    '<option value="80">80</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> registros',
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No hay solicitudes de horas agendadas para retiro de medicamento en esta tabla",
                "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Por favor espere - cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",

                }
            },
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Exportar excel',
                    className: 'btn btn-success'
                },

                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Exportar PDF',
                    className: 'btn btn-danger'
                },

                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ]

        });

        $('.buttons-excel').hide();
        $('.buttons-print').hide();
        $('.buttons-pdf').hide();
    }

});

//===================================================================LLENADO DE DATATABLE===================================================================//     


$(document).on('click', '#expoExcel', function () {
    var cantidaddefilas = tabla_retiro_medicamento.page.info().recordsTotal;
    if (cantidaddefilas == 0) {
        NotifTipoIntranet("Error", "No hay registros en esta tabla para generar un informe", "error");
    } else { $('.buttons-excel').click(); }
});
$(document).on('click', '#expoPdf', function () {
    var cantidaddefilas = tabla_retiro_medicamento.page.info().recordsTotal;
    if (cantidaddefilas == 0) {
        NotifTipoIntranet("Error", "No hay registros en esta tabla para generar un informe", "error");
    } else { $('.buttons-pdf').click(); }
});
$(document).on('click', '#Imprimir', function () {
    var cantidaddefilas = tabla_retiro_medicamento.page.info().recordsTotal;
    if (cantidaddefilas == 0) {
        NotifTipoIntranet("Error", "No hay registros en esta tabla para generar un informe", "error");
    } else { $('.buttons-print').click(); }
});

$(document).on('click', '.btnAprobar', function () {
    let idsolicitud = (tabla_retiro_medicamento.row($(this).closest('tr')).data().ID_RETIRO_MED);
    let rutpaciente = (tabla_retiro_medicamento.row($(this).closest('tr')).data().RUT_PACIENTE);
    let correoelectronico = (tabla_retiro_medicamento.row($(this).closest('tr')).data().CORREO_PACIENTE);
    let fecharetiromedicamento = (tabla_retiro_medicamento.row($(this).closest('tr')).data().FECHA_RETIRO);

    let separar = fecharetiromedicamento.split("-");
    let fechaformateada = separar[2] + '/' + separar[1] + '/' + separar[0];

    if (validavacioynulo([idsolicitud, rutpaciente])) { toastr.info("¡Datos vacios, contacte a soporte!"); }
    else {
        $.post('funciones/acceso.php', { seleccionar: 2, idsolicitud: parseInt(idsolicitud), rutpaciente: rutpaciente }, function (respuesta) {
            console.log("RESPUESTA: " + respuesta);
            if (respuesta == 1) { toastr.info("¡Campos vacios!"); }
            else if (respuesta == 2) { toastr.info("¡Hubo un error, por favor contacte a soporte.!"); }
            else if (respuesta == 3) {
                toastr.success("¡Solicitud aprobada!");
                tabla_retiro_medicamento.ajax.reload(null, false);

                $.post('../Notificaciones/RetiroAprobado/', { correo: correoelectronico, fechaderetiro: fechaformateada }, function (responses) {
                    console.log("Respuesta notificacion retiro medicamento: " + responses);
                    if (responses == 1) {
                        console.log("Reunión agendada y notificaciones enviadas");
                    } else if (responses == 2) {
                        console.log("No se han recibido parámetros");
                    }
                });

            }
            else if (respuesta == 4) { toastr.info("No se han recibido parámetros, por favor contacte a soporte"); }
        });
    }

    // alertify.success("ID: " + idsolicitud + " R.U.T: " + rutpaciente);
});

$(document).on("click", ".btnRechazar", function () {
    let idsolicitud = (tabla_retiro_medicamento.row($(this).closest('tr')).data().ID_RETIRO_MED);
    let rutpaciente = (tabla_retiro_medicamento.row($(this).closest('tr')).data().RUT_PACIENTE);
    let correoelectronico = (tabla_retiro_medicamento.row($(this).closest('tr')).data().CORREO_PACIENTE);

    // toastr.success("ID SOLICITUD: " + id_solicitud + "\nID SEGUIMIENTO: " + id_seguimiento);
    Swal.fire({
        title: '¿Desea Rechazar la solicitud?',
        //icon: 'info',
        html: `
            <div class="row justify-content-center pt-3">
                <div class="col-xl-9">
                    <div class="form-group">
                        <label id="labelparaswal">Comentario (opcional)</label>
                        <textarea class="form-control" id="otros" placeholder="Complete este campo" rows="3" col="10" minlength="0" maxlength="75" onkeypress="return soloCaractDeConversacion(event)" onpaste="return false" autocomplete="off" style="resize:none" required></textarea>
                        <small class="col-sm-7">
                            Escrito <span id="escrito" style="color:red;">00</span>
                            Restantes <span id="contadorcaract" style="color:#28a745;">00</span>
                        </small>
                    </div>
    
                </div>
            </div>`,
        didOpen: function () {
            $("#otros").keyup(function () {
                let noc = $("#otros").val().length;
                let now = $("#otros").val();
                let escrito = noc;
                // en caso que en el html del navegador alguien cambie el maxlenght
                if (noc >= 75) { $('#otros').attr('maxlength', '75') }
                noc = 75 - noc;
                now = now.match(/\w+/g);
                if (!now) {
                    now = 0;
                } else { now = now.length; }
                $("#escrito").text(escrito);
                $("#contadorcaract").text(noc);
            });
        },
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Si, confirmo',
        cancelButtonText: 'No, cancelar',
        confirmButtonColor: "#e74a3b",
        cancelButtonColor: "#858796",
        width: '550px',
        preConfirm: () => {

            let comentario = $('#otros').val();

            //El comentario puede ser vacio (es opcional), asi que no lo valido en el if
            if (validavacioynulo([idsolicitud, rutpaciente])) { Swal.showValidationMessage('¡No se ha recibido parámetros!') }
            else {
                // toastr.success("ID SOLICITUD: " + idsolicitud + "\n R.U.T Paciente: " + rutpaciente + "\n Comentario: " + comentario);

                $.post('funciones/acceso.php', { seleccionar: 3, idsolicitud: parseInt(idsolicitud), rutpaciente: rutpaciente, comentario: comentario }, function (respuesta) {
                    console.log("RESPUESTA RECHAZADO: " + respuesta);
                    if (respuesta == 1) { toastr.info("¡Campos vacios!"); }
                    else if (respuesta == 2) { toastr.info("¡Hubo un error, por favor contacte a soporte.!"); }
                    else if (respuesta == 3) {
                        toastr.success("¡Solicitud rechazada!");
                        tabla_retiro_medicamento.ajax.reload(null, false);

                        $.post('../Notificaciones/RetiroRechazado/', { correo: correoelectronico, comentario: comentario }, function (responses) {
                            console.log("Respuesta notificacion RCHZ retiro medicamento: " + responses);
                            if (responses == 1) {
                                console.log("Reunión agendada y notificaciones enviadas");
                            } else if (responses == 2) {
                                console.log("No se han recibido parámetros");
                            }
                        });

                    }
                    else if (respuesta == 4) { toastr.info("No se han recibido parámetros, por favor contacte a soporte"); }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }
        }
    });
});