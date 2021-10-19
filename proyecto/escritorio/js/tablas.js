$(document).ready(function () {

    // $('[data-tooltip="tooltip"]').tooltip();

    tabla_ciudades_calificados = $('#tabla_ciudades_calificados').DataTable({
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
        "lengthMenu": [[5, 25, 40, 80, -1], [5, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 6 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [

            { "data": "CIUDAD_CALIFICADO" }
        ], "columnDefs": [{
            "targets": [], //oculto la columna ID_USUARIO que tiene posición 0 Y 4
            "visible": false,
            "searchable": true
        },
        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="5">5</option>' +
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

    $(document).on('click', '#expCiudadArtCalificados', function () { $('.buttons-excel').click(); });
    // $(document).on('click', '#expoPdf', function () { $('.buttons-pdf').click(); });
    // $(document).on('click', '#Imprimir', function () { $('.buttons-print').click(); });

    $(".dataTables_filter").hide(); //oculto el filtrador por defecto del datatable
    $('#busquedatablaciudades').keyup(function () {
        tabla_ciudades_calificados.search($(this).val()).draw();
    });
});