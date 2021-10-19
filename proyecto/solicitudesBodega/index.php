<?php session_start();
$usuario;
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 3 || $rol == 21)) { //VALIDA QUE SÓLO PUEDE VER ESTA PANTALLA EL SUPERADMINISTRADOR Y EL ENC. DE BODEGA
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$fechaminima = "2020" . "-01" . "-01";
$fechamaxima = $anoactual . "-12" . "-31";
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>
<title>Salud los Álamos - Solicitudes de Materiales a Bodega </title>
<style>
    #content {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%23714359'/%3E%3Cstop offset='1' stop-color='%23b36a8e'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%238f8f8f'/%3E%3Cstop offset='0.09' stop-color='%23b3b3b3'/%3E%3Cstop offset='0.18' stop-color='%23c9c9c9'/%3E%3Cstop offset='0.31' stop-color='%23dbdbdb'/%3E%3Cstop offset='0.44' stop-color='%23e8e8e8'/%3E%3Cstop offset='0.59' stop-color='%23f2f2f2'/%3E%3Cstop offset='0.75' stop-color='%23fafafa'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='.5' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: top left;
    }

    .table th {
        padding: 0.25rem !important;
    }

    .btn-colornuevo {
        background-color: #009688;
        border: #009688;
        color: white;
    }

    .btn-colornuevo:hover {
        background-color: #056158;
        border: #009688;
        color: white;
    }

    .btn-outline-colornuevo {
        color: #056158;
        border-color: #009688;
    }

    .btn-outline-colornuevo:hover {
        background-color: #056158;
        border-color: #009688;
        color: white;
    }

    .border-left-verdeoscuro {
        border-left: .25rem solid #009688 !important;
    }

    .border-left-rosadooscuro {
        border-left: .25rem solid #C9779F !important;
    }

    .border-top-success {
        border-top: .25rem solid #1cc88a !important;
    }

    .border-top-danger {
        border-top: .25rem solid #e74a3b !important;
    }

    .border-top-secondary {
        border-top: .25rem solid #858796 !important;
    }

    .badge-morado {
        color: #fff;
        background-color: #9267FF;
    }

    .bg-morado {
        background-color: #9267FF !important;
    }

    /* 
    PÁGINA PARA VER FONDOS 
    https://www.svgbackgrounds.com/#confetti-doodles */
</style>


<!-- <link rel="stylesheet" href="https://demo.dashboardpack.com/marketing-html/css/style.css"> -->
<!-- <link rel="stylesheet" href="../../css/efectosawesome.css">
<script src="https://pro.fontawesome.com/releases/v6.0.0-beta1/js/all.js" data-auto-add-css="false" data-auto-replace-svg="false"></script>  -->


