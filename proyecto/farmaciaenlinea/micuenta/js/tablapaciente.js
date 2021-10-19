$(document).ready(function () {

    tablasolipaciente = $('#tabla_solicitud_paciente').DataTable({
        //ESTE ES OTRO METODO DE FILTRAR: VERLO EN https://jsfiddle.net/4ruvq6dr/
        // initComplete: function () {
        //     this.api().columns().every( function () {
        //         var column = this;
        //         var select = $('<select><option value="">Seleccione</option></select>')
        //             .appendTo( $('#filters-area') )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );

        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );

        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //     } );
        // },
        "responsive": true,
        "paging": true,  //le oculto la paginación
        "searching": true, //le oculto el buscador
        "info": false,  //le oculto la información de las entradas de la tabla

        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "cache": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR,
        "lengthMenu": [[12, 24, 36, 48, -1], [12, 24, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/acciones.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 3 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error);
            }
        },
        "columns": [
            {
                "data": "IDSOLICITUD",
                "render": function (data, type, JsonResultRow, row) {
                    let res = 31241260 + parseInt(data);
                    // let res2= parseInt(res)-31241260;
                    return res;
                }
            },
            { "data": "RUT" },
            {
                "data": "FECHA",
                "render": function (data, type, JsonResultRow, row) {
                    let separa1 = data.split(" ");
                    let separa2 = separa1[0].split("-");
                    let fechaordenada = separa2[2] + "-" + separa2[1] + "-" + separa2[0] + " " + separa1[1];
                    return fechaordenada;
                }
            },
            {
                render: function (data, type, JsonResultRow, row) {

                    let ID = JsonResultRow.IDSOLICITUD;
                    $.post('funciones/acciones.php', { seleccionar: 6, idsolicitud: JsonResultRow.IDSOLICITUD }, function (respuesta) {
                        console.log(respuesta);
                        if (respuesta == -1) {console.log("¡Ha ocurrido un error en render de acciones del datatable!");
                        } else if (respuesta >= 1 && JsonResultRow.SEGUIMIENTO==2) {
                            $('#boton-' + ID).hide(); //si tiene solicitudes aprobadas no puede borrar(porque se descontó stock del material)
                            $('#botonverboleta-' + ID).removeAttr('hidden'); //muestro la boleta solo cuando la solicitud esté aprobada, sino queda oculto
                        }else if (respuesta >= 1) {
                            $('#boton-' + ID).hide(); //si tiene solicitudes aprobadas no puede borrar(porque se descontó stock del material)
                        } else if (respuesta == -2) {
                            $('#boton-' + ID).prop('hidden',true);
                        }
                    });

                    let concatenar = `
                    <div class='row justify-content-center'>
                    <div class='col align-items-center'>
                    <div class='btn-group'>
                    <label class='btn btn-warning btn-sm btnDetalleSolicitud' title='Ver detalle de la solicitud' ><i class='fa fa-eye' aria-hidden='true'></i></label>
                    <label class='btn btn-brown btn-sm btnVerBoleta' id="botonverboleta-`+ JsonResultRow.IDSOLICITUD + `" title='Ver boleta' hidden><i class='fas fa-scroll' aria-hidden='true'></i></label>
                    <label class='btn btn-danger btn-sm btnBorrarSolicitud' id="boton-`+ JsonResultRow.IDSOLICITUD + `" style='color:white' title='Cancelar solicitud'><i class="fas fa-window-close" aria-hidden='true'></i></label>
                    `;
                    concatenar += `</div></div></div>`;
                    return concatenar;
                }
            }
            // {
            //     "defaultContent":
            //         " <div class='row justify-content-center'>" +
            //         "<div class=' col align-items-center'>" +
            //         "<div class='btn-group'>" +
            //         "<label class='btn btn-warning btn-circle btn-sm btnDetalleSolicitud' title='Ver detalle de la solicitud' ><i class='fa fa-eye' aria-hidden='true'></i></label>" +
            //         "<label class='btn btn-danger btn-circle btn-sm btnBorrarSolicitud' style='color:white' title='Cancelar solicitud'><i class='fa fa-close' aria-hidden='true'></i></label>" +
            //         "</div>" +
            //         "</div>" +
            //         "</div>"
            // }
        ], "columnDefs": [{

            "targets": [], //oculto la columna que tiene posición 0
            "visible": false,
            "searchable": true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="12">12</option>' +
                '<option value="24">24</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay solicitudes que mostrar",
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
            }
        }

    });
    //===================================================================LLENADO DE DATATABLE===================================================================//     

    //HICE UN FILTRADOR NUEVO PORQUE EL DEL DATATABLE NO SE ADAPTABA AL ANCHO
    $(".dataTables_filter").hide(); //oculto el filtrador por defecto del datatable
    $('#filtradorexterno').keyup(function () {
        tablasolipaciente.search($(this).val()).draw();
    });

    window.addEventListener("resize", function (event) {
        if (document.body.clientWidth > 1000) { //si el ancho es mayor a 1000 pixeles le agrego el modo responsivo, ese div lo tengo predefinido en el html
            $("#vereltamanoresponsivo").removeClass("table-responsive");
        } else {
            $("#vereltamanoresponsivo").addClass("table-responsive");
        }
    });

    $(document).on('click', '.btnDetalleSolicitud', function () { //AQUI EDITO AL USUARIO
        let idsolicitud = (tablasolipaciente.row($(this).closest('tr')).data().IDSOLICITUD);
        let seguimiento = (tablasolipaciente.row($(this).closest('tr')).data().SEGUIMIENTO);
        let nombre_seguimiento='';
 
        // if (data == 0) resultado = '<span class="badge badge-secondary" style="width:80px">En espera</span>';
        // else if (data == 1) resultado = '<span class="badge badge-info" style="width:80px">En transito</span>';
        // else if (data == 2) resultado = '<span class="badge badge-success" style="width:80px">Entregado</span>';
        // else if (data == 3) resultado = '<span class="badge badge-danger" style="width:130px">Solicitud rechazada</span>';
        

        if(seguimiento==0){
            nombre_seguimiento='<span class="badge badge-secondary p-2">SOLICITUD EN ESPERA</span>';
        }else if (seguimiento==1){
            nombre_seguimiento='<span class="badge badge-info p-2">SOLICITUD EN TRANSITO</span>';
        }else if (seguimiento==2){
            nombre_seguimiento='<span class="badge badge-success p-2">SOLICITUD ENTREGADA</span>';
        }else if (seguimiento==3){
            nombre_seguimiento='<span class="badge badge-danger p-2">SOLICITUD RECHAZADA</span>';
        }


        $.post('funciones/acciones.php', {
            seleccionar: 4,
            idsolicitud: idsolicitud
        }, function (respuesta) {
            if (respuesta == 1) {
                swalfire("¡Ha ocurrido un error al completar los campos!", "error");
            } else {
                $('#idtbody').html(respuesta);
            }
        });

        Swal.fire({
            title: '<h2><strong>D E T A L L E &nbsp;D E &nbsp;S O L I C I T U D</strong></h2>',
            html: `
            <div class="row justify-content-center">

                <div class="col-xl-12 pb-4 text-right">
                &nbsp;`+nombre_seguimiento+`&nbsp;
                </div>
                <div class="col-xl-12">
                    <div class="table-responsive">
                        <table class="table" id="tabla_solicitud_paciente">
                            <thead class="bg-warning text-center" style="color:white">
                                <tr>
                                    <th scope="col">MEDICAMENTO</th>
                                    <th scope="col">DOSIFICACION</th>
                                    <th scope="col">CANTIDAD</th>
                                    <th scope="col">COMENTARIO</th>
                                    <th scope="col">ESTADO</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="idtbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>`,
            focusConfirm: false,
            showCancelButton: true,
            showConfirmButton: false,
            allowOutsideClick: false,
            // confirmButtonText: 'Guardar',
            // confirmButtonColor: "#f6c23e",
            cancelButtonText: '<div style="width:200px"><i class="fa fa-close pr-2" aria-hidden="true"></i> Cerrar</div>',
            cancelButtonColor: "#858796",
            width: '850px'
        });
    });

    $(document).on('click', '.btnBorrarSolicitud', function () { //AQUI BORRO LA SOLICITUD SI SOLO HAY PENDIENTES
        let idsolicitud = (tablasolipaciente.row($(this).closest('tr')).data().IDSOLICITUD);

        $.post('funciones/acciones.php', {
            seleccionar: 5,
            idsolicitud: idsolicitud
        }, function (respuesta) {
            console.log("respuesta eliminar: " + respuesta);
            if (respuesta == 1) {
                swalfire("¡No se puede eliminar porque existe solicitud aprobada!", "error");
            } else if (respuesta == 2) {
                swalfire("¡Hubo un error al eliminar la solicitud, contacte a soporte.!", "error");
            } else if (respuesta == 3) {
                // swalfire("¡Solicitud eliminada correctamente!", "success");
                alertify.set('notifier', 'position', 'top-left');
                alertify.success("¡Solicitud eliminada!");
                tablasolipaciente.ajax.reload(null, false);
            } else if (respuesta == 4) {
                swalfire("¡No se han recibido parámetros, contacte a soporte.!", "error");
            }
        });
    });

    $(document).on('click', '.btnVerBoleta', function () { //AQUI MUESTRO LA BOLETA
        let idsolicitud = (tablasolipaciente.row($(this).closest('tr')).data().IDSOLICITUD);
        let nuevaidsolicitud = 31241260 + parseInt(idsolicitud);

        Swal.fire({
            title: '<h2><strong>B O L E T A </strong></h2>',
            html: `
            <div class="container-fluid">
                <div class="row justify-content-center pb-3" id="error" hidden>
                    <span class="badge badge-info" style="padding: 10px;"><i class="fa fa-exclamation-circle"></i> Archivo no encontrado</span>
                </div>
                <div class="row justify-content-center">
                    <iframe id="frameboleta" src="./funciones/boleta.php?var=`+nuevaidsolicitud+`" frameborder="0" scrolling="si" width="100%" height="750px"></iframe>
                </div>
            </div>`,
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


});