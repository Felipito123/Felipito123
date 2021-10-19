function fun_tabla_navegadores(reciberutemisor) {
    tabla_navegadores = $('#tabla_navegadores').DataTable({
        "responsive": true,
        "cache": false,
        "destroy": true,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 7, subitem: 1, reciberutemisor: reciberutemisor }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            { "data": "NAVEGADORES" }
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
        }
    });
}

function fun_tabla_versiones_nav(reciberutemisor) {
    tabla_versiones_nav = $('#tabla_versiones_nav').DataTable({
        "responsive": true,
        "cache": false,
        "destroy": true,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 7, subitem: 2, reciberutemisor: reciberutemisor }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            { "data": "VERSIONES_NAVEGADOR" }
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
        }
    });
}

function fun_tabla_sistemas_oper(reciberutemisor) {
    tabla_sistemas_oper = $('#tabla_sistemas_oper').DataTable({
        "responsive": true,
        "cache": false,
        "destroy": true,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 7, subitem: 3, reciberutemisor: reciberutemisor }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            { "data": "SISTEMAS_OPERATIVOS" }
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
        }
    });
}