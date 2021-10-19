<?php session_start();
$usuario;
$ROLF = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE ESTE INICIADO SOLAMENTE y QUE SEA SÓLO UN FUNCIONARIO QUIEN SOLICITE EL PERMISO
    //&& ($ROLF == 7 || $ROLF == 8 || $ROLF == 9 || $ROLF == 10 || $ROLF == 10 || $ROLF == 11 || $ROLF == 12 || $ROLF == 13)
    // if (isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE ESTE INICIADO SOLAMENTE y QUE SEA SÓLO UN FUNCIONARIO QUIEN SOLICITE EL PERMISO
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>

<link rel="stylesheet" href="../../css/estilofile.css">

<!-- ESTILO DEL HORARIO -->
<link rel="stylesheet" href="css/timepicker.css">

<!-- ESTILO DEL SEGUIMIENTO -->
<link rel="stylesheet" href="css/estiloseguimiento.css">


<style>
    #labelparaswal {
        color: #545454;
        font-size: 14px;
        font-weight: 400;
        line-height: normal;
        float: left;
        word-wrap: break-word;
    }
</style>


<title>Salud los Álamos - Permiso especial</title>
</head>

<body id="page-top">



    <!-- Page Wrapper -->
    <div id="wrapper">



        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>


                <div class="container-fluid" style="text-align: center; padding-bottom: 25px;">

                    <div class="container-fluid">

                        <!-- <div class="row col-11 justify-content-end">
                                    <label class="btn btn-info btn-sm shadow-sm" id="botonagregarpaciente" style="border-radius: 15px 15px 15px 0px;height:35px; width:120px;"><i class="fas fa-plus-circle fa-sm text-white-100 pr-2" style="font-size: 25px;"></i><i class="fas fa-hospital-user fa-sm text-white-50" style="font-size: 15px;"></i>
                                    </label>
                                </div> -->

                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 mb-lg-0">
                                <!-- Card-->
                                <div class="card rounded shadow-sm border-0">
                                    <div class="card-body p-0">
                                        <div class="bg-<?php echo $temadelacookie; ?> px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="icofont-certificate" style="font-size: 55px;color:white;"></i></span>
                                            <h5 class="text-white mb-0">Permiso Especial</h5>
                                            <!-- <p class="small text-white mb-0">¡Hola estimado(a)!</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end text-center pt-5">


                            <div class="col-lg-2">
                                <label>Acciones: </label>
                                <span class="badge badge-<?php echo $temadelacookie; ?> pl-2 pr-2" style="padding: 5px;"><i class="icofont-upload" style="font-size: 15px;"></i> Subir permiso</span>
                            </div>
                            <div class="col-lg-10"></div>
                            <!-- <div class="col-lg-3">
                                <label>Exportar: </label>
                                <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> Excel</span>
                                <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> PDF</span>
                                <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                            </div> -->
                        </div>

                    </div>

                    <div class="row justify-content-center pt-4">

                        <div class="col-lg-7 pb-3">

                            <div class="card border-left-<?php echo $temadelacookie; ?>">
                                <div style="padding: 4%;">
                                    <form id="formRegistrarPermisoEspecial" method="POST" autocomplete="off">

                                        <div class="row justify-content-end">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-center" id="FechaHoy" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <span id="FechaHoy"></span> -->
                                        </div>


                                        <?php
                                        if (isset($_SESSION["sesionCESFAM"])) {
                                            $rut = $_SESSION["sesionCESFAM"]["rut"];
                                            $correo = $_SESSION["sesionCESFAM"]["correo"];
                                            $nombre = $_SESSION["sesionCESFAM"]["nombre_usuario"];
                                            $sector = $_SESSION["sesionCESFAM"]["nombre_sector"];
                                            $unidad = $_SESSION["sesionCESFAM"]["nombre_unidad"];
                                            $telefono = $_SESSION["sesionCESFAM"]["telefono"];
                                        ?>

                                            <div class="row justify-content-between">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">R.U.T</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingrese Rut" value="<?php echo $rut; ?>" onkeypress="return solorut(event)" minlength="8" maxlength="11" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">Nombres y apellidos</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <input type="text" class="form-control" id="nombrecompleto" placeholder="Ingrese Nombre Completo" minlength="4" maxlength="100" value="<?php echo $nombre; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row justify-content-center">

                                                <?php if ($sector == NULL && $unidad == NULL) { ?>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">No definido:</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" placeholder="Ingrese" minlength="2" maxlength="100" value="No tiene Unidad ni Sector definido" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } else if ($sector != NULL && $unidad != NULL) { ?>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Sector:</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" placeholder="Ingrese Sector" minlength="2" maxlength="100" value="<?php echo $sector; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Unidad:</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" placeholder="Ingrese Unidad" minlength="2" maxlength="100" value="<?php echo $unidad; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } else if ($sector != NULL && $unidad == NULL) { ?>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Sector:</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" placeholder="Ingrese Sector" minlength="2" maxlength="100" value="<?php echo $sector; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } else { ?>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Unidad:</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" placeholder="Ingrese Unidad" minlength="2" maxlength="100" value="<?php echo $unidad; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>


                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">Comuna:</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <select class="form-control" id="comuna" name="comuna" required>
                                                                <option value="">Seleccione una comuna</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>


                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">

                                                <?php
                                                /*calcular el año actual para obtener el max del input type date:*/
                                                $fechamaxima = $anoactual . "-12" . "-31";
                                                ?>

                                                <div class="form-group">
                                                    <label id="labelparaswal">Fecha:</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt" aria-hidden="true" style="width: 13px;"></i></span>
                                                        <input type="date" class="form-control" id="fechapermiso" name="fechapermiso" placeholder="Ingrese fecha de nacimiento" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min='<?php echo $fechadehoy; ?>' max='<?php echo $fechamaxima; ?>' value="<?php echo $fechadehoy ?>" onpaste="return false" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label id="labelparaswal">Desde:</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="fas fa-clock" aria-hidden="true" style="width: 13px;"></i></span>
                                                        <input type="text" class="form-control" id="horainicio" name="horainicio" placeholder="Ingrese horario" onchange="validarhorario(this);" onkeypress="return horaEventos(event)" minlength="8" maxlength="8" onpaste="return false" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label id="labelparaswal">Hasta:</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="fas fa-clock" aria-hidden="true" style="width: 13px;"></i></span>
                                                        <input type="text" class="form-control" id="horafin" name="horafin" placeholder="Ingrese horario" onchange="validarhorario(this);" onkeypress="return horaEventos(event)" minlength="8" maxlength="8" onpaste="return false" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6"></div>

                                        </div>

                                        <div class="row justify-content-center" id="divfirma">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="archivo_firma" class="col-form-label">Firma:</label>
                                                    <input type="file" id="archivo_firma" name="archivo_firma" accept=".png" required>
                                                    <!--OTROS TIPOS DE EXTENSIONES DE IMAGENES: .jpg,.jpeg,.bmp -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label id="labelparaswal" class="col-form-label">Motivo del permiso:</label>
                                                    <select class="form-control" id="selectmotivopermiso" name="selectmotivopermiso" required>
                                                        <option value="">Seleccione un tipo de patologia</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <!-- <button id="time-button" type="button" class="btn btn-primary">Select Time</button>
                                            <br /><br />
                                            <p>The Selected Time Is: <strong><span id="time"></span></strong></p> -->

                                            <!-- TIME PICKER -->
                                            <div id="time-picker">
                                                <div>
                                                    <div id="time-picker-header" class="time-picker-bg">
                                                        <p>
                                                            <span id="time-picker-hour"></span>
                                                            <span id="time-picker-mins"></span>
                                                            <span id="time-picker-ampm"></span>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <a id="time-picker-alt-ok-button" class="btn btn-sm btn-flat"><i class="material-icons">check_circle</i></a>
                                                    </div>
                                                    <div id="time-picker-clock">
                                                        <span id="time-picker-hour-hand"></span>
                                                        <span id="time-picker-hour-center"></span>
                                                        <p id="time-picker-hour-1" class="time-picker-hour" data-value="1"></p>
                                                        <p id="time-picker-hour-2" class="time-picker-hour" data-value="2"></p>
                                                        <p id="time-picker-hour-3" class="time-picker-hour" data-value="3"></p>
                                                        <p id="time-picker-hour-4" class="time-picker-hour" data-value="4"></p>
                                                        <p id="time-picker-hour-5" class="time-picker-hour" data-value="5"></p>
                                                        <p id="time-picker-hour-6" class="time-picker-hour" data-value="6"></p>
                                                        <p id="time-picker-hour-7" class="time-picker-hour" data-value="7"></p>
                                                        <p id="time-picker-hour-8" class="time-picker-hour" data-value="8"></p>
                                                        <p id="time-picker-hour-9" class="time-picker-hour" data-value="9"></p>
                                                        <p id="time-picker-hour-10" class="time-picker-hour" data-value="10"></p>
                                                        <p id="time-picker-hour-11" class="time-picker-hour" data-value="11"></p>
                                                        <p id="time-picker-hour-12" class="time-picker-hour" data-value="12"></p>
                                                    </div>
                                                    <p id="time-picker-am-button" class="time-picker-ampm-button">AM</p>
                                                    <p id="time-picker-pm-button" class="time-picker-ampm-button">PM</p>
                                                    <div id="time-picker-buttons" class="text-right">
                                                        <!-- <a id="time-picker-reset-button" class="btn btn-sm btn-flat"><i class="material-icons">today</i></a> -->
                                                        <div class="row pt-2">
                                                            <div class="col-5">
                                                                <a id="time-picker-cancel-button" class="btn btn-sm btn-secondary text-white col-10"><i class="fas fa-times"></i></a>
                                                            </div>

                                                            <div class="col-7">
                                                                <a id="time-picker-ok-button" class="btn btn-sm btn-info text-white col-10"><i class="fas fa-check"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- TIME PICKER -->
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-xl-4 col-sm-6">
                                                <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="icofont-upload" style="font-size: 25px;"></i> Subir Permiso</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card">
                                <div style="padding: 3%;">

                                    <div class="container" id="divNoHaySolicitudes">
                                        <div class="row justify-content-center pt-3">
                                            <div class="col-lg-12 pb-2 pt-4">
                                                <span><i class="icofont-hour-glass" style="font-size: 150px;color:#d4d6de"></i></span>
                                            </div>
                                            <label class="pt-4 pb-4" style="color:#b3b6c1;">No hay solicitudes... </label>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center" id="divSiHaySolicitudes">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <!-- <label id="labelparaswal" class="col-form-label">Tipo de Patología:</label> -->
                                                <div class="input-group ">
                                                    <label class="btn btn-danger form-control col-3" for="buscarpermiso"><i class="icofont-certificate" style="font-size: 25px;color:white;"></i></label>
                                                    <select class="form-control" id="buscarpermiso" required>
                                                        <option value="">Seleccione un permiso</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 pb-2 pt-4" id="imagenydescripcion">
                                            <span><i class="icofont-ui-social-link" style="font-size: 150px;color:#d4d6de"></i></span>

                                            <div class="row justify-content-center">
                                                <label class="pt-4 pb-4" style="color:#b3b6c1;">Seleccione el permiso para ver el seguimiento </label>
                                            </div>
                                        </div>

                                        <div class="container-fluid" id="divgeneralseguimiento">
                                            <div class="row justify-content-center">
                                                <div class="col-sm-12">
                                                    <div class="box">
                                                        <div class="box__body">
                                                            <div class="timeline" id="contenidoseguimiento">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <!-- <div class="row justify-content-center pt-3">
                                    <span><i class="icofont-ui-folder" style="font-size: 150px;color:#d4d6de"></i></span>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FIN DEL ROW -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>
        <!-- End of Page Wrapper -->




        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#permisoespecial").attr('class', 'nav-item active');
        </script>

        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/permisoespecial.js"></script>

        <script>
            $('#divfirma').hide();
            $('#divNoHaySolicitudes').hide();
            $('#divSiHaySolicitudes').hide();
            $('#divgeneralseguimiento').hide();
            $('#FechaHoy').val(numerodeldia + ' / ' + mes + ' / ' + anoactual);
            // toastr.error(numerodeldia + ' de ' + mes + ' del ' + anoactual);
        </script>

        <!-- TimePicker JS -->
        <script type="text/javascript" src="js/timepicker.js"></script>
        <script type="text/javascript">
            // Initialize the TimePicker
            var tp = TimePicker("#36b9cc");


            /*=========Cuando me hube sitiado en el input para la hora se activa el modal para elegir horario =========*/
            $("#horainicio").focus(function() {
                var time = new Date();
                tp.show(time, function(selected) {
                    let horario = selected.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    }) + ':00';
                    $("#horainicio").val(horario);
                });
            });
            $("#horafin").focus(function() {
                var time2 = new Date();
                tp.show(time2, function(selected) {
                    let horario = selected.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    }) + ':00';
                    $("#horafin").val(horario);
                });
            });
            /*=========Cuando me hube sitiado en el input para la hora se activa el modal para elegir horario =========*/


            /*==============================lleno el input con la fecha actual====================================*/
            let d = new Date();
            let datestring = d.getFullYear().toString() + '-' + (d.getMonth() + 1).toString().padStart(2, '0') + '-' + d.getDate().toString().padStart(2, '0');
            $('#fechapermiso').val(datestring);
            /*==============================lleno el input con la fecha actual====================================*/


            // toastr.error('../perfil/fotodeperfiles');

            /*==============================Compruebo si existe la firma para mostrar el input file====================================*/
            let reciborut = $('#rut').val();
            let comprobarDirectorio = new Request('../perfil/firmas/' + reciborut);

            var existefirma = 'si';

            fetch(comprobarDirectorio).then(function(respuesta) {
                //console.log(respuesta.status); // returns 200
                if (respuesta.status == 200) {
                    $('#divfirma').hide();
                    $('#archivo_firma').prop('required', false);
                    // toastr.error("si se encuentra");
                } else {
                    $('#divfirma').show();
                    $('#archivo_firma').prop('required', true);
                    existefirma = 'no'; //no existe firma
                    // toastr.error("no se encuentra");
                }

            }).catch(function(error) {
                console.log(error);
            });
            /*==============================Compruebo si existe la firma para mostrar el input file====================================*/




            /*==============================Detecto el cambio del archivo que estoy insertando y valido====================================*/

            // OTROS TIPOS DE EXTENSIONES DE IMAGENES: ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "bmp"

            $('#archivo_firma').on('change', function() { //en caso de que quieran cambiar manualmente la extensión, lo valido
                var ext = $(this).val().split('.').pop();
                if ($(this).val() != '') {
                    if (ext == "png") {
                        console.log("La extensión es: " + ext);
                        if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                            // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                            // console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                            toastr.error("Tamaño excede a 20 MB");
                            $(this).val('');
                        }
                    } else {
                        $(this).val('');
                        toastr.error("Sólo se permiten imagenes png");
                        // console.log("Extensión no permitida: " + ext);
                    }
                }
            });
            /*==============================Detecto el cambio del archivo que estoy insertando y valido====================================*/

            // toastr.error(al);
            // $("#hora").focusout(function() {
            //     var button = document.getElementById('time-picker-cancel-button');
            //     button.click();
            // });


            // function validarhorario(inputField) {
            //     var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);

            //     if (isValid) {
            //         inputField.style.backgroundColor = '#bfa';
            //     } else {
            //         inputField.style.backgroundColor = '#fba';
            //     }

            //     return isValid;
            // }

            // function validarhorario(inputField) {
            //     let isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
            //     let res=false;

            //     if (!isValid) {
            //         res=true;
            //         // toastr.error("valido");
            //     } else {
            //         res=false;
            //         // toastr.error("NO valido");
            //     }

            //     return res;
            // }
        </script>

</body>

</html>