<!-- 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
<script src="https://pro.fontawesome.com/releases/v6.0.0-beta1/js/all.js" data-auto-add-css="false" data-auto-replace-svg="false"></script> -->
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


                <div class="container-fluid" style="padding-bottom: 25px;">

                    <div class="row justify-content-center pt-3 pb-3">
                        <div class="col-xl-4 col-sm-6 mb-lg-0">
                            <!-- Card-->
                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-0">
                                    <div class="px-5 py-3 text-center card-img-top" style="background-color: #C9779F;"><span class="mb-2 d-block mx-auto"><i class="fas fa-box-tissue" style="font-size: 55px;color:white;"></i></span>
                                        <h5 class="text-white mb-0">Solicitudes de material</h5>
                                        <p class="small text-white mb-0"> <i class="fas fa-male pr-1" style="font-size: 18px;"></i> Realizadas por funcionario (a)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-xl-2 col-sm-4 mb-4">
                            <div class="card border-top-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"> Solicitud Pendiente</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-circle fa-2x" style="color: #808080 !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-sm-4 mb-4">
                            <div class="card border-top-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Solicitud Aprobada</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-circle fa-2x" style="color: #009688 !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-sm-4 mb-4">
                            <div class="card border-top-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Solicitud Rechazada</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-circle fa-2x" style="color: #e74a3b !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pb-3">

                        <div class="col-xl-4 col-sm-12 pb-2">
                            <div class="card" style="border-top: 5px solid #C9779F;">
                                <div class="card-body">
                                    <form id="formularioRegSolMaterial" method="POST">
                                        <div class="row justify-content-between text-left pl-2">
                                            <div class="col-xl-12 col-sm-12">
                                                <label class="form-control-label" style="font-weight: 300;font-size:20px">Panel De Datos </label>
                                            </div>
                                        </div>

                                        <div class="card shadow-sm">
                                            <div class="card-body" style="background: #F5F6FF;">
                                                <div class="row justify-content-center">
                                                    <!-- <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div> -->
                                                    <div class="col-xl-12 col-sm-12">

                                                        <div class="row justify-content-center">
                                                            <div class="col-xl-12 col-sm-12 mb-4">
                                                                <div class="card bg-white shadow h-100 py-2">
                                                                    <div class="card-body">
                                                                        <div class="row no-gutters align-items-center">
                                                                            <div class="col mr-2">
                                                                                <div class="text-xs font-weight-bold text-gray text-uppercase mb-1"> Solicitudes Pendientes</div>
                                                                                <div class="h4 mb-0 font-weight-bold text-light-800 text-left text-dark" id="solicitudes_pendiente">
                                                                                    +5000
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <span class="badge badge-primary" id="ano_actual_sl_pendientes" style="font-size: 11px;font-weight: 400;display: inline-block;border-radius: 3px;padding: 6px 14px;">+ 25 Año actual</span>
                                                                                <span class="badge badge-primary" id="mes_anterior_sl_pendientes" style="font-size: 11px;font-weight: 400;display: inline-block;border-radius: 3px;padding: 6px 14px;">+ 5 Mes anterior</span>
                                                                            </div>

                                                                            <div class="col-xl-12 pt-3">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-primary" role="progressbar" id="barra_progreso_pendientes" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-sm-12 mb-4">
                                                                <div class="card bg-white shadow h-100 py-2">
                                                                    <div class="card-body">
                                                                        <div class="row no-gutters align-items-center">
                                                                            <div class="col mr-2">
                                                                                <div class="text-xs font-weight-bold text-gray text-uppercase mb-1"> Solicitudes Aprobadas</div>
                                                                                <div class="h4 mb-0 font-weight-bold text-light-800 text-left text-dark" id="solicitudes_aprobadas">
                                                                                    +5000
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <span class="badge badge-warning" id="ano_actual_sl_aprobadas" style="font-size: 11px;font-weight: 400;display: inline-block;border-radius: 3px;padding: 6px 14px;">+ 25 Año actual</span>
                                                                                <span class="badge badge-warning" id="mes_anterior_sl_aprobadas" style="font-size: 11px;font-weight: 400;display: inline-block;border-radius: 3px;padding: 6px 14px;">+ 5 Mes anterior</span>
                                                                            </div>

                                                                            <div class="col-xl-12 pt-3">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-warning" role="progressbar" id="barra_progreso_aprobadas" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-sm-12 mb-2">
                                                                <div class="card bg-white shadow h-100 py-2">
                                                                    <div class="card-body">
                                                                        <div class="row no-gutters align-items-center">
                                                                            <div class="col mr-2">
                                                                                <div class="text-xs font-weight-bold text-gray text-uppercase mb-1"> Solicitudes Rechazadas</div>
                                                                                <div class="h4 mb-0 font-weight-bold text-light-800 text-left text-dark" id="solicitudes_rechazadas">
                                                                                    +5000
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"> 
                                                                                <span class="badge badge-morado" id="ano_actual_sl_rechazadas" style="font-size: 11px;font-weight: 400;display: inline-block;border-radius: 3px;padding: 6px 14px;">+ 25 Año actual</span>
                                                                                <span class="badge badge-morado" id="mes_anterior_sl_rechazadas" style="font-size: 11px;font-weight: 400;display: inline-block;border-radius: 3px;padding: 6px 14px;">+ 5 Mes anterior</span>
                                                                            </div>

                                                                            <div class="col-xl-12 pt-3">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-morado" role="progressbar" id="barra_progreso_rechazadas" style="width: 72%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">72%</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-sm-12">
                            <div class="card rounded shadow-sm border-left-0 border-right-0 " style="border-top: 6px solid #C9779F;">

                                <div class="card-body p-2">

                                    <div class="row justify-content-between text-left pl-2">
                                        <div class="col-xl-12 col-sm-12">
                                            <label class="form-control-label" style="font-weight: 300;font-size:20px">Resultados de las solicitudes recibidas</label>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="card shadow-sm mb-4 pb-2">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="tabla_solicitudes_bodega" class="table">
                                                            <thead class="text-center" style="background-color: #C9779F;color:white;">
                                                                <tr>
                                                                    <th scope="col" title="Estado">ESTADO</th>
                                                                    <th scope="col" title="Nombre Solicitante">SOLICITANTE</th>
                                                                    <th scope="col" title="Categoria">CATEGORÍA</th>
                                                                    <th scope="col" title="Cantidad">CANTIDAD</th>
                                                                    <th scope="col" title="Nombre material">NOMBRE DEL MATERIAL</th>
                                                                    <th scope="col" title="Fecha registro">FECHA REG.</th>
                                                                    <th scope="col" title="Comentario">COMENTARIO</th>
                                                                    <th scope="col" title="Acciones">ACCIONES</th>
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

                                    <!-- <div class="row justify-content-center col-xl-12 pb-3">
                                    <div class="col-xl-2"><i style="color: #86ecf9;" class="fa fa-circle" aria-hidden="true"></i> 0-2 días</div>
                                    <div class="col-xl-2"><i style="color: #ffa900;" class="fa fa-circle" aria-hidden="true"></i> 3-7 días</div>
                                    <div class="col-xl-2"><i style="color: #00b74a;" class="fa fa-circle" aria-hidden="true"></i> 8-15 días</div>
                                    <div class="col-xl-2"><i style="color: #f93154;" class="fa fa-circle" aria-hidden="true"></i> 16-30 días</div>
                                    <div class="col-xl-2"><i style="color: #b23cfd;" class="fa fa-circle" aria-hidden="true"></i> +30 días</div>
                                </div> -->

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!--FIN DEL ROW -->
            </div>
            <!-- End of Content Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>
        <!-- End of Page Wrapper -->
    </div>




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#solicitudesbodega").attr('class', 'nav-item active');
    </script>



    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="js/SolicitudesBod.js"></script>
    <!-- <script src="js/funciones.js"></script> -->


    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



    <script src="../js/Grafico.min.js"></script>



</body>

</html>