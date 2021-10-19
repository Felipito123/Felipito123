$(document).ready(function () {
    tablapatologia = $('#tabla-patologias').DataTable({
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
            // { "data": "ID_PATOLOGIA" },
            { "data": "NOMBRE_PATOLOGIA" },
            {
                "data": "ESTADO_PATOLOGIA",
                "render": function (data, type, JsonResultRow, row) {
                    if (data == 0) {
                        return '<label class="btn btn-warning btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Inactiva</label>';
                    }
                    else {
                        return '<label class="btn btn-success btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Activa</label>';
                    }

                }
            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" + 
                    "<button class='btn btn-info btn-sm btnEditar' title=\"Editar patologia\"><i class='fa fa-edit' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-success btn-sm btnActivar' title=\"Activar patologia\"><i class='fas fa-arrow-circle-up'></i></button>" +
                    "<button class='btn btn-warning btn-sm btnInactivar' title=\"Inactivar patologia\"><i class='fas fa-arrow-circle-down'></i></button>" +
                    "<button class='btn btn-danger btn-sm btnEliminar' title=\"Eliminar patologia\"><i class='fas fa-trash'></i></button>" +
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
            "sEmptyTable": "No hay patologias disponibles en esta tabla",
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


    $("#formRegistrarPatologia").on('submit', function (event) {
        event.preventDefault();
        agregarpatologia();
    });

    // $(document).on('click', '#botonagregarpatologia', function () { //AQUI EDITO AL USUARIO
    //     agregarpatologia();
    // });

    $(document).on('click', '.btnEditar', function () { //AQUI EDITO AL USUARIO
        let IDpatologia = (tablapatologia.row($(this).closest('tr')).data().ID_PATOLOGIA);
        let Nombrepatologia = (tablapatologia.row($(this).closest('tr')).data().NOMBRE_PATOLOGIA);
        editarpatologia(IDpatologia,Nombrepatologia);
    });

    $(document).on('click', '.btnEliminar', function () { //AQUI EDITO AL USUARIO
        let Idpatologia = (tablapatologia.row($(this).closest('tr')).data().ID_PATOLOGIA);
        eliminarpatologia(Idpatologia);
    });

    $(document).on('click', '.btnActivar', function () { //AQUI EDITO AL USUARIO
        let IDpatologia = (tablapatologia.row($(this).closest('tr')).data().ID_PATOLOGIA);
        ActivaroInactivarPatologia(IDpatologia,1);
    });

    $(document).on('click', '.btnInactivar', function () { //AQUI EDITO AL USUARIO
        let IDpatologia = (tablapatologia.row($(this).closest('tr')).data().ID_PATOLOGIA);
        ActivaroInactivarPatologia(IDpatologia,2);
    });
    
    
});