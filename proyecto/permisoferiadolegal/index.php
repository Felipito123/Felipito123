<?php session_start();
$usuario;
$ROLF = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE ESTE INICIADO SOLAMENTE y QUE SEA SÓLO UN FUNCIONARIO QUIEN SOLICITE EL PERMISO
    //&& !($ROLF == 7 || $ROLF == 8 || $ROLF == 9 || $ROLF == 10 || $ROLF == 10 || $ROLF == 11 || $ROLF == 12 || $ROLF == 13)
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$un_ano_atras = $anoactual - 1;
$dos_ano_atras = $un_ano_atras - 1;
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>

<!-- ESTILO DEL SEGUIMIENTO -->
<link rel="stylesheet" href="css/estiloseguimiento.css">
<link rel="stylesheet" href="../../css/estilofile.css">


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


<title>Salud los Álamos - Permiso Feriado Legal</title>
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
                                        <div class="bg-<?php echo $temadelacookie; ?> px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="icofont-legal" style="font-size: 55px;color:white;"></i></span>
                                            <h5 class="text-white mb-0">Permiso Feriado Legal</h5>
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
                                    <form id="formRegistrarPermisoFeriadoLegal" method="POST" autocomplete="off">

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
                                            $cargo = $_SESSION["sesionCESFAM"]["cargo"];
                                            $nombre = $_SESSION["sesionCESFAM"]["nombre_usuario"];
                                        ?>

                                            <div class="row justify-content-between">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">R.U.T</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <input type="text" class="form-control" id="rut" placeholder="R.U.T" value="<?php echo $rut; ?>" onkeypress="return solorut(event)" minlength="8" maxlength="11" onpaste="return false" autocomplete="off" style="pointer-events: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">Nombres y Apellidos</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <input type="text" class="form-control" id="nombrecompleto" placeholder="Nombre Completo" minlength="4" maxlength="100" value="<?php echo $nombre; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row justify-content-center">

                                                <?php if ($cargo != NULL || $cargo != '') { ?>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Cargo:</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fas fa-graduation-cap" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" id="cargo" placeholder="Cargo o Profesión" minlength="2" maxlength="100" value="<?php echo $cargo; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                                <div class="col-lg-6">

                                                    <!-- TIPO DE GOCE -->

                                                    <div class="form-group">
                                                        <label id="labelparaswal">Correspondiente al año:</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fas fa-file-invoice-dollar" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <select class="form-control custom-select" id="ano_permiso" name="ano_permiso" required>
                                                                <option value="">Seleccione un año...</option>
                                                                <option value="<?php echo $anoactual; ?>"><?php echo $anoactual; ?></option>
                                                                <option value="<?php echo $un_ano_atras; ?>"><?php echo $un_ano_atras; ?></option>
                                                                <option value="<?php echo $dos_ano_atras; ?>"><?php echo $dos_ano_atras; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>


                                        <div class="row justify-content-center">
                                            <div class="col-lg-4">
                                                <!-- NÚMERO DE DIAS -->
                                                <div class="form-group">
                                                    <label id="labelparaswal">Número de Dias:</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="fas fa-sun" aria-hidden="true" style="width: 13px;"></i></span>
                                                        <select class="form-control custom-select" id="numero_dia" name="numero_dia" required>
                                                            <?php
                                                            $i = 1;
                                                            while ($i <= 30) {

                                                                if ($i == 1) {
                                                                    echo '<option value="' . $i . '">' . $i . ' dia</option>';
                                                                } else {
                                                                    echo '<option value="' . $i . '">' . $i . ' dias</option>';
                                                                }

                                                                $i++;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">

                                                <?php /*calcular el año actual para obtener el max del input type date:*/ 
                                                $fechaminima = $dos_ano_atras . "-01" . "-01";
                                                $fechamaxima = $anoactual . "-12" . "-31"; ?>
                                                <div class="form-group">
                                                    <label id="labelparaswal">Desde:</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt" aria-hidden="true" style="width: 13px;"></i></span>
                                                        <input type="date" class="form-control" id="fecha_permiso" name="fecha_permiso" placeholder="Ingrese fecha de nacimiento" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min='<?php echo $fechaminima; ?>' max='<?php echo $fechamaxima; ?>' onpaste="return false" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <!-- REEMPLAZANTE -->
                                                <?php

                                                $sqlree = "SELECT rut, nombre_usuario FROM usuario WHERE rut!='$rut' and (id_rol!=7 and id_rol!=8 and id_rol!=9 and id_rol!=10 and id_rol!=11 and id_rol!=12 and id_rol!=13 and id_rol!=15)";
                                                $consultaree = mysqli_query($mysqli, $sqlree);

                                                if (!$consultaree) {
                                                    echo '<div class="alert alert-danger" role="alert"> No se encuentran datos </div>';
                                                } else {
                                                ?>
                                                    <div class="form-group">
                                                        <label id="labelparaswal">Reemplaza</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fas fa-user-plus" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <select class="form-control" id="rut_reemplazante" name="rut_reemplazante" required>
                                                                <option value="">Seleccione el reemplazante...</option>
                                                                <?php

                                                                while ($fila1 = mysqli_fetch_array($consultaree)) {
                                                                    $RUT = $fila1['rut'];
                                                                    $NOMBRE = $fila1['nombre_usuario'];
                                                                    echo '<option value="' . $RUT . '">' . $NOMBRE . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <!-- <div class="col-lg-6"></div> -->

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
                                            <div class="col-4">
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
                                                <div class="input-group ">  
                                                    <label class="btn btn-danger form-control col-3" for="buscarpermiso"><i class="icofont-legal" style="font-size: 25px;color:white;"></i></label>
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
            $("#permisoferiadolegal").attr('class', 'nav-item active');
        </script>

        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/permisoPFL.js"></script>

        <script>
            var existefirma = 'si';
            $('#divfirma').hide();
            $('#divNoHaySolicitudes').hide();
            $('#divSiHaySolicitudes').hide();
            $('#divgeneralseguimiento').hide();
            $('#FechaHoy').val(numerodeldia + ' / ' + mes + ' / ' + anoactual);
            // toastr.error(numerodeldia + ' de ' + mes + ' del ' + anoactual);
        </script>

        <script type="text/javascript">
            /*==============================lleno el input con la fecha actual====================================*/
            var d = new Date();
            var datestring = d.getFullYear().toString() + '-' + (d.getMonth() + 1).toString().padStart(2, '0') + '-' + d.getDate().toString().padStart(2, '0');
            $('#fecha_permiso').val(datestring);
            /*==============================lleno el input con la fecha actual====================================*/


            // toastr.error('../perfil/fotodeperfiles');

            /*==============================Compruebo si existe la firma para mostrar el input file====================================*/
            let reciborut = $('#rut').val();
            let comprobarDirectorio = new Request('../perfil/firmas/' + reciborut);

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
        </script>

</body>

</html>