<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 2 || $rol == 3)) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
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
<title>Salud los Álamos - Banner Video</title>
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

                <div class="row justify-content-center pb-2">
                    <div class="col-xl-5 col-sm-12">
                        <div class="alert alert-success" role="alert">
                            <!-- <div class="row justify-content-between"> -->
                            <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                            <!-- </div> -->
                            <ul>
                                <li>Cuando el estado es <span class="badge badge-success m-1" style="padding: 4px;width:58px;font-size:10px">Activo</span>, las personas que se dirijan a la página web, podran visualizar el banner de imagen en la sección derecha de su pantalla.</li>
                                <li>Cuando el estado es <span class="badge badge-danger m-1" style="padding: 4px;width:58px;font-size:10px">Inactivo</span>, las personas que se dirijan a la página web, no podran visualizar el banner de imagen.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container-fluid" style="text-align: center; padding-bottom: 25px;">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mx-auto">
                            <form id="formBannerVideo" method="POST" autocomplete="off">
                                <div class="card shadow">
                                    <div style="padding: 2%;">
                                        <!--AÑADIR CATEGORIAS -->
                                        <div class="row" style="max-width:100%;margin-left:2px;margin-right:2px;">
                                            <!--el row es el que hace conflicto por eos un lado era más ancho que el otro. Asi que, le agregue el margin-left y right -->
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <!-- PARA QUE SEA RESPONSIVO USE LA CLASE DEL table-responsive -->
                                                    <div class="justify-content-center">
                                                        <!--centro los div -->
                                                        <h4 style="font-weight: 300;">Video + Titulo</h4>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-file-video-o" aria-hidden="true" style="min-width: 5px;"></i></span>
                                                            <input type="text" class="form-control" id="titulovideobanner" name="titulovideobanner" placeholder="Ingrese titulo del video" onkeypress="return validabannervideos(event)" onpaste="return false" minlength="2" maxlength="55" required>
                                                        </div>
                                                        <div class="input-group mb-3 justify-content-center">
                                                            <input type="file" class="estilo-archivo" id="videobanner" name="videobanner" accept=".mp4" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-secondary btn-block" style="float: right;"><i class="fa fa-paper-plane" aria-hidden="true" style="min-width: 5px;"></i> Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- End container-fluid -->

                <div class="container-fluid">
                    <div class="row justify-content-center py-3">
                        <div class="col-xl-5 col-sm-12">
                            <label>Generar informe (G.I): </label>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en excel</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en pdf</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                        </div>
                        <div class="col-xl-5 col-sm-12 pb-2">
                            <label>Acciones: </label>
                            <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Ingresar video</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar video</span>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-check-circle"></i> Activar video</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-minus-circle"></i> Inactivar video</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar video</span>
                        </div>
                        <!-- <div class="col-lg-3"></div> -->
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-11 col-sm-12">
                            <div class="card shadow">
                                <div style="padding: 2%;">
                                    <div class="table-responsive">
                                        <table id="tabla-banner-videos" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <!-- <th>ID BANER VIDEOS</th> -->
                                                    <th>TITULO</th>
                                                    <th>VIDEO</th>
                                                    <th>ESTADO</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--fin del table responsive -->
                                </div>
                                <!--fin del row -->
                            </div>
                            <!--fin del container-fluid -->
                        </div>
                    </div>
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

    <?php include '../partes/modal/modal_banner_videos.php'; ?>

    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>   ESTE ME GENERA ERROR EN LOS DROPDOWN-->
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="js/banner_videos.js"></script>

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#administracion").attr('class', 'nav-item active');
    </script>

    <script>
        $('#videobanner').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "mp4") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 41943040) { ////1048576bytes * 40 = 40MB   (VIDEO NO MAYOR A 40 MB)
                        // console.log("El video excede el tamaño máximo: archivo no debe ser mayor a 40 MB");
                        alertify.error("Tamaño excede a 40 MB");
                        $(this).val('');
                    } else {
                        //$("#modal-gral").hide();
                    }
                } else {
                    $(this).val('');
                    alertify.error("Sólo se permiten videos");
                    // console.log("Extensión no permitida: " + ext);
                }
            }
        });

        $('#archivo_banner_videos').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "mp4") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 41943040) { ////1048576bytes * 40 = 40GB   (VIDEO NO MAYOR A 40 MB) AJAX NO ME PERMITE UN VIDEO MAYOR A 40MB
                        // console.log("El video excede el tamaño máximo: archivo no debe ser mayor a 40 MB");
                        alertify.error("Tamaño excede a 40 MB");
                        $(this).val('');
                    }
                } else {
                    $(this).val('');
                    alertify.error("Sólo se permiten videos");
                    // console.log("Extensión no permitida: " + ext);
                }
            }
        });
    </script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>