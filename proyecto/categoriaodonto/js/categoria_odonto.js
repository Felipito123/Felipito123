//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tablacategoriasodonto = $('#tabla-categorias-odonto').DataTable({
        "responsive": true,
        "cache": false,
        "ordering": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR,
        "lengthMenu": [[8, 16, 25, 50, -1], [8, 16, 25, 50, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1 }, //enviamos opcion para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [

            // { "data": "ID_CATEGORIA_ODONTO" },
            { "data": "NOMBRE_CATEGORIA_ODONTO" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnEditar' title=\"Editar\"><i class='fa fa-pencil-square-o' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-danger btn-sm btnBorrar' title=\"Eliminar\"><i class='fa fa-trash-o' aria-hidde='true'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [], //Comma separated values
            "visible": false,
            "searchable": true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="8">8</option>' +
                '<option value="16">16</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay categorias registradas en esta tabla",
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




    //===================================================================AGREGAR CATEGORIA===================================================================//      

    $('#categoriaodonto').on('keydown', function (ev) { //si en el input se apreta enter se activa el formulario
        if (ev.key === 'Enter') {
            formularioRegistroCategoria();
        }
    });

    $("#formCategoriaOdonto").on('submit', function (event) {
        event.preventDefault(); //evita que el formulario se envie sino hasta que haga las otras consultas dentro de la funcion primero  
        formularioRegistroCategoria();
    });

    //===================================================================AGREGAR CATEGORIA===================================================================//   

    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================// 
    $(document).on("click", ".btnEditar", function () {
        let idcategoria = (tablacategoriasodonto.row($(this).closest('tr')).data().ID_CATEGORIA_ODONTO); //id del datatable
        let nombre_categoria_datatable = (tablacategoriasodonto.row($(this).closest('tr')).data().NOMBRE_CATEGORIA_ODONTO);

        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true
        }).queue([
            {    //value[0]
                title: 'Escriba su nueva categoría',
                input: 'text',
                inputValue: nombre_categoria_datatable,
                inputPlaceholder: 'Escriba su nueva categoría',

                inputValidator: (value) => {
                    if (!value) {
                        return 'Campo no puede ser vacio'
                    }else if (value.length < 2) {
                        return 'Campo muy corto'
                    }else if (value.length >= 45) {
                        return 'Campo muy largo'
                    }else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ /s]*$/.test(value)) {
                        return 'Campo debe ser sólo texto'
                    }
                }
                //text: 'Todos los datos de su cuenta serán eliminados y por consecuencia no podrá recuperar su cuenta. Confirme que desea realizar esta acción.',

            }
        ]).then((result) => {
            
            if (result.value) {

                let nombrecategoria = result.value[0]; //nombre lo saco del input del swal

                if (validavacioynulo([idcategoria,nombrecategoria])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
                else {
                    $.post('funciones/acceso.php', { ID_CATEGORIA: idcategoria, NOMBRE_CATEGORIA: nombrecategoria, seleccionar: 3 }, function (respuesta) {
                        //console.log(respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Campos vacios, compruebe datos!", "error");
                        } else if (respuesta == 2) {
                            tablacategoriasodonto.ajax.reload(null, false);
                            swalfire("¡La categoria ha sido modificada!", "success");
                        } else if (respuesta == 3) {
                            swalfire("¡Ha ocurrido un error al editar la categoria!", "error");
                        } else if (respuesta == 4 || respuesta == 444) {
                            swalfire("No se han recibido los datos", "error");
                        }  else if (respuesta == 6) {
                            swalfire("Ya existe una categoría con ese nombre", "error");
                        }
                    }).fail(function (res) {
                        console.log("FAIL:" + res);
                    });
                }
            } else {
                // swal("¡Cancelado!", "Eliminación cancelada", "info");
            }
        });

    });
    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================//   

    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 

    $(document).on('click', '.btnBorrar', function () {
        let idcategoria = (tablacategoriasodonto.row($(this).closest('tr')).data().ID_CATEGORIA_ODONTO);
        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true,

        }).queue([
            {
                title: '¡Un momento!',
                text: 'Su categoría sera eliminada y no se podra recuperar. ¿Desea continuar?',
            },

        ]).then((result) => {
            if (result.value) {
               // console.log(idcategoria);

                if (validavacioynulo([idcategoria])) { swalfire("¡Campo vacio!", "error"); }
                else {
                    $.post('funciones/acceso.php', { ID_CATEGORIA: idcategoria, seleccionar: 4 }, function (respuesta) {
                        //console.log(respuesta);
                        if (respuesta == 1) { 
                            swalfire("¡Campos vacios, compruebe datos!", "error");
                        } else if (respuesta == 2) {
                            swalfire("¡La categoria tiene un anexo, y por lo tanto no se puede eliminar!", "info");
                        } else if (respuesta == 3) {
                            tablacategoriasodonto.ajax.reload(null, false);
                            swalfire("¡La categoria ha sido eliminada!", "success");
                        } else if (respuesta == 4) {
                            swalfire("¡Ha ocurrido un error al eliminar la categoria!", "error");
                        } else if (respuesta == 5 || respuesta == 444) {
                            swalfire("No se han recibido los datos", "error");
                        }
                    }).fail(function (res) {
                        console.log("FAIL:" + res);
                    });
                }
            } else {
                // swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });


    });

    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 


});