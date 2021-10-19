<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (!isset($_SESSION['sesionCESFAM']) && !isset($rol)) { //VALIDA QUE LA SESIÓN ESTE INICIADA Y HALLA UN ROL, ESTA PANTALLA LA VEN TODOS LOS FUNCIONARIOS
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
<title>Salud los Álamos - Videochat</title>
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
                        <!-- <h1 class="h3 mb-0 text-gray-800">ZOOM</h1> -->
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Reuniones Zoom Programadas (VideoChat)</h1>
                    </div>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom: 1px solid transparent;"> <!--Aqui yo quito el borde del tab -->
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Reuniones próximas</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reuniones terminadas</a>
                            <!--<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contacto</a>-->
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row py-2">
                                <div class="col-xl-12 col-lg-7">
                                    <div class="alert alert-warning" role="alert">
                                        <i class="fas fa-info-circle"></i> <strong>A considerar</strong> <br>
                                        <ul>
                                            <li>Los funcionarios pueden ingresar a la sala virtual una vez el estado del botón sea Iniciar.</li>
                                            <li>Para mantener la videoconferencia segura, evite publicar la clave de acceso en redes sociales o páginas web públicas.</li>
                                            <li>Si su videoconferencia se excede de la duración programada, esta se puede cerrar automáticamente una vez cumplido el plazo.</li>
                                        </ul>
                                    </div>
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center"> -->
                                            <!-- <h6 class="m-0 font-weight-bold text-info">Reuniónes Agendadas</h6>-->
                                        <!-- </div> -->
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-width:100%;">
                                                <table id="tabla-usuario-zoom" class="table table-striped table-bordered table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="text-white bg-secondary">
                                                            <th>ESTADO</th>
                                                            <th>TEMA</th>
                                                            <th>HORA INICIO</th>
                                                            <th>DURACIÓN</th>
                                                            <th>CLAVE</th>
                                                            <th>ACCIÓN</th>
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
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center"> -->
                                            <!-- <h6 class="m-0 font-weight-bold text-info">Reuniónes Agendadas</h6>-->
                                        <!-- </div> -->
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-width:100%;">
                                                <table id="tabla-usuario-zoom-finalizada" class="table table-striped table-bordered table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="text-white bg-secondary">
                                                            <th>TEMA</th>
                                                            <th>HORA INICIO</th>
                                                            <th>DURACIÓN</th>
                                                            <!-- <th>CLAVE</th> -->
                                                            <th>ANFITRIÓN</th>
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
                        <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">??</div>-->
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


    </script>





    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#videochatusuario").attr('class', 'nav-item active');
    </script>


    <script src="../js/funcionswal.js"></script>
    <script src="js/tablazoomusuario.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>

    <!-- <script src="../js/validaciongeneral.js"></script>
    <script src="js/validaciones.js"></script> -->
</body>

</html>