<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (!isset($_SESSION['sesionCESFAM']) && !isset($rol)) { //VALIDA QUE LA SESIÓN ESTE INICIADA Y HALLA UN ROL, ESTA PANTALLA LA VEN TODOS LOS FUNCIONARIOS
    header("Location:../indice/");
}
include '../dashboard/head.php';
?>
<link rel="stylesheet" href="../../css/circulovacaciones.css">

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

    .scroll {
        max-height: 410px;
        overflow-y: auto;
    }


    #scrolear::-webkit-scrollbar {
        width: 7px;
        background-color: #F5F5F5;
    }

    #scrolear::-webkit-scrollbar-thumb {
        background-color: #cc3527;
        border-radius: 10px;
    }

    #gif {
        /* height: 150px !important;
        width: 100% !important;
        background-position: 50% 50%;
        background-repeat: no-repeat; */
        height: 100px !important;
        width: 100px !important;
        background-position: 90% 50%;
        background-repeat: no-repeat;
    }
    .btn-purple {
        background-color: #e052b4 ;
        color: white;
    }

    .btn-purple:hover {
        background-color: #cc369d;
        color: white;
    } 
</style>
<title>Salud los Álamos - Mi cuenta</title>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="container">
                        <div class="row" id="circleBar">
                            <div class="col-md-3">
                                <div class="round" data-value="0.74" data-size="200" data-thickness="6">
                                    <strong id="total_micuenta">+ 0</strong>
                                    <span><i class="fas fa-map-pin" style="color: #e74a3b;font-size: 22px;margin-right: 6px;"></i> Documentos en mi cuenta</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="round" data-value="0.65" data-size="200" data-thickness="6">
                                    <strong id="total_calidad">+ 0</strong>
                                    <span><i class="fas fa-map-pin" style="color: #e74a3b;font-size: 22px;margin-right: 6px;"></i> Documentos en calidad</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="round" data-value="0.95" data-size="200" data-thickness="6">
                                    <strong id="total_sl_permisos">+ 0</strong>
                                    <span><i class="fas fa-map-pin" style="color: #e74a3b;font-size: 22px;margin-right: 6px;"></i> Solicitudes registradas</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="round" data-value="0.95" data-size="200" data-thickness="6">
                                    <strong id="total_videoconf">+ 0</strong>
                                    <span><i class="fas fa-map-pin" style="color: #e74a3b;font-size: 22px;margin-right: 6px;"></i> Videoconferencias registradas</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between py-3">
                        <div class="col-lg-5">
                            <div class="alert alert-secondary" role="alert">
                                <i class="fas fa-info-circle"></i> <strong>A considerar</strong> <br>
                                <ul>
                                    <li>Haz click en el botón <span class="badge badge-secondary" style="padding: 5px;width:58px;"><i class="fa fa-file-pdf-o"></i></span> de la tabla y podrás visualizar el documento.</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">


                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h6 class="m-0 font-weight-bold text-secondary">DOCUMENTOS RECIBIDOS</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tabla-planilla-usuario" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <th>ID PLANILLA</th>
                                                    <th>RUT</th>
                                                    <th>NOMBRE</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>PDF</th>
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
                                    <h6 class="m-0 font-weight-bold text-secondary">BANDEJA DE ENTRADA</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body scroll" id="scrolear">

                                    <div id="mostrar">

                                        <div class="row justify-content-center">
                                            <img id="gif" src="../../importantes/gif3.gif">
                                        </div>


                                    </div>

                                    <!--   <div class="card-footer">
                            <button type="button" class="btn btn-info btn-block limpiar">
                            <i class="fa fa-trash"></i> Limpiar
                            </button>
                            </div>-->

                                </div>
                            </div>
                        </div>
                        <!--FIN DEL ROW -->
                    </div>
                    <!-- /.container-fluid -->

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
            $("#micuenta").attr('class', 'nav-item active');
        </script>

        <?php include '../partes/modal/modal_mostrar_archivo_micuenta.php'; ?>



        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../assets/datatables/datatables.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="js/micuenta.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js'></script>
        <script>
            function Circlle(el) {
                $(el).circleProgress({
                    fill: {
                        color: '#e74a3b'
                    }
                    // })
                    /* .on('circle-animation-progress', function(event, progress, stepValue) {
                        $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2) + '%');*/
                });
            };
            Circlle('.round');
        </script>

</body>

</html>