var intervalo;
var intervalo2;
var scrollearoriginal;
var scrollear2;
var minscrollear;
$(document).ready(function () {

    tabla_gestion_soporte_tecnico = $('#tabla_gestion_soporte_tecnico').DataTable({
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
            "data": { seleccionar: 1 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            {
                "data": "ACTIVIDAD_USUARIO",
                "render": function (data, type, JsonResultRow, row) {
                    let resultado;
                    if (data == 0) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #858796 !important;"></i></span>';
                    else if (data == 1) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #36b9cc !important;"></i></span>';
                    return resultado;
                }
            },
            {
                "data": "IMAGEN_USUARIO",
                "render": function (data, type, JsonResultRow, row) {
                    return '<img src="../perfil/fotodeperfiles/' + JsonResultRow.RUTEMISOR + '/' + data + '" alt="user" width="40" class="rounded-circle"></img>';
                }
            },
            { "data": "RUTEMISOR" },
            { "data": "NOMBRE_USUARIO" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnSeguimiento' title=\"Seguimiento\">Seguimiento</button>" +
                    "<button class='btn btn-secondary btn-sm btnChat' title=\"Abrir Chat\">Chat</button>" +
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

    let bajarscroll=0;


    function mostrarComentarios(rutemisor) {
        $.post('funciones/acceso.php', {
            seleccionar: 2, rutemisor: rutemisor
        }, function (respuesta) {
            // let ResR= JSON.parse(respuesta);
            if (respuesta == 1) {
                console.log("No existe soporte técnico");
            } else {
                // console.log("Respuesta: " + respuesta);
                $('#contenidomensajes').html(respuesta);
                tabla_gestion_soporte_tecnico.ajax.reload(null, false);

                if(bajarscroll == 0){
                    $("#modalbody").animate({ scrollTop: $('#modalbody').prop("scrollHeight")}, 0);
                    scrollearoriginal = $('#modalbody').scrollTop();
                    minscrollear = scrollearoriginal - 350;
                    bajarscroll++;
                }

                $('#modalbody').scroll(function(event) {
                    var scroll = $('#modalbody').scrollTop();
                    //alertify.success("minimo: " + minimo);
                    // alertify.success("original: " + scroll+" minimo: " + minscrollear);
                    if (scroll < minscrollear) {
                        $(".btnscrol").fadeIn();
                    }else{
                        $(".btnscrol").fadeOut();
                    }
                });
                console.log("contador: " + bajarscroll);
            }
            // console.log("Respuesta para tabla: " + ResR.length);
        });
    }

    // function hola(){
    //     NotifTipoIntranet("Exito", "Valor: ", "success");
    // }
    $(document).on('click', '.btnscrol', function () {
        $("#modalbody").animate({ scrollTop: $('#modalbody').prop("scrollHeight") }, 1000);
    });

 
    $(document).on('click', '.btnChat', function () {
        let RUTemisor = (tabla_gestion_soporte_tecnico.row($(this).closest('tr')).data().RUTEMISOR);
        $('#rutaenviarmensaje').val(RUTemisor);
        mostrarComentarios(RUTemisor);

        clearInterval(intervalo);
        bajarscroll=0;

        intervalo = setInterval(function () {
            mostrarComentarios(RUTemisor);
        }, 1200);

        $('#modalchat').modal('show'); //Abre el modal
        
        $('#modalchat').on('hidden.bs.modal', function () { //Cuando detecta el cierre del modal, que termine el interval también
            $(this).removeData('bs.modal');
            clearInterval(intervalo);
        });
    });

    $('#comentarioasoporte').on('keydown', function (ev) { //si se presiona enter en el último input se activa el formulario
        if (ev.key === 'Enter') {
            $('#botonenviarcomentario').trigger("click");
        }
    });

    $("#formComentar").on('submit', function (event) {
        event.preventDefault();
        agregarcomentario();
    });

    function agregarcomentario() {
        form = $("#formComentar");
        let comentario = $('#comentarioasoporte').val();
        let rutaenviarmensaje = $('#rutaenviarmensaje').val();

        // console.log("Comentario: " + comentario);

        if (validavacioynulo([comentario])) { toastr.info('Campo Comentario vacio'); }
        else {
            $.post('funciones/acceso.php', {
                seleccionar: 3, comentario: comentario, rutaenviarmensaje: rutaenviarmensaje
            }, function (respuesta) {
                // console.log("Respuesta: " + respuesta);
                if (respuesta == 1) {
                    toastr.error('No se ha recibido parametros', 'UpS!');
                } else if (respuesta == 2) {
                    toastr.error('No se pudo ingresar el comentario, si el problema persiste, por favor envie un correo a soporte.', 'UpS!');
                } else if (respuesta == 3) {
                    mostrarComentarios(rutaenviarmensaje);
                    $("#modalbody").animate({ scrollTop: $('#modalbody').prop("scrollHeight") }, 500); // a medida que se agrega el comentario el scroll se vaya bajando también
                    form[0].reset();
                    // toastr.success('Comentario registrado');
                } else if (respuesta == 4) {
                    toastr.error('No se ha recibido parametros', 'UpS!');
                }
            });
        }
    }

    $(document).on('click', '.botoneliminar', function () {
        let valor = $(this).val();
        $.post('funciones/acceso.php', {
            seleccionar: 4, iden: parseInt(valor)
        }, function (respuesta) {
            // console.log("Respuesta: " + respuesta);
            if (respuesta == 1) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            } else if (respuesta == 2) {
                toastr.error('El comentario ya se encuentra eliminado.', 'UpS!');
                // mostrarComentarios();
            } else if (respuesta == 3) {
                toastr.error('No se pudo eliminar el comentario, si el problema persiste, por favor envie un correo a soporte.', 'UpS!');
            } else if (respuesta == 4) {
                // mostrarComentarios();
                // toastr.success('Comentario eliminado');
            } else if (respuesta == 5) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            }
        });
        // NotifTipoIntranet("Exito", "Valor: " + valor, "success");
    });


    $(document).on('click', '.botoneliminardefinitivo', function () {
        let valor = $(this).val();
        $.post('funciones/acceso.php', {
            seleccionar: 5, iden: parseInt(valor)
        }, function (respuesta) {
            // console.log("Respuesta: " + respuesta);
            if (respuesta == 1) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            } else if (respuesta == 2) {
                toastr.error('El comentario ya se encuentra eliminado.', 'UpS!');
                // mostrarComentarios();
            } else if (respuesta == 3) {
                toastr.error('No se pudo eliminar el comentario, si el problema persiste, por favor envie un correo a soporte.', 'UpS!');
            } else if (respuesta == 4) {
                // mostrarComentarios();
                toastr.success('Comentario eliminado definitivamente');
            } else if (respuesta == 5) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            }
        });
        // NotifTipoIntranet("Exito", "Valor: " + valor, "success");
    });


    $(document).on('click', '.botonrestaurarmsj', function () {
        let valor = $(this).val();
        $.post('funciones/acceso.php', {
            seleccionar: 6, iden: parseInt(valor)
        }, function (respuesta) {
            // console.log("Respuesta: " + respuesta);
            if (respuesta == 1) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            } else if (respuesta == 2) {
                toastr.error('El comentario ya se encuentra eliminado.', 'UpS!');
                // mostrarComentarios();
            } else if (respuesta == 3) {
                toastr.error('No se pudo eliminar el comentario, si el problema persiste, por favor envie un correo a soporte.', 'UpS!');
            } else if (respuesta == 4) {
                // mostrarComentarios();
                // toastr.success('Comentario eliminado definitivamente');
            } else if (respuesta == 5) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            }
        });
        // NotifTipoIntranet("Exito", "Valor: " + valor, "success");
    });

    $(document).on('click', '.btnSeguimiento', function () {
        let RUTemisor = (tabla_gestion_soporte_tecnico.row($(this).closest('tr')).data().RUTEMISOR);

        $('#contenidodelpanel').html(
            `
            <div class="row p-3 fadeIne">
                <div class="col-xl-6 pb-2">
                    <div class="card card-icon shadow">
                        <div class="row">
                            <div class="col-sm-5 card-icon-aside bg-info">
                                <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:70px;height:70px">
                                </lord-icon>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-center py-2">
                                    <h5 class="py-2"><label class="numberCircle" id="cant_msj_enviados">0</label></h5>
                                    <p class="card-text pt-1">Mensajes enviados</p>
                                    <hr class="col-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 pb-2">
                    <div class="card card-icon shadow">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="card-body text-center py-2">
                                    <h5 class="py-2"><label class="numberCircle" id="cant_msj_eliminados">0</label></h5>
                                    <p class="card-text pt-1">Mensajes eliminados</p>
                                    <hr class="col-7">
                                </div>
                            </div>
                            <div class="col-sm-5 card-icon-aside bg-info">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:70px;height:70px">
                                </lord-icon>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-12" style="padding-bottom: 30px;"></div>

                <div class="col-xl-4 col-sm-4 mb-4">
                    <div class="card text-white h-100">
                        <div class="card-body bg-secondary" style="max-height:87px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Navegadores utilizados</div>
                                    <div class="text-lg fw-bold" id="contador_navegadores">0 +</div>
                                </div>
                                <i class="fas fa-globe fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <div class="table-responsive">
                                <table id="tabla_navegadores" class="table table-striped" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-white bg-secondary">
                                            <th>NAVEGADORES</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 mb-4">
                    <div class="card text-white h-100">
                        <div class="card-body bg-secondary" style="max-height:87px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Versiones navegadores</div>
                                    <div class="text-lg fw-bold" id="contador_versiones">0 +</div>
                                </div>
                                <i class="fas fa-sort-numeric-up fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <div class="table-responsive">
                                <table id="tabla_versiones_nav" class="table table-striped" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-white bg-secondary">
                                            <th>VERSIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 mb-4">
                    <div class="card text-white h-100">
                        <div class="card-body bg-secondary" style="max-height:87px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Sistemas operativos</div>
                                    <div class="text-lg fw-bold" id="contador_sistop">0 +</div>
                                </div>
                                <i class="fas fa-network-wired fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <div class="table-responsive">
                                <table id="tabla_sistemas_oper" class="table table-striped" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-white bg-secondary">
                                            <th>SISTEMAS OPERATIVOS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-11 col-sm-4 mb-1">
                    <button class='btn btn-info btn-sm float-right btnEntendido' title="Entendido">Entendido <i class="fas fa-thumbs-up"></i></button>
                </div>
            </div>
            
            `
        );

        fun_tabla_navegadores(RUTemisor);
        fun_tabla_versiones_nav(RUTemisor);
        fun_tabla_sistemas_oper(RUTemisor);

        tabla_navegadores.ajax.reload(null, false);
        tabla_versiones_nav.ajax.reload(null, false);
        tabla_sistemas_oper.ajax.reload(null, false);

        clearInterval(intervalo2);

        llenar_panel(RUTemisor);

        intervalo2 = setInterval(function () {
            llenar_panel(RUTemisor);
            console.log("intervalo2");
        }, 1200);

        // $('#modalseguimiento').modal('show'); //Abre el modal
        // $('#modalseguimiento').on('hidden.bs.modal', function () { //Cuando detecta el cierre del modal
        //     // $(this).data('bs.modal', null); // will clear all element inside modal
        //     // $(this).removeData('bs.modal');
        // });
    });

    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });


    $(document).on('click', '.btnEntendido', function () {
        mensajepordefecto();
    });


    function llenar_panel(RUTemisor){
        tabla_navegadores.ajax.reload(null, false);
        tabla_versiones_nav.ajax.reload(null, false);
        tabla_sistemas_oper.ajax.reload(null, false);

        $.post('funciones/acceso.php', { seleccionar: 8, rutemisor: RUTemisor }, function (respuesta) {
            let jsonresp, contador;
            jsonresp = JSON.parse(respuesta);
            contador = jsonresp.length;
            // console.log("LLENAR PANEL 2: " + respuesta);
            // console.log("LARGO DEL ARRAY: " + contador);

            //LLENADO DEL PANEL SEGUIMIENTO
            if (respuesta == 'error') {
                toastr.info("Ha ocurrido un error :( ");
            } else {
                $('#contador_navegadores').text(jsonresp[0].contador_navegadores);
                $('#contador_versiones').text(jsonresp[1].contador_versiones);
                $('#contador_sistop').text(jsonresp[2].contador_sistop);
                $('#cant_msj_enviados').text(jsonresp[3].mensajes_enviados);
                $('#cant_msj_eliminados').text(jsonresp[4].mensajes_eliminados);
            }
        }).fail(function () {
            toastr.info("Ha ocurrido un error al cargar el segundo panel");
        });
    }
});

