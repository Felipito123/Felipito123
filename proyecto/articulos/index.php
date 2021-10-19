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
        /* el 2: es la segunda fila de descripcion, lo cuenta del 1 en adelante*/
        max-width: 100px;
    }

    .table.dataTable td:nth-child(2) {
        /* el 2: es la segunda fila de descripcion, lo cuenta del 1 en adelante*/
        max-width: 100px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    /* @media (max-width: 360px) {
        #ver_articulo_descripcion {
            width: 200px !important;
        }
    } */
</style>
<title>Salud los Álamos - Ver artículos</title>
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

                <div class="container" style="text-align: center;padding-bottom: 55px; max-width: 1900px !important;">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <!-- <h1 class="h3 mb-0 text-gray-800">ZOOM</h1> -->
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Ver artículos</h1>
                    </div>



                    <div class="container">
                        <div class="row justify-content-center py-3">
                            <div class="col-xl-11">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label>Acciones: </label>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar artículo</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar artículo</span>
                                    </div>
                                    <div class="col-xl-6">
                                        <label>Exportar: </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> Generar informe en excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> Generar informe en pdf</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="card shadow" id="card-mis-publicaciones">
                                <div style="padding: 2%;">
                                    <div class="table-responsive">
                                        <table id="tablaverarticulos" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <th>TÍTULO ARTICULO</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>FECHA DE SUBIDA</th>
                                                    <!-- <th>ID_IMAGEN</th>
                                                    <th>ID_ARTICULO</th>
                                                    <th>ID_CATEGORIA</th>
                                                    <th>RUT</th> -->
                                                    <th>CREADOR</th>
                                                    <th>CATEGORIA</th>
                                                    <th>IMAGEN</th>
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
                        </div>
                    </div>

                    <!--fin del container-fluid -->
                </div>


            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php include '../partes/modal/modal_ver_articulos.php'; ?>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>





    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#administracion").attr('class', 'nav-item active');
    </script>

    <script>
        function validaextension() {
            var archivo = document.getElementById('archivo');
            if (/\.(jpe?g|png|jpg|JPEG|PNG|JPG )$/i.test(archivo.files[0].name) === false) {
                archivo.setCustomValidity('No es una imagen');
            } else {
                archivo.setCustomValidity('');
            }
        }
    </script>


    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../js/summernote-ES.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="js/ver_articulos.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>