//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tablausuariozoom = $('#tabla-usuario-zoom').DataTable({
        "responsive": true,
        "paging": false,  //le oculto la paginación
        "searching": false, //le oculto el buscador
        "info": false,  //le oculto la información de las entradas de la tabla
        "bAutoWidth": false, //LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        //"lengthMenu": [[5, 12, 36, 48, -1], [5, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_tabla_reunionesactivas.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "ESTADO_REUNION" },
            { "data": "ASUNTO_REUNION" },
            //{ "data": "FECHA_REUNION" },
            {
                "data": "FECHA_REUNION",
                "render": function (data, type, JsonResultRow, row) {
                    let var1 = data.split('T');
                    let v1 = var1[0].split('-'); // voy a dar vuelta los valores ya que la fecha se muestra al reves 2020-11-04
                    //return v1[2]+v1[1]+v1[0]; //dia, mes, añ0
                    return v1[2] + '-' + v1[1] + '-' + v1[0] + ' ' + var1[1];
                }

            },
            { "data": "DURACION_REUNION" },
            { "data": "CONTRASENA_REUNION" },
            {
                "data": "URL_REUNION",
                "render": function (data, type, JsonResultRow, row) {
                    //Agregue el onclick para que no se mostrara la ruta, tengo que seguir mejorando para que no se muestra la ruta en la nueva pestaña
                    //href="planillaArchivo/' + JsonResultRow.ID_PLANILLA + '/' + data + '"
                    if (JsonResultRow.ESTADO_REUNION == 'pendiente') {
                        return '<a href="javascript:void(0);"  class="btn btn-warning btn-sm disabled" style="width:90px; background-color: #a9811c;border-color: #a9811c;">Pendiente</a>';
                    }
                    else {
                        return '<a onclick="window.open(\'' + data + '\',\'_blank\')"  class="btn btn-warning btn-sm" style="width:90px;color:white;">Iniciar</a>';
                    }
                }

            }
        ], "columnDefs": [{

            "targets": [0], //oculto la columna que tiene posición 0
            "visible": false,
            //"searchable": false //true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="5">5</option>' +
                '<option value="12">12</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
                '<option value="-1">All</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay videoconferencias próximas",
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



    tablausuariozoomfinalizada = $('#tabla-usuario-zoom-finalizada').DataTable({
        "responsive": true,
        "paging": false,  //le oculto la paginación
        "searching": false, //le oculto el buscador
        "info": false,  //le oculto la información de las entradas de la tabla
        "cache": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        //"lengthMenu": [[5, 12, 36, 48, -1], [5, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_tabla_reunionfinalizada.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "ASUNTO_REUNION" },
            //  { "data": "FECHA_REUNION" },
            {
                "data": "FECHA_REUNION",
                "render": function (data, type, JsonResultRow, row) {
                    let var1 = data.split('T');
                    let v1 = var1[0].split('-'); // voy a dar vuelta los valores ya que la fecha se muestra al reves 2020-11-04
                    //return v1[2]+v1[1]+v1[0]; //dia, mes, añ0
                    return v1[2] + '-' + v1[1] + '-' + v1[0] + ' ' + var1[1];
                }

            },
            { "data": "DURACION_REUNION" },
            // { "data": "CONTRASENA_REUNION" },
            { "data": "ANFITRION_REUNION" }
        ], "columnDefs": [{

            "targets": [], //oculto la columna que tiene posición 0
            "visible": false,
            //"searchable": false //true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="5">5</option>' +
                '<option value="12">12</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
                '<option value="-1">All</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay videoconferencias terminadas",
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
});