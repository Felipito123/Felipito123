
$(document).ready(function () {


    tabla_solicitudes_bodega = $('#tabla_solicitudes_bodega').DataTable({
        "responsive": true,
        "cache": false,
        "destroy": true,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "bFilter": true,
        "bPaginate": true,
        // "bLengthMenu" : false, 
        "bLengthChange": false,
        "bInfo": false,
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
                "data": "ID_SEGUIMIENTO",
                "render": function (data, type, JsonResultRow, row) {
                    let resultado;
                    if (data == 1) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #808080 !important;"></i></span>';
                    else if (data == 2) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #009688 !important;"></i></span>';
                    else if (data == 3) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #e74a3b !important;"></i></span>';
                    return resultado;
                }
            },
            { "data": "NOMBRE_SOLICITANTE" },
            { "data": "NOMBRE_CATEGORIA_MB" },
            { "data": "CANTIDAD_SL" },
            { "data": "NOMBRE_MATERIAL_MB" },
            {
                "data": "FECHA_REGISTRO_SL",
                "render": function (data, type, JsonResultRow, row) {
                    let separar = data.split("-");
                    return separar[2] + '/' + separar[1] + '/' + separar[0];
                }
            },
            { "data": "COMENTARIO" },
            {
                render: function (data, type, JsonResultRow, row) {
                    let concatenar = `
                            <div class='row justify-content-center'>
                                <div class='col align-items-center'>
                                    <div class='btn-group'>
                        `;
                    // <i class="fas fa-thumbs-up"></i>
                    if (JsonResultRow.ID_SEGUIMIENTO == 1) { //
                        concatenar += ` 
                            <button class='btn btn-success btn-sm btnAprobar' title=\"Aprobar Solicitud\"><i class='fas fa-thumbs-up' aria-hidde='true'></i></button>
                            <button class='btn btn-danger btn-sm btnRechazar' title=\"Rechazar Solicitud\"><i class='fas fa-thumbs-down' aria-hidde='true'></i></button>`;
                    } else if (JsonResultRow.ID_SEGUIMIENTO == 3) { //
                        concatenar += ` 
                            <button class='btn btn-success btn-sm btnAprobar' title=\"Aprobar Solicitud\"><i class='fas fa-thumbs-up' aria-hidde='true'></i></button>
                            <button class='btn btn-secondary btn-sm btnPendiente' title=\"Dejar solicitud pendiente\"><i class='fas fa-hand-paper' aria-hidde='true'></i></button>`;
                    } else if (JsonResultRow.ID_SEGUIMIENTO == 2) {
                        concatenar += `
                            <button class='btn btn-secondary btn-sm btnPendiente' title=\"Dejar solicitud pendiente\"><i class='fas fa-hand-paper' aria-hidde='true'></i></button>
                            <button class='btn btn-danger btn-sm btnRechazar' title=\"Rechazar Solicitud\"><i class='fas fa-thumbs-down' aria-hidde='true'></i></button>
                            `;
                    }
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
            "sEmptyTable": "No se encontraron resultados en esta tabla",
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
                titleAttr: 'Generar informe en excel',
                className: 'btn btn-success'
            },

            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'Generar informe en PDF',
                className: 'btn btn-danger'
            },

            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });




    // $(".dataTables_filter").hide(); //oculto el filtrador por defecto del datatable
    // tabla_inventario_bodega.search("lavalozas").draw();


    $(document).on("click", ".btnAprobar", function () {
        let id_solicitud = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_SOLICITUD);
        let id_seguimiento = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_SEGUIMIENTO);
        let id_mat_bg = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_MB);
        let stock_solicitado = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().CANTIDAD_SL);
        // toastr.success("ID SOLICITUD: " + id_solicitud + "\nID SEGUIMIENTO: " + id_seguimiento);
        Swal.fire({
            title: '¿Desea Aprobar la solicitud?',
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
            confirmButtonColor: "#1cc88a",
            cancelButtonColor: "#858796",
            width: '550px',
            preConfirm: () => {

                let comentario = $('#otros').val();

                if (validavacioynulo([id_solicitud, id_seguimiento])) { Swal.showValidationMessage('¡No se ha recibido parámetros!') }
                else {
                    // toastr.success("ID SOLICITUD: " + id_solicitud + "\nID SEGUIMIENTO: " + id_seguimiento);
                    $.post('funciones/acceso.php', { id_solicitud: id_solicitud, id_seguimiento: id_seguimiento, id_mb: id_mat_bg, solicitud: 2, stock: stock_solicitado, comentario: comentario, seleccionar: 2 }, function (respuesta) {
                        console.log("ACCIONES SOLICITUD APROBADO: " + respuesta);
                        if (respuesta == 1) {
                            toastr.error("Campos vacios", "UpS");
                        } else if (respuesta == 2) {
                            toastr.error("Esta solicitud ya ha sido aprobada", "UpS");
                            tabla_solicitudes_bodega.ajax.reload(null, false);
                        } else if (respuesta == 3 || respuesta == 4 || respuesta == 7) {
                            toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                        } else if (respuesta == 5 || respuesta == 6) {
                            toastr.error("No hay stock del material suficiente para aprobar", "UpS");
                        } else if (respuesta == 8) {
                            llenarpanel();
                            tabla_solicitudes_bodega.ajax.reload(null, false);
                            toastr.success("Solicitud aprobada correctamente", "Éxito");
                        } else if (respuesta == 444) {
                            toastr.error("Parámetros no recibidos", "UpS");
                        }
                    }).fail(function () {
                        swalfire("Ocurrio un Error Inesperado", "error")
                    });
                }
            }
        });
    });


    $(document).on("click", ".btnPendiente", function () {
        let id_solicitud = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_SOLICITUD);
        let id_seguimiento = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_SEGUIMIENTO);
        let id_mat_bg = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_MB);
        let stock_solicitado = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().CANTIDAD_SL);
        // toastr.success("ID SOLICITUD: " + id_solicitud + "\nID SEGUIMIENTO: " + id_seguimiento);
        Swal.fire({
            title: '¿Desea dejar Pendiente la solicitud?',
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
            confirmButtonColor: "#858796",
            cancelButtonColor: "#858796",
            width: '550px',
            preConfirm: () => {

                let comentario = $('#otros').val();

                if (validavacioynulo([id_solicitud, id_seguimiento])) { Swal.showValidationMessage('¡No se ha recibido parámetros!') }
                else {
                    // toastr.success("ID SOLICITUD: " + id_solicitud + "\nID SEGUIMIENTO: " + id_seguimiento);
                    $.post('funciones/acceso.php', { id_solicitud: id_solicitud, id_seguimiento: id_seguimiento, id_mb: id_mat_bg, solicitud: 1, stock: stock_solicitado, comentario: comentario, seleccionar: 2 }, function (respuesta) {
                        console.log("ACCIONES SOLICITUD PENDIENTE: " + respuesta);
                        if (respuesta == 1) {
                            toastr.error("Campos vacios", "UpS");
                        } else if (respuesta == 2) {
                            toastr.error("Esta solicitud ya está pendiente", "UpS");
                            tabla_solicitudes_bodega.ajax.reload(null, false);
                        } else if (respuesta == 3 || respuesta == 5 || respuesta == 6 || respuesta == 9) {
                            toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                        } else if (respuesta == 7 || respuesta == 8) {
                            toastr.error("No hay stock del material suficiente para aprobar", "UpS");
                        } else if (respuesta == 4 || respuesta == 10) {
                            llenarpanel();
                            tabla_solicitudes_bodega.ajax.reload(null, false);
                            toastr.success("Solicitud pendiente correctamente", "Éxito");
                        } else if (respuesta == 444) {
                            toastr.error("Parámetros no recibidos", "UpS");
                        }
                    }).fail(function () {
                        swalfire("Ocurrio un Error Inesperado", "error")
                    });
                }
            }
        });
    });

    $(document).on("click", ".btnRechazar", function () {
        let id_solicitud = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_SOLICITUD);
        let id_seguimiento = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_SEGUIMIENTO);
        let id_mat_bg = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().ID_MB);
        let stock_solicitado = (tabla_solicitudes_bodega.row($(this).closest('tr')).data().CANTIDAD_SL);
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

                if (validavacioynulo([id_solicitud, id_seguimiento])) { Swal.showValidationMessage('¡No se ha recibido parámetros!') }
                else {
                    // toastr.success("ID SOLICITUD: " + id_solicitud + "\nID SEGUIMIENTO: " + id_seguimiento);
                    $.post('funciones/acceso.php', { id_solicitud: id_solicitud, id_seguimiento: id_seguimiento, id_mb: id_mat_bg, solicitud: 3, stock: stock_solicitado, comentario: comentario, seleccionar: 2 }, function (respuesta) {
                        console.log("ACCIONES SOLICITUD: " + respuesta);
                        if (respuesta == 1) {
                            toastr.error("Campos vacios", "UpS");
                        } else if (respuesta == 2) {
                            toastr.error("Esta solicitud ya ha sido rechazada", "UpS");
                            tabla_solicitudes_bodega.ajax.reload(null, false);
                        } else if (respuesta == 3 || respuesta == 5 || respuesta == 6 || respuesta == 9) {
                            toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                        } else if (respuesta == 7 || respuesta == 8) {
                            toastr.error("No hay stock del material suficiente", "UpS");
                        } else if (respuesta == 4 || respuesta == 10) {
                            tabla_solicitudes_bodega.ajax.reload(null, false);
                            llenarpanel();
                            toastr.success("Solicitud rechazada correctamente", "Éxito");
                        } else if (respuesta == 444) {
                            toastr.error("Parámetros no recibidos", "UpS");
                        }
                    }).fail(function () {
                        swalfire("Ocurrio un Error Inesperado", "error")
                    });
                }
            }
        });
    });


    llenarpanel();
    function llenarpanel() {

        $.post('funciones/acceso.php', { seleccionar: 3 }, function (respuesta) {
            let jsonresp, contador;
            let porc_bar1pendientes;
            let porc_bar2aprobadas;
            let porc_bar3rechazadas;
            jsonresp = JSON.parse(respuesta);
            contador = jsonresp.length;
            console.log("LLENAR PANEL: " + respuesta);
            console.log("LARGO DEL ARRAY: " + contador);

            if (contador === 0) {
                $('#solicitudes_pendiente').text('0');
                $('#solicitudes_aprobadas').text('0');
                $('#solicitudes_rechazadas').text('0');
            } else if (contador > 0) {
                $('#solicitudes_pendiente').text('+' + jsonresp[0].solicitud_pendientes_acum);
                $('#solicitudes_aprobadas').text('+' + jsonresp[1].solicitud_aprobadas_acum);
                $('#solicitudes_rechazadas').text('+' + jsonresp[2].solicitud_rechazadas_acum);

                let total_solicitudes = jsonresp[3].total_solicitudes;

                // console.log("total_solicitudes: "+ total_solicitudes);

                if (parseInt(total_solicitudes) == 0) {
                    porc_bar1pendientes = 0;
                    porc_bar2aprobadas = 0;
                    porc_bar3rechazadas = 0;
                    $('#barra_progreso_pendientes').css('width', redondearDecimales(40, 2) + "%");
                    $('#barra_progreso_aprobadas').css('width', redondearDecimales(40, 2) + "%");
                    $('#barra_progreso_rechazadas').css('width', redondearDecimales(40, 2) + "%");
                    $('#barra_progreso_pendientes').text("No hay solicitudes");
                    $('#barra_progreso_aprobadas').text("No hay solicitudes");
                    $('#barra_progreso_rechazadas').text("No hay solicitudes");
                } else {
                    porc_bar1pendientes = (parseInt(jsonresp[0].solicitud_pendientes_acum) / total_solicitudes * 100);
                    porc_bar2aprobadas = (parseInt(jsonresp[1].solicitud_aprobadas_acum) / total_solicitudes * 100);
                    porc_bar3rechazadas = (parseInt(jsonresp[2].solicitud_rechazadas_acum) / total_solicitudes * 100);
                    $('#barra_progreso_pendientes').css('width', redondearDecimales(porc_bar1pendientes, 2) + "%");
                    $('#barra_progreso_aprobadas').css('width', redondearDecimales(porc_bar2aprobadas, 2) + "%");
                    $('#barra_progreso_rechazadas').css('width', redondearDecimales(porc_bar3rechazadas, 2) + "%");
                    $('#barra_progreso_pendientes').text(redondearDecimales(porc_bar1pendientes, 2) + "%");
                    $('#barra_progreso_aprobadas').text(redondearDecimales(porc_bar2aprobadas, 2) + "%");
                    $('#barra_progreso_rechazadas').text(redondearDecimales(porc_bar3rechazadas, 2) + "%");
                }




                //SOLICITUDES DEL AÑO ACTUAL
                $('#ano_actual_sl_pendientes').text("+ " + jsonresp[4].ano_actual_sl_pend + " Año actual");
                $('#ano_actual_sl_aprobadas').text("+ " + jsonresp[5].ano_actual_sl_apr + " Año actual");
                $('#ano_actual_sl_rechazadas').text("+ " + jsonresp[6].ano_actual_sl_rechz + " Año actual");

                //SOLICITUDES DEL MES ANTERIOR
                $('#mes_anterior_sl_pendientes').text("+ " + jsonresp[7].mes_anterior_sl_pend + " Mes anterior");
                $('#mes_anterior_sl_aprobadas').text("+ " + jsonresp[8].mes_anterior_sl_apr + " Mes anterior");
                $('#mes_anterior_sl_rechazadas').text("+ " + jsonresp[9].mes_anterior_sl_rechz + " Mes anterior");

            } else {
                console.log("llenar panel fuera");
            }

        }).fail(function () {
            swalfire("No se pudo mostrar stock maximo de ese estado en particular", "error");
        });
    }

});

function redondearDecimales(numero, decimales) {
    numeroRegexp = new RegExp('\\d\\.(\\d){' + decimales + ',}');   // Expresion regular para numeros con un cierto numero de decimales o mas
    if (numeroRegexp.test(numero)) {         // Ya que el numero tiene el numero de decimales requeridos o mas, se realiza el redondeo
        return Number(numero.toFixed(decimales));
    } else {
        return Number(numero.toFixed(decimales)) === 0 ? 0 : numero;  // En valores muy bajos, se comprueba si el numero es 0 (con el redondeo deseado), si no lo es se devuelve el numero otra vez.
    }
}