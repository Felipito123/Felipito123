<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 5)) { //VALIDA QUE SÓLO PUEDE VER EL ENC. DE SALUD BUCAL
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>

<?php include '../dashboard/head.php'; ?>
<?php include '../conexion/conexion.php'; ?>

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
        /* el 2: es la segunda fila de descripcion, lo cuenta del 1 en adelante*/
        max-width: 100px;
    }

    .table.dataTable td:nth-child(2) {
        /* el 2: es la segunda fila de descripcion, lo cuenta del 1 en adelante*/
        max-width: 100px;
    }

    .table.dataTable td:nth-child(3) {
        /* el 2: es la segunda fila de descripcion, lo cuenta del 1 en adelante*/
        max-width: 250px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

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

    input[type="checkbox"] {
        position: relative;
        width: 49px;
        height: 18px;
        top: 4px;
        -webkit-appearance: none;
        background-color: #c6c6c6;
        outline: none;
        border-radius: 20px;
        box-shadow: inset 0 0 5px rgb(0, 0, 0, .2);
        transition: .5s;
    }

    input:checked[type="checkbox"] {
        background: #03a9f4;
    }

    input[type="checkbox"]:before {
        content: '';
        position: absolute;
        width: 19px;
        height: 18px;
        border-radius: 20px;
        top: 0;
        left: 0;
        background: #fff;
        transform: scale(1.1);
        box-shadow: 0 2px 5px rgb(0, 0, 0, .2);
        transition: .5s;
    }

    input:checked[type="checkbox"]:before {
        left: 30px;
    }
</style>
<title>Salud los Álamos - Ver artículos Salud Bucal</title>
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

                <div class="container-fluid pb-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Ver Artículos</h1>
                        <!-- <a href="#" class="btn btn-sm btn-warning shadow-sm"><i class="fas fa-trash-restore"></i> Limpiar notificaciones</a>-->
                    </div>

                    <div class="row justify-content-center pb-2">
                        <div class="col-xl-8">
                            <div class="alert alert-success" role="alert">
                                <!-- <div class="row justify-content-between"> -->
                                <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                                <!-- </div> -->
                                <ul>
                                    <li>Cuando el estado es <span class="badge badge-success m-1" style="padding: 4px;width:58px;font-size:10px">Visible</span>, las personas que se dirijan a la página web, podran visualizar el articulo de odontologia.</li>
                                    <li>Cuando el estado es <span class="badge badge-danger m-1" style="padding: 4px;width:58px;font-size:10px">Oculto</span>, las personas que se dirijan a la página web, no podran visualizar el articulo de odontologia.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pb-4">
                        
                    <div class="col-xl-1 col-sm-12"></div>
                        <div class="col-xl-4 col-sm-12">
                            <label>Generar informe (G.I): </label>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en excel</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en pdf</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                        </div>
                        <div class="col-xl-1 col-sm-12"></div>
                        <div class="col-xl-6 col-sm-12">
                            <label>Acciones: </label>
                            <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Enviar anexo</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar articulo</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fas fa-tags"></i> Registrar anexo</span>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fas fa-list"></i> Ver anexos</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar articulo</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar anexo</span>
                        </div>
                        <!-- <div class="col-xl-3"></div> -->
                    </div>

                    <div class="row justify-content-center pb-2">
                        <div class="col-xl-11">
                            <div class="card shadow">
                                <div style="padding: 2%;">
                                    <div class="table-responsive">
                                        <table id="tablaverarticulosodonto" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <!-- <th>ID ARTICULO</th> -->
                                                    <th>TITULO</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <!-- <th>FRASE</th>
                                                    <th>CITA</th> -->
                                                    <th>IMAGEN</th>
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


    <?php include '../partes/odontologia/modal_ver_articulos_odonto.php'; ?>
    <?php include '../partes/odontologia/modal_registrar_anexo.php'; ?>
    <?php include '../partes/odontologia/modal_detalle_anexo.php'; ?>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>





    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#articulos_odonto").attr('class', 'nav-item active');
    </script>

    <script>
        $('#imagen_anexo').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "pdf") {
                    //console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 41943040) { //1048576bytes * 40 = 40MB   (IMAGEN NO MAYPR A 40 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        //console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 40 MB");
                        alertify.error("Tamaño excede a 40 MB");
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



        $('#ver_articulo_imagen_odonto').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
                    console.log("La extensión es: " + ext);
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


    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/articulos_odonto.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="../js/summernote-ES.js"></script>

</body>

</html>