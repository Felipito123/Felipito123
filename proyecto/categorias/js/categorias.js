//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tablaUsuarios = $('#tablacategorias').DataTable({
        "responsive": true,
        "ordering": false,
        "lengthMenu": [[8, 16, 25, 50, -1], [8, 16, 25, 50, "All"]],
        "ajax": {
            "url": "funciones/fun_llenarcategorias_sinselect.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [

            // { "data": "ID_CATEGORIA" },
            { "data": "NOMBRE_CATEGORIA" },
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
            "sEmptyTable": "Ningún dato disponible en esta tabla",
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


    let dtTable = $("#tablacategorias").DataTable();

    //===================================================================AGREGAR CATEGORIA===================================================================//      
    $("#formCategoria").on('submit', function (event) {
        form = $("#formCategoria");
        let categoria = $("#categoria").val(); //valor del input categoria

        // var valoresNoAceptados = /^[0-9]+$/;

        console.log(categoria);

        if (categoria == '') {
            swalfire("La categoria esta vacia", "error");
        } 
        // else if (isAlphaNumericString(categoria)) { //Aqui funciona el isAlphaNumericString porque el swal desparece después, pero dentro de un swal o formulario sin swal, no funciona porque el return no deja de validar
        //     swalfire("La categoria no debe contener números", "error");
        // } 
        
        else {
            $.ajax({ //OTRA MANERA DE ENVIAR, YA QUE SOLO ES UN INPUT DE CATEGORIA NO NECESITO ENVIARLO CON TODO EL FORMULARIO
                type: 'POST',
                url: 'funciones/fun_agregar_categoria.php',
                data: { categoria: categoria },
            }).done(function (respuesta) {
                //console.log(respuesta);
                if (respuesta == 2) {
                    swalfire("¡Existe una categoría con ese nombre!", "error");
                }
                else if (respuesta == 1) {
                    swalfire("¡Categoría Ingresada!", "success");
                    dtTable.ajax.reload(null, false);
                    form[0].reset();
                }
                else if (respuesta == 3) {
                    swalfire("No se ha recibido el parametro", "error");
                }
                else if (respuesta == 4) {
                    swalfire("¡Parámetros vacíos!", "info");
                }
                else {
                    swalfire("Error al ingresar categoría, ¡Compruebe Datos!", "error");
                }

            }).fail(function (res) {
                console.log(res);
                swalfire("ERROR", "error");
            });
        }
        event.preventDefault();

    });

    //===================================================================AGREGAR CATEGORIA===================================================================//   


    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================// 
    $(document).on("click", ".btnEditar", function () {
        let nombre_categoria_datatable = (dtTable.row($(this).closest('tr')).data().NOMBRE_CATEGORIA);
        // var hola = false;
        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true,
            progressSteps: [1, 2],
            preConfirm: function () {
                // if (!confirm('Are you sure?')) {
                //     return false;
                // }
                // $.post('funciones/existente.php', { NMB_CAT: value }, function (response) {
                //     console.log("RESPPPP: " + response);
                //     if (response == 1) {
                //         hola = true;
                //         // return 'Existe una categoria con el mismo nombre';
                //     } else if (response == 3) {
                //         console.log("Parámetros vacíos desde Preconfirm.");
                //     }
                // });
                // proceed otherwise
            }
        }).queue([

            {      //value[0]
                title: '¡Un momento!',
                text: 'La categoria será modificada',
            },
            {    //value[1]
                title: 'Escriba su nueva categoría',
                input: 'text',
                inputValue: nombre_categoria_datatable,
                inputPlaceholder: 'Escriba su nueva categoría',

                inputValidator: (value) => {

                    if (!value) {
                        return 'Campo no puede ser vacio'
                    } else if (value.length < 2) {
                        return 'Campo muy corto'
                    } else if (value.length >= 100) {
                        return 'Campo muy largo'
                    } else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ /s]*$/.test(value)) {
                        return 'Campo debe ser sólo texto'
                    } else if (nombre_categoria_datatable == value) {
                        return 'La categoria no ha tenido cambios'
                    }
                    // else if (validar(value) == 1) {
                    //     return 'Existe una categoria con el mismo nombre';
                    // }
                }
                //text: 'Todos los datos de su cuenta serán eliminados y por consecuencia no podrá recuperar su cuenta. Confirme que desea realizar esta acción.',

            }
        ]).then((result) => {

            if (result.value) {
                let id = (dtTable.row($(this).closest('tr')).data().ID_CATEGORIA); //id del datatable
                let nombre = result.value[1]; //nombre lo saco del input del swal

                $.post('funciones/fun_editar_categoria.php', { ID_CATEGORIA: parseInt(id), NOMBRE_CATEGORIA: nombre }, function (response) {
                    // console.log(response);
                    if (response == 1) {
                        toastr.error("Existen parámetros vacios");
                    } else if (response == 2) {
                        toastr.error("Existe una categoría con ese nombre, por lo tanto no se puede editar.");
                    } else if (response == 3) {
                        toastr.error("La categoría NO se pudo modificar.");
                    } else if (response == 4) {
                        toastr.success("La categoría ha sido modificada.");
                        dtTable.ajax.reload(null, false);
                    } else if (response == 5) {
                        toastr.error("¡Parámetros vacíos!");
                    }
                });

            } else {
                // swal("¡Cancelado!", "Eliminación cancelada", "info");
            }

        });

    });
    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================//   



    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 

    $(document).on('click', '.btnBorrar', function () {
        //fila = $(this);

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
                text: 'Su categoría sera eliminada y no se podra recuperar',
            },

        ]).then((result) => {
            if (result.value) {
                let id = (dtTable.row($(this).closest('tr')).data().ID_CATEGORIA);
                //console.log(categoria);

                $.post('funciones/fun_eliminar_categoria.php', { ID_CATEGORIA: id }, function (response) { //manda por post el "categoria" y en borrar_categoria.php recibe por post ID_CATEGORIA
                    // console.log(response);

                    if (response == 1) {
                        swalfire("Su categoría fue eliminada correctamente", "success");
                        dtTable.ajax.reload(null, false);
                    }
                    else if (response == 2) {
                        swalfire("La categoría Tiene Articulos No se puede eliminar", "error");
                    }
                    else {
                        swalfire("Error al Eliminar, ¡Compruebe Datos!", "error");
                    }
                })
            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });


    });



    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 


});




// function validar(entrada) {
//     $.post('funciones/existente.php', { NMB_CAT: entrada }, function (response) {
//         console.log("RESPPPP: " + response);
//         if (response == 1) {
//             return 1;
//         } else if (response == 3) {
//             return 2;
//         } else {
//             return 3;
//         }
//     });
// }