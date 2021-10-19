$(document).ready(function () {
    tablamedicamentos = $('#tabla-medicamentos').DataTable({
        "responsive": true,
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1, subselect:1 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            // { "data": "ID_MEDICAMENTO" }, ESTA ID YA LA MUESTRO EN JSON EN EL DATATABLE NO ES NECESARIO PASARLA DIRECTAMENTE, Y ME SIRVE PARA QUE NO APAREZCA CUANDO IMPRIMA EL DATATBLE
            { "data": "NOMBRE_TIPO_MEDICAMENTO" },
            { "data": "NOMBRE_CATEGORIA" },
            { "data": "NOMBRE_MEDICAMENTO" },
            { "data": "PRECIO_MEDICAMENTO" },
            { "data": "DOSIFICACION_MEDICAMENTO" },
            { "data": "STOCK_MEDICAMENTO" },
            { "data": "CANTIDADMINIMA" },
            { "data": "CANTIDADMAXIMA" },
            // { "data": "IMAGEN_MEDICAMENTO" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnEditarMedicamento' title=\"Editar Medicamento\"><i class='fa fa-edit' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-secondary btn-sm btnMantencionMedicamento' title=\"Mantencion Medicamento\"><i class='fa fa-retweet' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-warning btn-sm btnOcultarMedicamento' title=\"Ocultar Medicamento\"><i class='fas fa-minus-square' aria-hidde='true'></i></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
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
            "sEmptyTable": "No hay medicamentos disponibles en esta tabla",
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
            },
        ]

    });



    tablaTipomedicamentos = $('#tablaTipoMed').DataTable({
        "responsive": true,
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 9}, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            { "data": "NOMBRE_TIPO_MED" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnEditarTipoMed' title=\"Editar Tipo de Medicamento\"><i class='fa fa-edit' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-warning btn-sm btnEliminarTipoMed' title=\"Elminar Tipo de Medicamento\"><i class='fas fa-trash' aria-hidde='true'></i></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
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
            "sEmptyTable": "No hay tipo de medicamentos disponibles en esta tabla",
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


    tablaCatmed = $('#tablaCatMed').DataTable({
        "responsive": true,
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 10 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            { "data": "NOMBRE_CATEGORIA_MED" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnEditarCatMed' title=\"Editar Categoria de Medicamento\"><i class='fa fa-edit' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-warning btn-sm btnEliminarCatMed' title=\"Eliminar Categoria de Medicamento\"><i class='fas fa-trash' aria-hidde='true'></i></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
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
            "sEmptyTable": "No hay categorias de medicamentos disponibles en esta tabla",
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

    // $('#rut').on('keydown', function (ev) { //si se presiona enter en el último input se activa el formulario
    //     if (ev.key === 'Enter') {
    //         $('#btningresaramedicamento').trigger("click");
    //     }
    // });

    $("#formRegistrarMedicamento").on('submit', function (event) {
        event.preventDefault();
        agregarmedicamento();
    });

    $("#formTipoMed").on('submit', function (event) {
        event.preventDefault();
        agregartipomedicamento();
    });

    $("#formCatMed").on('submit', function (event) {
        event.preventDefault();
        agregarcategoriamedicamento();
    });

    // $(document).on('click', '#botonagregarmedicamento', function () { //AQUI AGREGO EL MEDICAMENTO
    //     agregarmedicamento();
    // });

    $(document).on('click', '.btnEditarMedicamento', function () { //AQUI EDITO AL USUARIO
        let idmedicamento = (tablamedicamentos.row($(this).closest('tr')).data().ID_MEDICAMENTO);
        let idtipomedicamento = (tablamedicamentos.row($(this).closest('tr')).data().ID_TIPO_MEDICAMENTO);
        let idcategoria = (tablamedicamentos.row($(this).closest('tr')).data().ID_CATEGORIA_MEDICAMENTO);
        let nombre = (tablamedicamentos.row($(this).closest('tr')).data().NOMBRE_MEDICAMENTO);
        let precio = (tablamedicamentos.row($(this).closest('tr')).data().PRECIO_MEDICAMENTO);
        let dosificacion = (tablamedicamentos.row($(this).closest('tr')).data().DOSIFICACION_MEDICAMENTO);
        let nombreimagen = (tablamedicamentos.row($(this).closest('tr')).data().IMAGEN_MEDICAMENTO);

        editarMedicamento(idmedicamento, idtipomedicamento, idcategoria, nombre, precio, dosificacion, nombreimagen);
    });

    $(document).on('click', '.btnMantencionMedicamento', function () { //AQUI EDITO AL USUARIO
        let idmedicamento = (tablamedicamentos.row($(this).closest('tr')).data().ID_MEDICAMENTO);
        let cantidadmaxima = (tablamedicamentos.row($(this).closest('tr')).data().CANTIDADMAXIMA);
        let stocktotal = (tablamedicamentos.row($(this).closest('tr')).data().STOCK_MEDICAMENTO);
        
        MantencionMedicamento(idmedicamento,cantidadmaxima,stocktotal);
    });

    $(document).on('click', '.btnOcultarMedicamento', function () { //AQUI EDITO AL USUARIO
        let idmedicamento = (tablamedicamentos.row($(this).closest('tr')).data().ID_MEDICAMENTO);
        ocultarmedicamento(idmedicamento);
    });

    $(document).on('click', '.btnEditarTipoMed', function () { //AQUI EDITO AL USUARIO
        let id_tipo_med = (tablaTipomedicamentos.row($(this).closest('tr')).data().ID_TIPO_MED);
        let nombre_tipo_med = (tablaTipomedicamentos.row($(this).closest('tr')).data().NOMBRE_TIPO_MED);
        editarTipoMed(id_tipo_med, nombre_tipo_med);
    });

    $(document).on('click', '.btnEditarCatMed', function () { //AQUI EDITO AL USUARIO
        let id_cat_med = (tablaCatmed.row($(this).closest('tr')).data().ID_CATEGORIA_MED);
        let nombre_cat_med = (tablaCatmed.row($(this).closest('tr')).data().NOMBRE_CATEGORIA_MED);
        editarCatMed(id_cat_med, nombre_cat_med);
    });

    $(document).on('click', '.btnEliminarTipoMed', function () { //AQUI EDITO AL USUARIO
        let id_tipo_med = (tablaTipomedicamentos.row($(this).closest('tr')).data().ID_TIPO_MED);
        eliminarTipoMed(id_tipo_med);
    });

    $(document).on('click', '.btnEliminarCatMed', function () { //AQUI EDITO AL USUARIO
        let id_cat_med = (tablaCatmed.row($(this).closest('tr')).data().ID_CATEGORIA_MED);
        eliminarCatMed(id_cat_med);
    });


});