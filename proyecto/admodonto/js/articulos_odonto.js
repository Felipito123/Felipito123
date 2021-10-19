$(document).ready(function () {

    //=======================================================================LLENADO DEL DATATABLE ================================================================================= //
    tablaarticulodonto = $('#tablaverarticulosodonto').DataTable({
        "responsive": true,
        "cache": false,
        "destroy": true,
        "ordering": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR,
        //"oSearch": { "sSearch": respuesta},
        "lengthMenu": [[8, 16, 35, 50, -1], [8, 16, 35, 50, "All"]],
        //"aaSorting": [[0, "desc"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1 }, //enviamos opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error);
                swalfire("Ha ocurrido un error con el llenado de la tabla", "error")
            }
        },
        "columns": [

            // { "data": "ID_ARTICULO" },
            { "data": "TITULO_ODONTO" }, //data los lleno con los parametros que recibo de fun_ver_articulos.php
            {
                "data": "DESCRIPCION_ODONTO",
                "render": function (data, type, JsonResultRow, row) {

                    if (data.includes("<img") || data.includes("<iframe")) { //VALIDAR EL LARGO DE LA DESCRIPCION O PONER LIMITE Y UNA ELLIPSIS, PORQUE COMO ES HTML NO LO TOMA EL DATATABLE
                        return 'Ver y editar en <i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                    }
                    else {
                        let cantidad = data.length;
                        // console.log(cantidad);
                        if (cantidad < 730) {
                            return data.substring(0, cantidad) + '...';
                        }
                        else {
                            return 'Ver y editar en <i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                        }

                        // return data;
                    }

                }

            },
            // { "data": "FRASE_ARTICULO" },
            // { "data": "CITA_ARTICULO" },
            {
                "data": "NOMBRE_IMAGEN_ODONTO",
                "render": function (data, type, JsonResultRow, row) {

                    // return 'hola';
                    return '<img src="odontologia/' + JsonResultRow.ID_ARTICULO + '/' + data + '" width="100" height="52"/>';
                }

            },
            {
                "data": "ESTADO_ODONTO",
                "render": function (data, type, JsonResultRow, row) {
                    if (data == 'oculto') {
                        return '<label class="btn btn-danger btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Oculto</label>';
                    }
                    else {
                        return '<label class="btn btn-success btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Visible</label>';
                    }

                }
            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class='col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnEditar' title=\"Editar articulo\"><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>" +
                    "<button class='btn btn-warning btn-sm btnAnexo' title='Registrar anexo'><i class='fas fa-tags'></i></button>" +
                    "<button class='btn btn-success btn-sm btnVerdetalle' title='Ver anexos'><i class='fas fa-list'></i></button>" +
                    "<button class='btn btn-danger btn-sm btnBorrar' title=\"Eliminar articulo\"><i class='fa fa-trash-o' aria-hidde='true'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [], //[0, 3, 4] ocultar los "data" contados del 0 hasta n, en este caso oculto ID_IMAGEN,ID_ARTICULO,ID_CATEGORIA,ID_USUARIO
            "visible": false,
            "searchable": true
        }
        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="8">8</option>' +
                '<option value="16">16</option>' +
                '<option value="35">35</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay articulos que mostrar en esta tabla",
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



    //=======================================================================LLENADO DEL DATATABLE ================================================================================= //

    // var dtTable = $('#tablaverarticulosodonto').DataTable();

    function tabladetalleanexo(valor) {
        tablaanexo = $('#tabla-detalle-anexo').DataTable({
            "responsive": true,
            "info": true,  //en false: le oculto la información de las entradas de la tabla
            "cache": false,
            "destroy": true, //Lo necesito si le envio el parametro
            "bAutoWidth": false, //LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
            "ordering": false, //le quito el ordenamiento ascendente o descendente
            "lengthMenu": [[6, 12, 36, 48, -1], [6, 12, 36, 48, "All"]],
            "ajax": {
                "url": "funciones/acceso.php",
                "method": 'POST', //usamos el metodo POST
                "data": { IDARITCULOTAB: valor, seleccionar: 2 }, //enviamos opcion para que haga un SELECT
                "dataSrc": ""
            },
            "columns": [
                /*<a href="" download></a>*/
                { "data": "ID_ANEXO" },
                { "data": "ID_ARTICULO_ANEXO" },
                { "data": "CATEGORIA_ANEXO" },
                { "data": "TITULO_ANEXO" },
                { "data": "DESCRIPCION_ANEXO" },
                {
                    "data": "IMAGEN_ANEXO",
                    "render": function (data, type, JsonResultRow, row) {
                        var ext = data.split('.').pop();
                        if (ext == 'pdf') {
                            return data;
                        }
                        else if (ext == 'jpg' || ext == 'png' || ext == 'JPEG' || ext == 'jpeg' || ext == 'JPG' || ext == 'PNG') {
                            return '<img src="odontologia/' + JsonResultRow.ID_ARTICULO_ANEXO + '/' + JsonResultRow.ID_ANEXO + '/' + data + '" width="100" height="52"/>';
                        }
                    }

                },
                {
                    "defaultContent":
                        " <div class='row justify-content-center'>" +
                        "<div class=' col align-items-center'>" +
                        // "<div class='btn-group'>" +
                        "<label class='btn btn-warning btn-circle btn-sm btnEliminarDetalle' title='Eliminar anexo'><i class='fas fa-trash'></i></label>" +

                        // "</div>" +
                        "</div>" +
                        "</div>"
                }
            ], "columnDefs": [{

                "targets": [0, 1], //oculto la columna que tiene posición 0 Y 1 
                "visible": false,
                "searchable": true
            },

            ],
            "oLanguage": {
                "sProcessing": "Procesando...",
                "sLengthMenu": 'Mostrar <select>' +
                    '<option value="6">6</option>' +
                    '<option value="12">12</option>' +
                    '<option value="36">36</option>' +
                    '<option value="48">48</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> registros',
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No hay anexos registrados",
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
                }
            }
        });
    }


    $('#descripcion_anexo').on('keydown', function (ev) { //si en el input se apreta enter se activa el formulario
        if (ev.key === 'Enter') {
            registrarAnexo();
        }
    });


    //=======================================================================LLENADO DEL MODAL AL PRESIONAL EL BOTON EDITAR ================================================================================= //
    $("#rowfraseycita").hide();
    $("#frase_articulo").removeAttr("required");
    $("#cita_articulo").removeAttr("required");

    $(document).on("click", ".btnEditar", function () {
        fila = $(this);
        let ID_ARTICULO = (tablaarticulodonto.row($(this).closest('tr')).data().ID_ARTICULO);
        let TITULO_ARTICULO = (tablaarticulodonto.row($(this).closest('tr')).data().TITULO_ODONTO);
        let NOMBRE_IMAGEN = (tablaarticulodonto.row($(this).closest('tr')).data().NOMBRE_IMAGEN_ODONTO);
        let DESCRIPCION = (tablaarticulodonto.row($(this).closest('tr')).data().DESCRIPCION_ODONTO);
        let FRASE = (tablaarticulodonto.row($(this).closest('tr')).data().FRASE_ARTICULO);
        let CITA = (tablaarticulodonto.row($(this).closest('tr')).data().CITA_ARTICULO);
        let ESTADO = (tablaarticulodonto.row($(this).closest('tr')).data().ESTADO_ODONTO);
        //console.log(""+ti);

        $('#MEMODALEDITARODONTO').modal('show');
        $('#ver_articulo_id_odonto').val(ID_ARTICULO);
        $('#ver_articulo_titulo_odonto').val(TITULO_ARTICULO);
        $('#ver_articulo_estado_odonto').val(ESTADO);
        $('#frase_articulo').val(FRASE);
        $('#cita_articulo').val(CITA);

        if (FRASE == '' || CITA == '') { //Valores por defecto. En caso que de la BD halla vacio de una de las frase o cita lo oculto
            $('#botoncheckboxodonto').prop('checked', false);
            $("#rowfraseycita").hide();
            $("#frase_articulo").removeAttr("required");
            $("#cita_articulo").removeAttr("required");
        }
        else {
            $('#botoncheckboxodonto').prop('checked', true);
            $("#rowfraseycita").show();
            $("#frase_articulo").attr("required", "required");
            $("#cita_articulo").attr("required", "required");
        }

        document.getElementById('botoncheckboxodonto').onchange = function () { //DETECTO EL CAMBIO DEL CHECKBOX
            if (this.checked) {
                $("#rowfraseycita").fadeIn(); //para que aparezca con una leve animación
                $("#frase_articulo").attr("required", "required");
                $("#cita_articulo").attr("required", "required");
            }
            else {
                $("#rowfraseycita").fadeOut();//para que se desvanezca con una leve animación
                $("#frase_articulo").removeAttr("required");
                $("#cita_articulo").removeAttr("required");
            }
        }

        //$('#ver_articulo_descripcion').val(DESCRIPCION);
        $('#ver_articulo_descripcion_odonto').summernote('code', DESCRIPCION);
        let comprobarDirectorio = new Request('odontologia/' + ID_ARTICULO + '/' + NOMBRE_IMAGEN);
        fetch(comprobarDirectorio).then(function (respuesta) {
            if (respuesta.status == 200) {
                zoomdelaimagen('odontologia/' + ID_ARTICULO + '/' + NOMBRE_IMAGEN);
            } else {
                console.log("error");
            }
        }).catch(function (error) {
            console.log(error);
        });
    });


    $('#MEMODALEDITARODONTO').on('hidden.bs.modal', function () {
        document.getElementById('ver_articulo_imagen_odonto').setCustomValidity('');
        $('#ver_articulo_imagen_odonto').val('');
    });

    //=======================================================================LLENADO DEL MODAL AL PRESIONAL EL BOTON EDITAR  ================================================================================= //



    //=======================================================================FORMULARIO EDITAR ARTICULO ================================================================================= //
    $("#formmodaleditar_odonto").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        formularioEditarRegistro();
    });
    //=======================================================================FORMULARIO EDITAR ARTICULO ================================================================================= //



    //===============================================================ABRE EL MODAL PARA REGISTRAR ANEXOS ================================================ //
    $(document).on('click', '.btnAnexo', function () { //AQUI REGISTRO A LA TABLA ANEXO
        $('#modal-registrar-anexo').modal();

        /*  $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
            $("#modal-editar-vacaciones").appendTo("body");
            $('#modal-registrar-vacaciones').modal('show');
        });*/

        let IDARTICULITO = (tablaarticulodonto.row($(this).closest('tr')).data().ID_ARTICULO);
        $('#id_articulo_anexo').val(IDARTICULITO);

        $('#modal-registrar-anexo').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });

    });
    //================================================================ABRE EL MODAL PARA REGISTRAR ANEXOS ============================================= //


    //===================================================FORMULARIO DE REGISTRO DEL ANEXO ================================================ //
    $("#form-modal-registrar-anexo").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        registrarAnexo();
    });
    //===================================================FORMULARIO DE REGISTRO DEL ANEXO ================================================ //


    //===================================================ABRE EL MODAL PARA VER LA LISTA DE ANEXOS ================================================ //
    $(document).on('click', '.btnVerdetalle', function () {
        $('#modal-detalle-anexo').modal();

        let IDARTICULITODETALLE = (tablaarticulodonto.row($(this).closest('tr')).data().ID_ARTICULO);
        tabladetalleanexo(IDARTICULITODETALLE);

        $('#modal-detalle-anexo').on('hidden.bs.modal', function () {
            // $(this).find('form')[0].reset();
        });
    });
    //===================================================ABRE EL MODAL PARA VER LA LISTA DE ANEXOS ================================================ //


    //===================================================BOTON BORRAR ARTICULO DEL DATATABLE ====================================================== //
    $(document).on("click", ".btnBorrar", function () {
        let idarticulo = (tablaarticulodonto.row($(this).closest('tr')).data().ID_ARTICULO);
        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true
        }).queue([
            {
                title: '¡Un momento!',
                text: 'Por favor, confirme que desea eliminar este articulo.\nSe eliminaran también los anexos.',
            }
        ]).then((result) => {
            if (result.value) {
                //console.log(idarticulo);
                if (validavacioynulo([idarticulo])) { swalfire("¡Campo vacio!", "error"); }
                else {
                    $.post('funciones/acceso.php', { idarticulo: parseInt(idarticulo), seleccionar: 5 }, function (respuesta) {
                        //console.log(respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Campos vacios, compruebe datos!", "error");
                        } else if (respuesta == 2) {
                            swalfire("¡Ha ocurrido un error al eliminar el articulo!", "error");
                        } else if (respuesta == 3) {
                            swalfire("¡Ha ocurrido un error al eliminar el articulo!", "error");
                        } else if (respuesta == 4) {
                            tablaarticulodonto.ajax.reload(null, false);
                            swalfire("¡Articulo eliminado exitosamente!", "success");
                        } else if (respuesta == 5 || respuesta == 444) {
                            swalfire("No se recibireron parámetros", "error");
                        }
                    });
                }
            } else {
                // swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });
    //===================================================BOTON BORRAR ARTICULO DEL DATATABLE ====================================================== //



    //======================================================BOTON ELIMINAR ANEXO===================================================================// 

    $(document).on('click', '.btnEliminarDetalle', function () {
        let IDARTICULOELIMINAR = (tablaanexo.row($(this).closest('tr')).data().ID_ARTICULO_ANEXO);
        let IDANEXOELIMINAR = (tablaanexo.row($(this).closest('tr')).data().ID_ANEXO);
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
                text: 'El anexo será eliminado y no se podra recuperar',
            }
        ]).then((result) => {
            if (result.value) {
               // console.log("ID ARTICULO: " + IDARTICULOELIMINAR + "\nID ANEXO: " + IDANEXOELIMINAR);

                if (validavacioynulo([IDARTICULOELIMINAR, IDANEXOELIMINAR])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
                else {
                    $.post('funciones/acceso.php', { IDARTICULO: IDARTICULOELIMINAR, IDANEXO: IDANEXOELIMINAR, seleccionar: 6 }, function (respuesta) {
                        //console.log(respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Campos vacios, verifique datos!", "error");
                        } else if (respuesta == 2) {
                            swalfire("¡Ha ocurrido un error al eliminar el anexo!", "error");
                        } else if (respuesta == 3) {
                            tablaanexo.ajax.reload(null, false);
                            $('#modal-detalle-anexo').modal('hide');
                            swalfire("¡Anexo eliminado correctamente!", "success");
                        } else if (respuesta == 4) {
                            tablaanexo.ajax.reload(null, false);
                            $('#modal-detalle-anexo').modal('hide');
                            swalfire("¡Anexo eliminado correctamente!", "success");
                        } else if (respuesta == 5 || respuesta == 444) {
                            swalfire("¡No se ha recibido parametros!", "error");
                        }
                    });
                }
            } else {
                //  swal("Cancelado", "Usted ha Cancelado", "info");
            }
        });
    });
    //======================================================BOTON ELIMINAR ANEXO===================================================================//


    //======================================================FUNCIONES PARA LA IMAGEN VALIDA======================================================= //
    function zoomdelaimagen(imgUrl) {
        if (imgUrl == null) {
            // console.log('img es null');
            var imageninput = document.getElementById('ver_articulo_imagen_odonto');
            if (imageninput.files && imageninput.files[0]) {
                var myImg = document.getElementById("myImg");
                myImg.src = URL.createObjectURL(imageninput.files[0]); // set src to blob url
            }
        } else {
            // console.log('img NO es null');
            var myImg = document.getElementById("myImg");
            myImg.src = imgUrl; // set src to blob url
        }
    }
    //======================================================FUNCIONES PARA LA IMAGEN VALIDA======================================================= //

    $('#ver_articulo_descripcion_odonto').summernote({
        lang: 'es-ES',
        width: 770,
        height: 300,
        popover: { //en popover ..Quito la redimensiones en la barra de opciones que me ofrecian al clickear la imagen subida. Esto porque a veces el tamaño excedia los 900px y en noticias la img tomaba todo el container y se veia mal
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageAttributes']],
            ],
        },
        callbacks: {
            onImageUpload: function (files) { //redimensiono la imagen insertada a 500px  por defecto

                if (!files.length) return;
                var file = files[0];
                // create FileReader

                var reader = new FileReader();

                reader.onloadend = function () {
                    // when loaded file, img's src set datauri
                    console.log("img", $("<img>"));
                    var img = $("<img>").attr({
                        src: reader.result,
                        width: "500" //
                    }); // << Add here img attributes !
                    console.log("var img", img);

                    // img[0].onload = function() {
                    //     // alert(this.width + ' ' + this.height);
                    //     alert("ancho de la imagen: " + this.width)
                    // };

                    $('#ver_articulo_descripcion').summernote("insertNode", img[0]); //Aqui se inserta la imagen en el summernote
                }

                if (file) {
                    // convert fileObject to datauri
                    reader.readAsDataURL(file);
                }


            }
        },
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'video']], //quite 'picture'
            ['view', ['codeview']] //quite 'fullscreen','help'
        ]
    });
});

