$(document).ready(function () {

    // const url = window.location.search;
    // const buscaparametro = new URLSearchParams(url);
    // const variableabuscar = buscaparametro.get('mt');

    tablasolicitudes = $('#tabla_solicitudes').DataTable({
        "responsive": true,
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        // "oSearch": { "sSearch": (variableabuscar != null) ? variableabuscar : '' },
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
                render: function (data, type, JsonResultRow, row) {
                    let res = "";

                    if (JsonResultRow.SEGUIMIENTO == 0) {
                        let fechasolicitud = JsonResultRow.FECHA_SOLICITUD;
                        if (calculardiasentredosfechas(fechasolicitud) >= 0 && calculardiasentredosfechas(fechasolicitud) <= 2) {
                            res += '<span class="dot" style="background-color: #86ecf9;"></span>';
                        } else if (calculardiasentredosfechas(fechasolicitud) > 2 && calculardiasentredosfechas(fechasolicitud) <= 7) {
                            res += '<span class="dot" style="background-color:#ffa900;"</span>';
                        } else if (calculardiasentredosfechas(fechasolicitud) > 7 && calculardiasentredosfechas(fechasolicitud) <= 15) {
                            res += '<span class="dot" style="background-color:#00b74a;"></span>';
                        } else if (calculardiasentredosfechas(fechasolicitud) > 15 && calculardiasentredosfechas(fechasolicitud) <= 30) {
                            res += '<span class="dot" style="background-color:#f93154;"></span>';
                        } else {
                            res += '<span class="dot" style="background-color:#b23cfd;"></span>';
                        }
                    } else {
                        res += '<i class="fas fa-check-circle" style="color: #1266f1;"></i>';
                    }

                    // console.log(calculardiasentredosfechas(JsonResultRow.FECHA_SOLICITUD));

                    return res;
                }
            },
            {
                "data": "ID_SOLICITUD",
                "render": function (data, type, JsonResultRow, row) {
                    let res = 31241260 + parseInt(data);
                    // let res2= parseInt(res)-31241260;
                    return res;
                }
            },
            { "data": "RUT_PACIENTE" },
            { "data": "NOMBRE_PACIENTE" },
            {
                "data": "FECHA_SOLICITUD",
                "render": function (data, type, JsonResultRow, row) {
                    let separa1 = data.split(" ");
                    let separa2 = separa1[0].split("-");
                    let fechaordenada = separa2[2] + "-" + separa2[1] + "-" + separa2[0] + " " + separa1[1];
                    return fechaordenada;
                }
            },
            {
                "data": "SEGUIMIENTO",
                "render": function (data, type, JsonResultRow, row) {
                    let resultado;
                    if (data == 0) resultado = '<span class="badge badge-secondary" style="width:80px">En espera</span>';
                    else if (data == 1) resultado = '<span class="badge badge-info" style="width:80px">En transito</span>';
                    else if (data == 2) resultado = '<span class="badge badge-success" style="width:80px">Entregado</span>';
                    else if (data == 3) resultado = '<span class="badge badge-danger" style="width:130px">Solicitud rechazada</span>';
                    return resultado;
                }
            },
            {
                render: function (data, type, JsonResultRow, row) {
                    let concatenar = `
                        <div class='row justify-content-center'>
                            <div class='col align-items-center'>
                                <div class='btn-group'>
                                    <label class='btn btn-warning btn-sm btnVerDetalleSolicitud' title='Ver detalle de la solicitud'><i class='fas fa-file-signature' aria-hidden='true'></i></label>
                    `;

                    if (JsonResultRow.SEGUIMIENTO == 1) { //si ya esta en transito aparece solo el boton de entrega
                        concatenar += ` 
                        <label class='btn btn-default btn-sm btnEspera' title='En espera'><i class='fas fa-stopwatch'></i></label>
                        <label class='btn btn-success btn-sm btnEntregado' title='Entregado'><i class='fas fa-home'></i></label>
                        <label class='btn btn-brown btn-sm btnBoleta' title='Ver boleta'><i class='fas fa-scroll'></i></label>`;
                    } else if (JsonResultRow.SEGUIMIENTO == 2) { //si ya esta en entrega aparece solo el boton de en transito, en caso que quiera retroceder el paso
                        concatenar += `
                        <label class='btn btn-default btn-sm btnEspera' title='En espera'><i class='fas fa-stopwatch'></i></label>
                        <label class='btn btn-info btn-sm btnEnTransito' title='En transito'><i class='fas fa-truck'></i></label>
                        <label class='btn btn-brown btn-sm btnBoleta' title='Ver boleta'><i class='fas fa-scroll'></i></label>`;
                    } else if (JsonResultRow.SEGUIMIENTO == 3) { //si ya esta en entrega aparece solo el boton de en transito, en caso que quiera retroceder el paso
                        concatenar += ``; //<label class='btn btn-danger btn-sm' title='Todas las solicitudes han sido rechazadas'><i class='fas fa-thumbs-down'></i> Rechazadas</label>
                    } else {
                        concatenar += `
                    <label class='btn btn-info btn-sm btnEnTransito' title='En transito' ><i class='fas fa-truck'></i></label>
                    <label class='btn btn-success btn-sm btnEntregado' title='Entregado' ><i class='fas fa-home'></i></label>
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
            "sEmptyTable": "No hay solicitudes de pacientes en esta tabla",
            "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Filtrar:",
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

    //===================================================================LLENADO DE DATATABLE===================================================================//     

    $(document).on('click', '.btnVerDetalleSolicitud', function () { //VER DETALLE DE LA SOLICITUD
        let idsolicitud = (tablasolicitudes.row($(this).closest('tr')).data().ID_SOLICITUD);
        let rutpaciente = (tablasolicitudes.row($(this).closest('tr')).data().RUT_PACIENTE);
        recarga();
        function recarga() {
            // console.log("ID: "+idsolicitud+" rut: "+rutpaciente);
            $.post('funciones/acceso.php', { seleccionar: 2, idsolicitud: idsolicitud, rutpaciente: rutpaciente }, function (respuesta) {
                if (respuesta == 1) swalfire("¡Campos vacios!", "error");
                else if (respuesta == 2) swalfire("¡Ha ocurrido un error, no se han recibido parámetros, contacte a soporte!", "error");
                else $('#idtbody').html(respuesta);


                $('.botonmenos').on('click', function () {
                    let IDMED = $(this).val();
                    let cantidad = $('#campocantidad-' + IDMED).val();
                    cantidad_a_calcular = parseInt(cantidad);
                    if (cantidad_a_calcular > 1) { //para dejar por defecto 1 cantidad y reste cuando el campo minimo sea 2
                        $('#campocantidad-' + IDMED).val(cantidad_a_calcular - 1);
                    }
                });

                $('.botonmas').on('click', function () {
                    let porcion = $(this).val().split(",");
                    let IDMED = porcion[0];
                    let stocktotal = porcion[1];

                    let cantidad = $('#campocantidad-' + IDMED).val();
                    cantidad_a_calcular = parseInt(cantidad);
                    if (cantidad_a_calcular < parseInt(stocktotal)) {
                        $('#campocantidad-' + IDMED).val(cantidad_a_calcular + 1);
                    } else {
                        toastr.error("No hay más stock en este medicamento");
                    }
                });


                $('.btnaprobar').on('click', function () {

                    let porcion = $(this).val().split(",");
                    let IDMED = porcion[0];
                    let IDSOLC = porcion[1];
                    let stocktotal = porcion[2];
                    let cantidad = "";

                    /*Esto porque en acceso.php seleccion 2, cuando es estado 2(aprobado) o 3(rechazado) oculto el campo cantidad y queda undefined 
                    entonces como muestro solo el td con el stock, obtengo el valor desde el td directamente*/
                    if (porcion[3] == 3) {
                        cantidad = $('#idtbody tr').find('td').eq(2).text();
                    }
                    else {
                        cantidad = $('#campocantidad-' + IDMED).val();
                    }

                    // let cantidad = $('#campocantidad-' + IDMED).val();
                    let comentario = $('#comentario-' + IDMED).val();
                    let estado = 2;

                    console.log("ID MEDICAMENTO:" + IDMED + "\nIDSOLC: " + IDSOLC + "\nCANTIDAD: " + cantidad + "\nCOMENTARIO: " + comentario + "\nESTADO: " + estado);

                    if (cantidad == 0 || cantidad == '') { toastr.info("Campo cantidad vacio"); }
                    else if (parseInt(cantidad) < 0) { toastr.info("Campo cantidad negativo"); }
                    else if (cantidad > parseInt(stocktotal)) { toastr.info("Ha excedido stock en este medicamento"); }
                    else {

                        $.post('funciones/acceso.php', {
                            seleccionar: 3,
                            idmedicamento: parseInt(IDMED),
                            idsolicitudmed: parseInt(IDSOLC),
                            stocktotal: parseInt(stocktotal),
                            stockaprobado: parseInt(cantidad),
                            comentario: comentario,
                            estadosolicitud: 2
                        }, function (respuesta) {
                            console.log("APROBAR: " + respuesta);
                            if (respuesta == 1) { toastr.error("¡Campos vacios!"); }
                            else if (respuesta == 2) { toastr.error("¡Ya está aprobado!"); }
                            else if (respuesta == 3) { toastr.error("¡No se ha recibido parámetros, contacte a soporte.!"); }
                            else if (respuesta == 4 || respuesta == 5 || respuesta == 6) { toastr.error("¡Ha ocurrido una incronguencia de los datos, por favor contacte a soporte.!"); }
                            else if (respuesta == 7) { toastr.success("¡Solicitud aprobada!"); tablasolicitudes.ajax.reload(null, false); recarga(); }
                        });
                        // toastr.success("Puede enviar");
                    }
                });

                $('.btnpendiente').on('click', function () {
                    let porcion = $(this).val().split(",");
                    let IDMED = porcion[0];
                    let IDSOLC = porcion[1];
                    // console.log("Solicitud pendiente: " + IDMED + "\nIDSOLC: " + IDSOLC);
                    if (validavacioynulo([IDMED, IDSOLC])) { swalfire("¡Datos vacios, contacte a soporte!", "info"); }
                    else {
                        $.post('funciones/acceso.php', { seleccionar: 4, idmedicamento: parseInt(IDMED), idsolicitudmed: parseInt(IDSOLC), estadosolicitud: 1 }, function (respuesta) {
                            console.log("PENDIENTE: " + respuesta);
                            if (respuesta == 1) { toastr.error("¡Campos vacios!"); }
                            else if (respuesta == 2) { toastr.error("¡Ya está pendiente!"); }
                            else if (respuesta == 3) { toastr.error("¡Hubo un error, contacte a soporte.!"); }
                            else if (respuesta == 4) { toastr.success("¡Solicitud pendiente!"); tablasolicitudes.ajax.reload(null, false); recarga(); }
                        });
                    }

                });

                $('.btnrechazar').on('click', function () {
                    let porcion = $(this).val().split(",");
                    let IDMED = porcion[0];
                    let IDSOLC = porcion[1];
                    // console.log("Solicitud rechazada: " + IDMED + "\nIDSOLC: " + IDSOLC);
                    if (validavacioynulo([IDMED, IDSOLC])) { swalfire("¡Datos vacios, contacte a soporte!", "info"); }
                    else {
                        $.post('funciones/acceso.php', { seleccionar: 4, idmedicamento: parseInt(IDMED), idsolicitudmed: parseInt(IDSOLC), estadosolicitud: 3 }, function (respuesta) {
                            console.log("RECHAZADO: " + respuesta);
                            if (respuesta == 1) { toastr.error("¡Campos vacios!"); }
                            else if (respuesta == 2) { toastr.error("¡Ya está rechazada!"); }
                            else if (respuesta == 3) { toastr.error("¡Hubo un error, contacte a soporte.!"); }
                            else if (respuesta == 4) { toastr.success("¡Solicitud rechazada!"); tablasolicitudes.ajax.reload(null, false); recarga(); } // tablasolicitudes.ajax.reload(null, false);
                        });
                    }
                });

            });

            Swal.fire({
                title: '<h2><strong>D E T A L L E &nbsp; D E &nbsp; S O L I C I T U D</strong></h2>',
                html: `<div class="row justify-content-center pt-3">
                            <div class="col-xl-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table" id="tabla_solicitud_paciente">
                                        <thead class="bg-warning text-center" style="color:white">
                                            <tr>
                                                <th scope="col" title="Stock disponible">ST. DISPONIBLE</th>
                                                <th scope="col">MEDICAMENTO</th>
                                                <th scope="col">DOSIFICACION</th>
                                                <th scope="col">CANTIDAD</th>
                                                <th scope="col">ESTADO</th>
                                                <th scope="col">COMENTARIO</th>
                                                <th scope="col">ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center" id="idtbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> `,
                focusConfirm: false,
                showCancelButton: true,
                showConfirmButton: false,
                allowOutsideClick: false,
                // confirmButtonText: 'Guardar',
                // confirmButtonColor: "#f6c23e",
                cancelButtonText: '<div  style="width:390px"><i class="fa fa-close pr-2" aria-hidden="true"></i> Cerrar</div>',
                cancelButtonColor: "#858796",
                width: '1190px'
            });
        }
    });


    $(document).on('click', '.btnEnTransito', function () { //AQUI CAMBIO A ESTADO EN TRÁNSITO LA SOLICITUD
        // toastr.success("EN TRÁNSITO");
        let idsolicitud = (tablasolicitudes.row($(this).closest('tr')).data().ID_SOLICITUD);
        let rutpaciente = (tablasolicitudes.row($(this).closest('tr')).data().RUT_PACIENTE);

        $.post('funciones/acceso.php', { seleccionar: 5, subselect: 1, idsolicitud: idsolicitud, rutpaciente: rutpaciente }, function (respuesta) {
            // console.log("En tránsito: "+respuesta);
            if (respuesta == 1) { toastr.error("¡Campos vacios!"); }
            else if (respuesta == 2) { toastr.error("¡No hay solicitudes aprobadas para cambiar estado en tránsito!"); }
            else if (respuesta == 3) { toastr.error("¡Hubo un error, contacte a soporte.!"); }
            else if (respuesta == 4) { toastr.success("¡Solicitud en tránsito!"); tablasolicitudes.ajax.reload(null, false); }
        });

    });

    $(document).on('click', '.btnEntregado', function () { //AQUI CAMBIO A ESTADO ENTREGADO LA SOLICITUD
        // toastr.success("ENTREGADO");
        let idsolicitud = (tablasolicitudes.row($(this).closest('tr')).data().ID_SOLICITUD);
        let rutpaciente = (tablasolicitudes.row($(this).closest('tr')).data().RUT_PACIENTE);
        $.post('funciones/acceso.php', { seleccionar: 5, subselect: 2, idsolicitud: idsolicitud, rutpaciente: rutpaciente }, function (respuesta) {
            // console.log("En tránsito: "+respuesta);
            if (respuesta == 1) { toastr.error("¡Campos vacios!"); }
            else if (respuesta == 2) { toastr.error("¡No hay solicitudes aprobadas para cambiar estado entregado!"); }
            else if (respuesta == 3) { toastr.error("¡Hubo un error, contacte a soporte.!"); }
            else if (respuesta == 4) { toastr.success("¡Solicitud entregada!"); tablasolicitudes.ajax.reload(null, false); }
        });
    });


    $(document).on('click', '.btnEspera', function () { //AQUI CAMBIO A ESTADO EN ESPERA LA SOLICITUD
        // toastr.success("Espera");
        let idsolicitud = (tablasolicitudes.row($(this).closest('tr')).data().ID_SOLICITUD);
        let rutpaciente = (tablasolicitudes.row($(this).closest('tr')).data().RUT_PACIENTE);
        $.post('funciones/acceso.php', { seleccionar: 5, subselect: 3, idsolicitud: idsolicitud, rutpaciente: rutpaciente }, function (respuesta) {
            // console.log("En tránsito: "+respuesta);
            if (respuesta == 1) { toastr.error("¡Campos vacios!"); }
            else if (respuesta == 2) { toastr.error("¡Hubo un error, contacte a soporte.!"); }
            else if (respuesta == 3) { toastr.success("¡Solicitud en espera!"); tablasolicitudes.ajax.reload(null, false); }
        });
    });


    $(document).on('click', '.btnBoleta', function () { //AQUI VEO LA BOLETA DE UNA SOLICITUD EN PARTICULAR
        let idsolicitud = (tablasolicitudes.row($(this).closest('tr')).data().ID_SOLICITUD);
        let solicitudCodificada = 31241260 + parseInt(idsolicitud);
        Swal.fire({
            title: '<h2><strong>B O L E T A </strong></h2>',
            html: `<div class="container-fluid">
                        <div class="row justify-content-center pb-3" id="error" hidden>
                            <span class="badge badge-info" style="padding: 10px;"><i class="fa fa-exclamation-circle"></i> Archivo no encontrado</span>
                        </div>
                        <div class="row justify-content-center">
                            <iframe id="frameboleta" src="../farmaciaenlinea/micuenta/funciones/boleta.php?var=`+ solicitudCodificada + `" frameborder="0" scrolling="si" width="100%" height="750px"></iframe>
                        </div>
                    </div> `,
            focusConfirm: false,
            showCancelButton: true,
            showConfirmButton: false,
            // confirmButtonText: 'Guardar',
            // confirmButtonColor: "#f6c23e",
            cancelButtonText: '<div style="width:200px"><i class="fa fa-close pr-2" aria-hidden="true"></i> Cerrar</div>',
            cancelButtonColor: "#858796",
            width: '550px'
        });

    });

    function calculardiasentredosfechas(fecharecibidainicio) {
        let inicio = fecharecibidainicio.split(" "); //separo la fecha de la hora
        let fechaI = inicio[0].split("-"); //porciono la fecha para dar nuevo formato mes/dia/año
        let fechainicio = parseInt(fechaI[1]) + '/' + fechaI[2] + '/' + fechaI[0];

        const fechaactual = new Date();
        const añoActual = fechaactual.getFullYear();
        const mesActual = fechaactual.getMonth() + 1;
        const diaActual = fechaactual.getDate();

        let fechafin = mesActual + '/' + diaActual + '/' + añoActual;

        const date1 = new Date(fechainicio);
        const date2 = new Date(fechafin);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        // console.log(diffDays + " days");
        return diffDays;

    }


});