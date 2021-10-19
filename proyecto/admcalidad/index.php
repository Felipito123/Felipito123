<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && $rol == 4) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php include '../conexion/conexion.php'; ?>
<?php include '../dashboard/head.php'; ?>
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
</style>
<title>Salud los Álamos - Registro Calidad</title>
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
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Registro Calidad</h1>
                        <!-- <a href="#" class="btn btn-sm btn-warning shadow-sm"><i class="fas fa-trash-restore"></i> Limpiar notificaciones</a>-->
                    </div>

                    <div class="row justify-content-center pb-2">
                        <div class="col-lg-7">
                            <div class="alert alert-info" role="alert">
                                <!-- <div class="row justify-content-between"> -->
                                <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                                <!-- </div> -->
                                <ul>
                                    <li>Haz click en el botón <span class="badge badge-info" style="padding: 4px;width:58px;"><i class="fa fa-files-o"></i></span> de la tabla y podrás visualizar el documento.</li>
                                    <li>Cuando el estado es <span class="badge badge-success m-1" style="padding: 4px;width:58px;font-size:10px">Activo</span>, el funcionario al que se registro el documento, podrá visualizarlo en su cuenta personal.</li>
                                    <li>Cuando el estado es <span class="badge badge-danger m-1" style="padding: 4px;width:58px;font-size:10px">Inactivo</span>, el funcionario al que se registro el documento, no podrá visualizarlo en su cuenta personal.</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-center pb-4">
                    <div class="col-xl-4"></div>
                        <div class="col-xl-6">
                            <label>Acciones: </label>
                            <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Registrar documento</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar documento</span>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-check-circle"></i> Activar documento</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-minus-circle"></i> Inactivar documento</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar documento</span>
                        </div>
                        <!-- <div class="col-lg-3"></div> -->
                    </div>


                    <div class="row">

                        <div class="col-xl-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h6 class="m-0 font-weight-bold text-secondary">REGISTRAR DOCUMENTO</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="post" id="form-documento-calidad">

                                        <!-- Archivo: PDF O IMAGEN -->
                                        <div class="form-group">
                                            <input type="file" id="archivo_calidad" name="archivo_calidad" accept=".png,.jpg,.jpeg,.pdf" required> <!-- en este caso si o si debe insertar un archivo-->
                                        </div>

                                        <!--DESCRIPCIÓN -->
                                        <div class="form-group">
                                            <label for="descripcion_calidad" class="col-form-label">Descripción:</label>
                                            <textarea class="form-control" name="descripcion_calidad" id="descripcion_calidad" placeholder="Especifique el documento a entregar" onkeypress="return soloCaractDeConversacion(event)" rows="4" cols="100" minlength="2" maxlength="50" style="resize: none;" required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-paper-plane" aria-hidden="true" style="min-width: 5px;color:white"></i> Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h6 class="m-0 font-weight-bold text-secondary">LISTADO DE DOCUMENTOS</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive" style="max-width:100%;">
                                        <table id="tabla-calidad" class="table table-striped table-bordered table-condensed">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <!-- <th>ID CALIDAD</th> -->
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>ARCHIVO</th>
                                                    <th>ESTADO</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="text-center">
                                                <tr>
                                                    <!-- <th>ID CALIDAD</th> -->
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>ARCHIVO</th>
                                                    <th>ESTADO</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </tfoot>
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


            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../partes/modal/modal_editar_calidad.php'; ?>
    <?php include '../partes/modal/modal_calidad_admin.php'; ?>

    <script>
        $('#archivo_calidad').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "pdf") {
                    // console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        //  console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                        alertify.error("Tamaño excede a 20 MB");
                        $(this).val('');
                    } else {
                        //$("#modal-gral").hide();
                    }
                } else {
                    $(this).val('');
                    alertify.error("Extension no permitida");
                    // console.log("Extensión no permitida: " + ext);
                }
            }
        });

        $('#archivo_modal_editar').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "pdf") {
                    //console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        //console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                        alertify.error("Tamaño excede a 20 MB");
                        $(this).val('');
                    } else {
                        //$("#modal-gral").hide();
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
        $("#calidad").attr('class', 'nav-item active');
    </script>


    <!-- Custom scripts for all pages-->
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>
    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>   ESTE ME GENERA ERROR EN LOS DROPDOWN-->
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/admcalidad.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>