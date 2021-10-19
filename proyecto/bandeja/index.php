<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 2 || $rol == 3)) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>

<?php include '../dashboard/head.php'; ?>


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

    /* ESTOS ULTIMOS 2 ESTILOS ES PARA COLOCAR LOS ... A LAS TABLAS CON HARTO TEXTO Y PREVENIR EL LARGO ESPACIADO*/
    .table.dataTable td:nth-child(5) {
        /*A LA DESCRIPCIÓN LE AGREGA LA ELLIPSIS(...) MÁS ABAJO*/
        max-width: 100px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }
</style>
<title>Salud los Álamos - Bandeja de mensajes</title>
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


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Bandeja de mensajes</h1>
                    </div>


                    <div class="row justify-content-center pb-2">
                        <div class="col-xl-5 col-sm-12">
                            <div class="alert alert-secondary" role="alert">
                                <strong> <i class="fas fa-info-circle pb-2"></i> Información</strong> <br>
                                <ul>
                                    <li>En esta sección se muestran los mensajes enviados por los usuarios que han interactuado en el sistema, desde la pantalla de "Contáctanos" del sistema web.</li>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row justify-content-center py-2">
                            <div class="col-xl-10 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12">
                                        <label>Generar informe (G.I): </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en pdf</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                    <div class="col-xl-6 col-sm-12">
                                        <label>Acciones: </label>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-eye"></i> Visualizar mensaje</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar mensaje</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div style="padding: 2%;">
                                    <div class="table-responsive">
                                        <table id="tabla-bandeja-mensajes" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <!-- <th>ID CONTACTO</th> -->
                                                    <th>NOMBRE DEL EMISOR</th>
                                                    <th>CORREO</th>
                                                    <th>TELÉFONO</th>
                                                    <th>ASUNTO</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--fin del table responsive -->
                                </div>
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



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../partes/modal/modal_ver_mensajes.php'; ?>



    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#administracion").attr('class', 'nav-item active');
    </script>



    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>   ESTE ME GENERA ERROR EN LOS DROPDOWN-->
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="js/bandejademensajes.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>