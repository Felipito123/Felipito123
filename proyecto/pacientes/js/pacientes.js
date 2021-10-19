$(document).ready(function () {
    tablapacientes = $('#tabla-pacientes').DataTable({
        "responsive": true,
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 5 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            // { "data": "ID_PATOLOGIA" }, ESTA ID YA LA MUESTRO EN JSON EN EL DATATABLE NO ES NECESARIO PASARLA DIRECTAMENTE
            { "data": "NOMBRE_PATOLOGIA" },
            { "data": "RUT_PACIENTE" },
            { "data": "NOMBRES_PACIENTE" },
            { "data": "APELLIDOS_PACIENTE" },
            { "data": "DIRECCION_PACIENTE" },
            { "data": "TELEFONO_PACIENTE" },
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
                    return edad+' años';
                }
            },
            {
                "data": "SEXO_PACIENTE",
                "render": function (data, type, JsonResultRow, row) {
                    if(data == "Hombre") {return "H";}
                    else {return "M";}
                }
            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnEditarPaciente' title=\"Editar patologia\"><i class='fa fa-edit' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-danger btn-sm btnInactivoPaciente' title=\"Eliminar paciente\"><i class='fa fa-trash' aria-hidde='true'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [4,5], //oculto la columna ID_USUARIO que tiene posición 0 Y 4
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
            "sEmptyTable": "No hay pacientes disponibles en esta tabla",
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

    // $(document).on('click', '#botonagregarpaciente', function () { //AQUI EDITO AL USUARIO
    //     agregarpaciente();
    // });

    llenarselectpatologias();

    $("#formRegistrarPaciente").on('submit', function (event) {
        event.preventDefault();
        agregarpaciente();
    });

    $(document).on('click', '.btnEditarPaciente', function () { //AQUI EDITO AL USUARIO
        let idpatologia = (tablapacientes.row($(this).closest('tr')).data().ID_PATOLOGIA);
        let rutpaciente = (tablapacientes.row($(this).closest('tr')).data().RUT_PACIENTE);
        let nombrepaciente = (tablapacientes.row($(this).closest('tr')).data().NOMBRES_PACIENTE);
        let apellidospaciente = (tablapacientes.row($(this).closest('tr')).data().APELLIDOS_PACIENTE);
        let direccionpaciente = (tablapacientes.row($(this).closest('tr')).data().DIRECCION_PACIENTE);
        let telefonopaciente = (tablapacientes.row($(this).closest('tr')).data().TELEFONO_PACIENTE);
        let correopaciente = (tablapacientes.row($(this).closest('tr')).data().CORREO_PACIENTE);
        let edadpaciente = (tablapacientes.row($(this).closest('tr')).data().EDAD_PACIENTE);
        let sexopaciente = (tablapacientes.row($(this).closest('tr')).data().SEXO_PACIENTE);
        

        llenarselecteditarpaciente(idpatologia);

        editarpaciente(idpatologia,rutpaciente,nombrepaciente,apellidospaciente,direccionpaciente,telefonopaciente,correopaciente,edadpaciente,sexopaciente);
    });

    $(document).on('click', '.btnInactivoPaciente', function () { //AQUI EDITO AL USUARIO
        let rutpaciente = (tablapacientes.row($(this).closest('tr')).data().RUT_PACIENTE);
        eliminarpaciente(rutpaciente);
    });
    
});