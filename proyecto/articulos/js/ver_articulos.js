$(document).ready(function () {

    //=======================================================================LLENADO DEL DATATABLE ================================================================================= //
    tablaUsuarios = $('#tablaverarticulos').DataTable({
        "responsive": true,
        "autoWidth": false,
        "ordering": false,
        "lengthMenu": [[8, 16, 35, 50, -1], [8, 16, 35, 50, "All"]],
        "aaSorting": [[0, "desc"]],
        "ajax": {
            "url": "funciones/fun_ver_articulos.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },  //en columns se llena con los mismos valores de la tabla en ver_articulos
        "columns": [

            { "data": "TITULO_ARTICULO" }, //data los lleno con los parametros que recibo de fun_ver_articulos.php
            {
                "data": "DESCRIPCION",
                "render": function (data, type, JsonResultRow, row) {

                    if(data.includes("<img") || data.includes("<iframe")){
                        return 'Ver en <i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                    }
                    else{
                        return data; 
                    }
                    
                }

            },
            // { "data": "DESCRIPCION" },
            { "data": "FECHA" },
            // { "data": "ID_IMAGEN" },
            // { "data": "ID_ARTICULO" },
            // { "data": "ID_CATEGORIA" },
            // { "data": "RUT" },
            { "data": "NOMBRE_USUARIO" },
            { "data": "NOMBRE_CATEGORIA" },
            {
                "data": "NOMBRE_IMAGEN",
                "render": function (data, type, JsonResultRow, row) {

                    return '<img src="../noticias/imagenes/' + JsonResultRow.ID_ARTICULO + '/' + data + '" width="100"/>';
                }

            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                   // "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-circle btn-sm' title=\"Editar\" id='btneditar'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>" +
                    "<button class='btn btn-danger btn-circle btn-sm' title=\"Eliminar\" id='btneliminar'><i class='fa fa-trash' aria-hidde='true'></i></button>" +
                   // "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [], // 3, 4, 5, 6 //ocultar los "data" contados del 0 hasta n, en este caso oculto ID_IMAGEN,ID_ARTICULO,ID_CATEGORIA,RUT
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
                titleAttr: 'Gernerar informe en excel',
                className: 'btn btn-success'
            },

            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'Gernerar informe en PDF',
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

    var dtTable = $('#tablaverarticulos').DataTable();

    //=======================================================================LLENADO DEL MODAL AL PRESIONAL EL BOTON EDITAR ================================================================================= //
    $(document).on("click", "#btneditar", function () {
        fila = $(this);
        let AUTOR = (dtTable.row($(this).closest('tr')).data().NOMBRE_USUARIO);
        let ID_ARTICULO = (dtTable.row($(this).closest('tr')).data().ID_ARTICULO);
        let TITULO_ARTICULO = (dtTable.row($(this).closest('tr')).data().TITULO_ARTICULO);
        let ID_CATEGORIA = (dtTable.row($(this).closest('tr')).data().ID_CATEGORIA);
        let NOMBRE_CATEGORIA = (dtTable.row($(this).closest('tr')).data().NOMBRE_CATEGORIA);
        let NOMBRE_IMAGEN = (dtTable.row($(this).closest('tr')).data().NOMBRE_IMAGEN);
        let DESCRIPCION = (dtTable.row($(this).closest('tr')).data().DESCRIPCION);
        let FECHA = (dtTable.row($(this).closest('tr')).data().FECHA);

        //console.log(""+ti);

        $('#MEMODALEDITAR').modal('show');
        $('#ver_articulo_autor').val(AUTOR);
        $('#ver_articulo_id').val(ID_ARTICULO);
        $('#ver_articulo_titulo').val(TITULO_ARTICULO);
        $('#ver_articulo_fecha').val(FECHA);
         //$('#ver_articulo_descripcion').val(DESCRIPCION);
        $('#ver_articulo_descripcion').summernote('code', DESCRIPCION);

        zoomdelaimagen('../noticias/imagenes/' + ID_ARTICULO + '/' + NOMBRE_IMAGEN);

        $.ajax({
            type: 'POST',
            url: 'funciones/categorias.php',
            data: { 'idcategoria': ID_CATEGORIA, 'nombrecategoria': NOMBRE_CATEGORIA }
        }).done(function (html) {
            $('#ver_articulo_categoria').html(html);
        }).fail(function () { }

        );

        // $('#ver_articulo_imagen').val(NOMBRE_IMAGEN);


    });


    $('#MEMODALEDITAR').on('hidden.bs.modal', function () {
        document.getElementById('ver_articulo_imagen').setCustomValidity('');
        $('#ver_articulo_imagen').val('');
    });

    //=======================================================================LLENADO DEL MODAL AL PRESIONAL EL BOTON EDITAR  ================================================================================= //



    //=======================================================================ENVIO DEL MODAL ================================================================================= //
    $("#formmodaleditar").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 

        $.ajax({
            type: 'POST',
            url: 'funciones/fun_editar_articulo.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

            }
        }).done(function (respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                swalfire("Artículo modificado correctamente!","success");
                dtTable.ajax.reload(null, false);
            }
            else if (respuesta == 2) {
                swalfire("¡Tamaño de imagen invalido!","error");
                return;
            }
            else if (respuesta == 3) {
                swalfire("¡Formato invalido!","error");
                return;
            }
            else if (respuesta == 4) {
                swalfire("¡No ha recibido parámetros!","error");
                return;
            }
            else if (respuesta == 5) {
                swalfire("¡Parámetros vacíos!","info");
                return;
            }

            else {
                swalfire("Error al Modificar , ¡Compruebe Datos!","error");
            }

            $('#MEMODALEDITAR').modal('hide');

        }).fail(function (res) {
            console.log(res);
            swalfire("ERROR","error");
        });


    });


    //=======================================================================ENVIO DEL MODAL ================================================================================= //




    //=======================================================================ENVIO DEL BOTON ELIMINAR DEL DATATABLE ===================================================================== //
    $(document).on("click", "#btneliminar", function () { //boton eliminar del datatable
        let id = (dtTable.row($(this).closest('tr')).data().ID_ARTICULO);
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
                text: 'Por favor, confirme que desea Eliminar este Articulo',
            },

        ]).then((result) => {
            if (result.value) {
                console.log(id);

                $.post('funciones/fun_eliminar_articulo.php', { idarticulo: id }, function (response) {
                    console.log(response);

                    if (response == 0) {
                        swalfire("¡Ocurrió un error porfavor, ¡Compruebe Datos!","error");
                    }else if (response == 1) {
                        swalfire("¡Articulo eliminado exitosamente!","success");
                        dtTable.ajax.reload(null, false);
                    }
                    else if (response == 2) {
                        swalfire("¡No se recibio la ID del articulo!","error");
                    } else if (response == 3) {
                        swalfire("¡Error al Eliminar, ¡Compruebe Datos!","error");
                    }
                })
            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });

    //=======================================================================ENVIO DEL BOTON ELIMINAR DEL DATATABLE ===================================================================== //




});



//=======================================================================FUNCIONES PARA LA IMAGEN VALIDA ===================================================================== //

function zoomdelaimagen(imgUrl) {
    if (imgUrl == null) {
        console.log('img es null');
        var imageninput = document.getElementById('ver_articulo_imagen');
        if (imageninput.files && imageninput.files[0]) {
            var myImg = document.getElementById("myImg");
            myImg.src = URL.createObjectURL(imageninput.files[0]); // set src to blob url
        }
    } else {
        console.log('img NO es null');
        var myImg = document.getElementById("myImg");
        myImg.src = imgUrl; // set src to blob url
    }
}
    //=======================================================================FUNCIONES PARA LA IMAGEN VALIDA ===================================================================== //


    //en modal_ver_articulos en el input con id=ver_articulo_descripcion, agregué el style para el width y el max-width para que sea responsivo en el celular
    $('#ver_articulo_descripcion').summernote({
        lang: 'es-ES',
        height: 440,
        popover: { //en popover ..Quito la redimensiones en la barra de opciones que me ofrecian al clickear la imagen subida. Esto porque a veces el tamaño excedia los 900px y en noticias la img tomaba todo el container y se veia mal
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageAttributes']],
            ],
        },
        callbacks: {
            onImageUpload: function(files) { //redimensiono la imagen insertada a 500px  por defecto

                if (!files.length) return;
                var file = files[0];
                // create FileReader

                var reader = new FileReader();

                reader.onloadend = function() {
                    // when loaded file, img's src set datauri
                    console.log("img", $("<img>"));
                    var img = $("<img>").attr({
                        src: reader.result,
                        width: "500" //
                    }); // << Add here img attributes !
                    console.log("var img", img);

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
            ['view', ['codeview', 'help']] //quite 'fullscreen'
        ]
    });
