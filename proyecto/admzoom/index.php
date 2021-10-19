<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 3 || $rol == 7 || $rol == 11)) { //VALIDA QUE SÓLO PUEDE VER EL SUPERADMIN, JEFE DE SECTOR Y DIRECTOR
    $rut = $_SESSION["sesionCESFAM"]["rut"];
    $cargo = $_SESSION["sesionCESFAM"]["cargo"];
    $nombre = $_SESSION["sesionCESFAM"]["nombre_usuario"];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$añoactual = strftime("%Y");
$mesactual = strftime("%m");
$diactual = strftime("%d");
$hora = strftime("%X");
include '../conexion/conexion.php';
require_once '../Zoom/config.php';
$url = "https://zoom.us/oauth/authorize?response_type=code&client_id=" . CLIENT_ID . "&redirect_uri=" . REDIRECT_URI;
?>

<?php include '../dashboard/head.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="css/estilo.css">
<style>
    .dt-buttons {
        float: left;
    }

    .dataTables_length {
        float: left;
        padding-top: 5px;
        margin-left: 10px;
    }

    .dataTables_info {
        float: left;
        margin-left: 10px;
    }

    /* ESTOS ULTIMOS 3 ESTILOS ES PARA COLOCAR LOS ... A LAS TABLAS CON HARTO TEXTO Y PREVENIR EL LARGO ESPACIADO*/
    .table.dataTable td:nth-child(1) {
        /*AL TITULO LE AGREGA LA ELLIPSIS(...) MÁS ABAJO*/
        max-width: 100px;
    }

    .table.dataTable td:nth-child(2) {
        /*AL VIDEO LE AGREGA LA ELLIPSIS (...) MÁS ABAJO*/
        max-width: 100px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }
</style>

<title>Salud los Álamos - Gestión de Videochat</title>
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


                <div class="container-fluid" style="padding-bottom:2%;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-3">
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Gestión de Videochat</h1>
                    </div>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-end mb-1">
                        <!-- <h1 class="h3 mb-0 text-gray-800">ZOOM</h1>-->
                        <a onclick="location.href='<?php echo $url; ?>'" class="btn btn-sm btn-<?php echo $temadelacookie; ?> shadow-sm text-white" id="generatoken"><i class="fas fa-sync"></i> Generar token</a>
                        <!-- uso el onclick para ocultar la url que se presenta al pasar por encima (hover) del boton-->
                    </div>


                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom: 1px solid transparent;">
                            <a class="nav-item nav-link active" id="reunionagendada" data-toggle="tab" href="#nav-reunion-agendada" role="tab" aria-controls="nav-reunion-agendada" aria-selected="true">Reuniones Agendadas</a>
                            <a class="nav-item nav-link" id="reunionterminada" data-toggle="tab" href="#nav-reunion-terminada" role="tab" aria-controls="nav-reunion-terminada" aria-selected="false">Reuniones Terminadas</a>
                            <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contacto</a> -->
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-reunion-agendada" role="tabpanel" aria-labelledby="reunionagendada">
                            <div class="row py-2">
                                <div class="col-xl-9 col-lg-7">
                                    <div class="alert alert-warning" role="alert">
                                        <i class="fas fa-info-circle"></i> <strong>A considerar</strong> <br>
                                        <ul>
                                            <li>Si el estado de la videoconferencia es "pendiente" los funcionarios no podrán ingresar a la videoconferencia.</li>
                                            <li>Clickeando el botón <label class="btn btn-danger btn-sm" style="width:48px;height:20px;text-align:center;font-size:8px;background-color:red;">Iniciar</label> Usted podrá ingresar a la videoconferencia.</li>
                                            <li>Si su videoconferencia se excede de la duración programada, esta se puede cerrar automáticamente una vez cumplido el plazo.</li>
                                        </ul>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-lg-12">
                                            <label>Acciones:</label>
                                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar reunión</span>
                                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-check-circle"></i> Activar reunión</span>
                                            <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-minus-circle"></i> Reunión pendiente</span>
                                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-times-circle"></i> Finalizar reunión</span>
                                            <span class="badge badge-secondary" style="padding: 5px;"><i class="fas fa-copy"></i> Copiar Link</span>
                                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar reunión</span>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center"> -->
                                        <!-- <h6 class="m-0 font-weight-bold text-info"></h6> -->
                                        <!-- </div> -->
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-width:100%;">
                                                <table id="tabla-zoom" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>ID</th>
                                                            <th>CÓDIGO</th>
                                                            <th>TEMA</th>
                                                            <th>ZOOM</th>
                                                            <th>HORA INICIO</th>
                                                            <th>DURACIÓN</th>
                                                            <th>CLAVE</th>
                                                            <th>ESTADO</th>                                                            
                                                            <th>DESTINATARIOS</th>
                                                            <th>ACCIONES</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CREAR REUNIÓN -->
                                <div class="col-xl-3 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                            <h6 class="m-0 font-weight-bold text-<?php echo $temadelacookie; ?>">CREAR REUNIÓN</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <form method="post" id="form-zoom" autocomplete="off">
                                                <!--method="post" id="form-zoom" -->

                                                <!--ASUNTO -->
                                                <div class="form-group">
                                                    <label for="asunto" class="col-form-label">Asunto</label>  
                                                    <textarea class="form-control" name="asunto" id="asunto" rows="2" cols="100" maxlength="220" style="resize: none;" onkeypress="return soloAsunto(event)" required></textarea>
                                                </div>

                                                <!--GRUPO DE USUARIOS -->
                                                <div class="form-group">
                                                    <label for="txttituloIngresar" class="col-form-label">Enviar al/los funcionario/s:</label>
                                                    <?php

                                                    $sqlree = "SELECT rut, nombre_usuario FROM usuario WHERE estado_usuario=1"; //rut!='$rut' and
                                                    $consultaree = mysqli_query($mysqli, $sqlree);

                                                    if (!$consultaree) {
                                                        echo '<div class="alert alert-danger" role="alert"> No se encuentran datos disponibles</div>';
                                                    } else {
                                                    ?>

                                                        <select class="form-control selector-multiple" id="grupo_usuarios" name="grupo_usuarios[]" style="width: 100%;" multiple="multiple" required>
                                                            <!-- <option value="">Seleccione el reemplazante...</option> -->
                                                            <?php

                                                            while ($fila1 = mysqli_fetch_array($consultaree)) {
                                                                $RUT = $fila1['rut'];
                                                                $NOMBRE = $fila1['nombre_usuario'];
                                                                echo '<option value="' . $RUT . '">' . $NOMBRE . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php } ?>
                                                </div>

                                                <!-- DURACIÓN -->
                                                <div class="form-group">
                                                    <label for="duracion" class="col-form-label" aria-describedby="emailHelp">Duracion </label>
                                                    <input type="text" class="form-control" id="duracion" name="duracion" minlength="1" maxlength="3" onkeypress="return solonumeros(event)" required>
                                                    <small id="emailHelp" class="form-text text-muted text-right">En minutos.</small>
                                                    <!--readonly="readonly" -->
                                                </div>

                                                <!-- FECHA -->
                                                <div class="form-group">

                                                    <?php  /*calcular el año actual para obtener el max del input type date:*/
                                                    $anoactual = explode("-", $fechadehoy);
                                                    $fechaminima = $anoactual[0] . "-01" . "-01";
                                                    $fechamaxima = $anoactual[0] . "-12" . "-31";
                                                    ?>

                                                    <label for="fecha" class="col-form-label">Fecha </label>
                                                    <input type="date" class="form-control" id="fechaS" name="fecha" onkeypress="return fechazoom(event)" maxlength="10" min='<?php echo $fechadehoy; ?>' max='<?php echo $fechamaxima; ?>' value="<?php echo $fechadehoy ?>" required>
                                                    <!--readonly="readonly" -->
                                                </div>

                                                <!-- HORA -->
                                                <div class="form-group">
                                                    <label for="hora" class="col-form-label">Hora </label>
                                                    <input type="time" class="form-control" id="hora" name="hora" onkeypress="return horazoom(event)" maxlength="5" required>
                                                    <!--onmouseover="reloj(this)" -->
                                                    <!--value="<?php //echo $hora; 
                                                                ?>" -->
                                                    <!--readonly="readonly" -->
                                                </div>


                                                <!-- CONTRA -->
                                                <div class="form-group">
                                                    <label for="contra" class="col-form-label">Contraseña</label>
                                                    <input type="password" class="form-control" id="contra" name="contra" minlength="1" maxlength="10" required>
                                                    <!--readonly="readonly" -->
                                                </div>

                                                <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="float: right;"><i class="fa fa-paper-plane" aria-hidden="true" style="min-width: 5px;"></i> Crear</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DEL ROW -->
                        </div>
                        <!--FIN DEL tab-pane -->
                        <div class="tab-pane fade" id="nav-reunion-terminada" role="tabpanel" aria-labelledby="reunionterminada">
                            <div class="row py-2">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->

                                        <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <a id="limpiarreuniones" class="btn btn-sm btn-<?php // echo $temadelacookie; ?> shadow-sm text-white" id="limp"><i class="fas fa-broom"></i> Limpiar registros</a>
                                        </div> -->

                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-width:100%;">
                                                <table id="tabla-admin-zoom-finalizada" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>TEMA</th>
                                                            <th>HORA INICIO</th>
                                                            <th>DURACIÓN</th>
                                                            <th>CLAVE</th>
                                                            <th>ANFITRIÓN</th>
                                                            <th>ACCIONES</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DEL ROW -->
                        </div>
                        <!--<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">??</div>-->
                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

            <input type="text" id="copiarurl" style="opacity:0.00000000000001" />
            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../partes/modal/modalzoomadmin.php'; ?>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#videochat").attr('class', 'nav-item active');
    </script>


    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/tablazoomadmin.js"></script>

    <script>
        $(document).ready(function() {
            $('.selector-multiple').select2();
        });
    </script>
</body>

</html>