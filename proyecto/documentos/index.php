<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && $rol == 3) { //VALIDA QUE SÓLO PUEDE VER EL SUPERADMIN
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php include '../conexion/conexion.php'; ?>
<?php include '../dashboard/head.php'; ?>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
<script src="https://pro.fontawesome.com/releases/v6.0.0-beta1/js/all.js" data-auto-add-css="false" data-auto-replace-svg="false"></script>

<style>
    .estilo-archivo {
        font-size: 16px;
        background: white;
        border-radius: 50px;
        width: 420px;
        outline: none;
    }

    ::-webkit-file-upload-button {
        color: white;
        background: #dee2e6;
        padding: 5px;
        border: none;
        border-radius: 50px;
        outline: none;
    }

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
<link rel="stylesheet" href="../../css/estilocheckbox.css">
<title>Salud los Álamos - Gestión de Documentos</title>
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
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Gestión de Documentos</h1>
                    </div>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom: 1px solid transparent;">
                            <!--En el style le quito el borde -->
                            <a class="nav-item nav-link active" id="documentos" data-toggle="tab" href="#nav-documentos" role="tab" aria-controls="nav-documentos" aria-selected="true">Documentos</a>
                            <a class="nav-item nav-link" id="notificacionesmostrar" data-toggle="tab" href="#nav-notificaciones-m" role="tab" aria-controls="nav-notificaciones-m" aria-selected="false">Notificaciones enviadas</a>
                            <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contacto</a> -->
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-documentos" role="tabpanel" aria-labelledby="documentos">

                            <div class="row justify-content-center pt-1">
                                <div class="col-lg-7">
                                    <div class="alert alert-secondary" role="alert">
                                        <!-- <div class="row justify-content-between"> -->
                                        <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                                        <!-- </div> -->
                                        <ul>
                                            <li>Haz click en el botón <span class="badge badge-danger" style="padding: 4px;width:58px;"><i class="fa fa-file-pdf-o"></i></span> de la tabla y podrás visualizar el documento.</li>
                                            <li>Cuando el estado es <span class="badge badge-success m-1" style="padding: 4px;width:58px;font-size:10px">Activo</span>, el funcionario al que se registro el documento, podrá visualizarlo en su cuenta personal.</li>
                                            <li>Cuando el estado es <span class="badge badge-danger m-1" style="padding: 4px;width:58px;font-size:10px">Inactivo</span>, el funcionario al que se registro el documento, no podrá visualizarlo en su cuenta personal.</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="row justify-content-center pb-4">
                                <div class="col-lg-7">
                                    <label>Acciones: </label>
                                    <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Enviar notificacion</span>
                                    <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-plus"></i> Registrar documento</span>
                                    <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar documento</span>
                                    <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-check-circle"></i> Activar documento</span>
                                    <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-minus-circle"></i> Inactivar documento</span>
                                    <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar documento</span>
                                </div>
                                <!-- <div class="col-lg-3"></div> -->
                            </div>

                            <div class="row col-11 justify-content-between">
                                <label class="btn btn-warning btn-sm shadow-sm" style="border-radius: 15px 15px 15px 0px;height:35px; width:168px;" data-toggle="modal" data-target="#modal-planilla"><i class="fas fa-plus fa-sm text-white-100 pr-2"></i>Registrar documento
                                </label>
                            </div>

                            <div class="row py-2">
                                <div class="col-xl-8 col-lg-7">
                                    <div class="card shadow mb-4">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-width:100%;">
                                                <table id="tabladocumentos" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>ID</th>
                                                            <th>RUT</th>
                                                            <th>NOMBRE</th>
                                                            <th>DESCRIPCIÓN</th>
                                                            <th>ARCHIVO</th>
                                                            <th>ESTADO</th>
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

                                <!-- Pie Chart -->
                                <div class="col-xl-4 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                            <h6 class="m-0 font-weight-bold text-secondary">ENVIAR NOTIFICACIONES</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div>
                                                <input type="checkbox" id="checkboxdocumentos" value="funcionarios">
                                                <label id="nombredelabel"> Funcionarios</label>
                                            </div>
                                            <form method="post" id="form-notificacion-a-usuario">
                                                <?php
                                                $sql = "SELECT rut,nombre_usuario FROM usuario WHERE estado_usuario=1"; //donde sea un usuario activo=1
                                                $consulta = mysqli_query($mysqli, $sql);
                                                if (!$consulta) {
                                                    echo 'Error';
                                                } else {
                                                ?>

                                                    <div class="form-group" id="divselect">
                                                        <label for="not_rut" class="col-form-label">Funcionario:</label>
                                                        <select class="form-control" id="not_rut" name="not_rut" required>
                                                            <option value="">Seleccione funcionario...</option>
                                                            <?php
                                                            while ($fila = mysqli_fetch_array($consulta)) {
                                                                echo '<option value="' . $fila['rut'] . '">' . $fila['rut'] . ' - ' . $fila['nombre_usuario'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                <?php } ?>

                                                <!--DESCRIPCIÓN -->
                                                <div class="form-group">
                                                    <label for="noti_desc" class="col-form-label">Descripción:</label>
                                                    <textarea class="form-control" name="noti_desc" id="noti_desc" placeholder="Especifique mensaje a  entregar" rows="4" cols="100" minlength="3" maxlength="100" onkeypress="return soloCaractDeConversacion(event)" onpaste="return false" style="resize: none;"  required></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-secondary btn-block" style="float: right;"><i class="fa fa-paper-plane" aria-hidden="true" style="min-width: 5px;"></i> Enviar notificación</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DEL ROW -->
                        </div>
                        <!--FIN DEL tab-pane -->
                        <div class="tab-pane fade" id="nav-notificaciones-m" role="tabpanel" aria-labelledby="notificacionesmostrar">

                            <div class="row justify-content-center pt-2">
                                <div class="col-lg-7">
                                    <div class="alert alert-secondary" role="alert">
                                        <!-- <div class="row justify-content-between"> -->
                                        <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                                        <!-- </div> -->
                                        <ul>
                                            <li>Haz click en el botón <span class="badge badge-<?php echo $temadelacookie; ?>" style="padding: 4px;"><i class="fas fa-broom"></i> Limpiar notificaciones </span> de la tabla y podrás limpiar todas las notificaciones registradas hasta hoy. <br>Al hacerlo, también desapareceran las notificaciones anteriores a los funcionarios</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>


                            <div class="row justify-content-center py-2">
                                <div class="col-xl-10">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <!-- <h6 class="m-0 font-weight-bold text-info">Reuniónes Agendadas</h6>-->
                                            <a id="limpiarnotificacion" class="btn btn-sm btn-<?php echo $temadelacookie; ?> shadow-sm text-white"><i class="fas fa-broom"></i> Limpiar notificaciones</a>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-width:100%;">
                                                <table id="tabla-de-notificaciones-admin" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                    <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>NOMBRE FUNCIONARIO</th>
                                                            <th>MENSAJE</th>
                                                            <th>FECHA</th>
                                                            <th>ESTADO</th>
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

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->




    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#documentosadmin").attr('class', 'nav-item active');
    </script>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../partes/modal/modal_documento.php'; ?>
    <?php include '../partes/modal/modal_editar_documento.php'; ?>
    <?php include '../partes/modal/modal_mostrar_documento.php'; ?>


    <script>
        $('#archivo_modal').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "pdf") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 26214400) { //1048576bytes * 25 = 25MB   (IMAGEN NO MAYPR A 25 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        // console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 25 MB");
                        alertify.error("Tamaño excede a 25 MB");
                        $(this).val('');
                    }
                } else {
                    $(this).val('');
                    alertify.error("Extension no permitida");
                    // console.log("Extensión no permitida: " + ext);
                }
            }
        });

        $('#archivo_editar').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "pdf") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 26214400) { //1048576bytes * 25 = 25MB   (IMAGEN NO MAYPR A 25 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        // console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                        alertify.error("Tamaño excede a 25 MB");
                        $(this).val('');
                    }
                } else {
                    $(this).val('');
                    alertify.error("Extension no permitida");
                    // console.log("Extensión no permitida: " + ext);
                }
            }
        });
    </script>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#SuperADMIN").attr('class', 'nav-item active');
    </script>


    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/documentos.js"></script>
</body>

</html>