<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 2 || $rol == 3 || $rol == 11)) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR, SUPERADMIN Y DIRECTOR
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
$fechaminima = date("Y-01-01");
$fechamaxima = date("Y-12-31");
$fechainiciopordefecto = date("Y-m-01");
$fechafinpordefecto = date("Y-m-t");
// date_default_timezone_set("America/Santiago");
// setlocale(LC_TIME, "spanish");
// $fechaactual = strftime("%F");
// $horactual = strftime("%X");
// $hoy = date("Y-m-d");
// echo $fechainicio.'<br>';
// echo $fechafin.'<br>';
?>

<?php include '../dashboard/head.php'; ?>

<style>
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }

    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }

    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }

    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }

    .border_verde_oscuro {
        border-left: 0.25rem solid #008080 !important;
    }

    .border_palido {
        border-left: 0.25rem solid #e8c3b9 !important;
    }

    .border_rojo_oscuro {
        border-left: 0.25rem solid #c45850 !important;
    }

    .border_celeste_claro {
        border-left: 0.25rem solid #b6d6e4 !important;
    }

    .border_azul_oscuro {
        border-left: 0.25rem solid #3e95cd !important;
    }

    .border_verde {
        border-left: 0.25rem solid #3cba9f !important;
    }

    .border_80aaa5 {
        border-left: 0.25rem solid #80aaa5 !important;
    }

    .text_80aaa5 {
        color: #80aaa5 !important;
    }

    .border_ab9559 {
        border-left: 0.25rem solid #ab9559 !important;
    }

    .text_ab9559 {
        color: #ab9559 !important;
    }

    .border_fafdde {
        border-left: 0.25rem solid #fafdde !important;
    }

    .text_fafdde {
        color: #fafdde !important;
    }

    .border_2e799a {
        border-left: 0.25rem solid #2e799a !important;
    }

    .text_2e799a {
        color: #2e799a !important;
    }

    .border_3cba9f {
        border-left: 0.25rem solid #3cba9f !important;
    }

    .text_3cba9f {
        color: #3cba9f !important;
    }

    .border_c9cce6 {
        border-left: 0.25rem solid #c9cce6 !important;
    }

    .border_cac2e2 {
        border-left: 0.25rem solid #cac2e2 !important;
    }

    .border_fbd4e5 {
        border-left: 0.25rem solid #fbd4e5 !important;
    }

    .border_babde0 {
        border-left: 0.25rem solid #babde0 !important;
    }

    .text_c9cce6 {
        color: #c9cce6 !important;
    }

    .text_cac2e2 {
        color: #cac2e2 !important;
    }

    .text_fbd4e5 {
        color: #fbd4e5 !important;
    }

    .text_babde0 {
        color: #babde0 !important;
    }

    #gif {
        height: 50px !important;
        width: 50px !important;
        background-position: 90% 50%;
        background-repeat: no-repeat;
    }

    .table th {
        /*El doy el ancho de las filas (th) de las tabla*/
        padding: 0.25rem !important;
    }
    /* rgba(93,82,247, 1)rgba(237,78,136, 1) */
    .btn-violet {
        color: #fff;
        background-color: #8962de;
        border-color: #8962de;
    }
    .btn-violet:hover {
        color: #fff;
        background-color: #6439c1;
        border-color: #6439c1;
    }
</style>

<script src="https://pagination.js.org/dist/2.1.5/pagination.js"></script>
<script src="https://pagination.js.org/dist/2.1.5/pagination.min.js"></script>
<link rel="stylesheet" href="https://pagination.js.org/dist/2.1.4/pagination.css" />

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/wordCloud.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<title>Salud los Álamos - Escritorio y Gráficos</title>

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
                    <!-- text-center -->

                    <!-- Content Row -->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cantidad de articulos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="articulostotales">
                                                <img id="gif" src="../../importantes/gif2.gif">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-list-alt fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Usuarios Registrados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="usuarioregistrado">
                                                <img id="gif" src="../../importantes/gif2.gif">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user-plus fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Visualización por articulo</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="barradeprogreso">
                                                        <img id="gif" src="../../importantes/gif2.gif">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-clipboard fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usuarios En Linea</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="usuarioactivo">
                                                <img id="gif" src="../../importantes/gif2.gif">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-lightbulb-o fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--FIN DEL ROW -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-sm-12">
                            <div class="card shadow-sm mb-4">

                                <?php // echo $temadelacookie; 
                                ?>
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class=" m-0 font-weight-normal text-secondary"><i class="fa fa-area-chart mr-1"></i> Artículos más vistos</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-file-excel fa-fw text-success"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                    <span class="btn btn-sm btn-success" id="exportarexcel1" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body text-center">
                                    <canvas id="graficoCanvas" width="1200" height="400"></canvas>
                                    <!-- <hr> -->
                                    <!-- Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file. -->
                                </div>

                                <!-- <div class="card-footer">
                                    <span class="btn btn-success" id="exportarexcel1"><i class="fa fa-file-excel"></i> Exportar a excel</span>
                                </div> -->
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <!-- Card Header - Dropdown -->
                                <?php // echo $temadelacookie; 
                                ?>
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fa fa-chart-pie mr-1"></i> Artículos menos vistos</h6>
                                    <span class="btn btn-sm btn-success" id="exportarexcel2" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart" width="370" height="270"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2 ">
                                            <i class="fa fa-circle text-<?php echo $temadelacookie; ?>"></i> Haz click en las barras
                                        </span>
                                    </div>
                                    <!-- <hr>
                                    Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file. -->
                                </div>
                                <!-- <div class="card-footer">
                                    <span class="btn btn-success" id="exportarexcel2"><i class="fa fa-file-excel"></i> Exportar a excel</span>
                                </div> -->
                            </div>
                        </div>

                        <div class="col-xl-5 col-sm-12 pb-2">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <form id="formuEstadVisYVisitsArtNot" name="formuEstadVisYVisitsArtNot" method="POST" autocomplete="off">
                                                <div class="form-group text-center">
                                                    <div class="input-group pt-3">
                                                        <span class="form-control input-group-text col-sm-1"> <small>Desde</small> </span>
                                                        <input type="date" class="form-control col-sm-4" id="desdeEstadVisYVisitsArtNot" placeholder="Fecha de Desde" title="Fecha de Desde" min='<?php echo $fechaminima; ?>' max='<?php echo $fechamaxima; ?>' value="<?php echo $fechainiciopordefecto ?>">
                                                        <span class="form-control input-group-text col-sm-1"><small>Hasta</small></span>
                                                        <input type="date" class="form-control col-sm-4" id="hastaEstadVisYVisitsArtNot" placeholder="Fecha de Hasta" title="Fecha de Hasta" value="<?php echo $fechafinpordefecto ?>">
                                                        <button type="submit" class="btn btn-info form-control col-sm-2" title="Tooltip on top"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-xl-5">
                                            <div class="input-group">
                                                <span class="btn btn-success form-control">Visitas</span>
                                                <label class="btn btn-secondary form-control" title="" id="contadorvisitasEstarticulo">0</label>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 p-2"></div>

                                        <div class="col-xl-5">
                                            <div class="input-group">
                                                <span class="btn btn-warning form-control">Visitantes</span>
                                                <label class="btn btn-secondary form-control" title="" id="contadorvisitantesEstarticulo">0</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-sm-12 pb-4">
                            <div class="card shadow-sm mb-1">

                                <div class="card-header p-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-chart-bar pr-1"></i> Estadisticas de Visitas/Visitantes de un artículo de noticias por rango de fechas </h6>
                                    <span class="btn btn-sm btn-success" id="expGraficoEstadisticaVisitasYvisitantesArtNoticia" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="GraficoEstadVisYVisitsArtNot" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-sm-12 pb-4">
                            <div class="card shadow-sm mb-1">

                                <div class="card-header p-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-chart-bar pr-1"></i> Seguimiento de calificaciones de los artículos</h6>
                                    <span class="btn btn-sm btn-success" id="expGraficoSeguimientoCalificacionesDeLosArticulos" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="graficoSeguimientoCalificacionesDeLosArticulos" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-chart-pie pr-1"> </i> 5 Artículos mejor calificados</h6>
                                    <span class="btn btn-sm btn-success" id="exp5ArtMejorCalif" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="cincArtMejorCalificado" width="100%" height="100%"></canvas>
                                        </div>
                                    </div>

                                    <div class="row no-gutters align-items-center pt-4">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-gray text-uppercase">Porcentaje de crecimiento de las calificaciones / respecto del mes anterior</div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12 pt-1">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" id="barra_progreso_PortjeCrecimiento" style="width: 25%;background-color: #dcd1ef!important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <!-- Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file. -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--FIN DEL SEGUNDO ROW -->

                    <div class="row justify-content-center">

                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-1">

                                <div class="card-header p-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-quote-right pr-1"></i> Artículo de noticia más comentados</h6>
                                    <span class="btn btn-sm btn-success" id="expgraficoArticuloMasComentados" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <div id="ArticuloMasComentados" style="width: 100%;height:380px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-1">

                                <div class="card-header p-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-quote-right pr-1"></i> Concurrencia de comentarios por usuario y artículo de noticia</h6>
                                    <span class="btn btn-sm btn-success" id="expgraficoConcComentarioUsuarporArticulo" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <div id="UsQueMasHanCom" style="width: 100%;height:380px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-city pr-1"> </i> Ciudades de los usuarios que calificaron un articulo</h6>
                                    <span class="btn btn-sm btn-success" id="expCiudadArtCalificados" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">

                                            <div class="col-xl-12 col-sm-12">

                                                <div class="form-group row">
                                                    <label class="col-sm-1 col-form-label"><i class="fas fa-search"></i></label>
                                                    <div class="col-sm-11">
                                                        <input type="text" id="busquedatablaciudades" class="form-control" placeholder="" aria-controls="tabla_paises_calificados">
                                                    </div>
                                                </div>
                                                <div class="table-responsive">

                                                    <table id="tabla_ciudades_calificados" class="table">
                                                        <thead class="text-center" style="background-color: #6fc2d2;color:white;">
                                                            <tr>
                                                                <th scope="col" title="CIUDAD" style="border:none;">CIUDADES DE LOS USUARIOS <i class="fas fa-star text-warning"></i></th>
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
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-chart-pie pr-1"> </i><i class="fas fa-user-lock"></i> Estado de actividad de funcionarios</h6>
                                    <span class="btn btn-sm btn-success" id="exportarexcel6" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <canvas id="grafico4" width="100%" height="100%"></canvas>
                                        </div>
                                    </div>
                                    <!-- <hr>
                                    Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file. -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row" id="cardgraficodearea">

                        <!-- ==================================== Mensajes en la bandeja de contacto vs semestre =========================================-->

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-chart-pie pr-1"> </i>Sectores y cantidad de funcionarios</h6>
                                    <span class="btn btn-sm btn-success" id="exportarSectconMayorCantDeFuncionarios" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <canvas id="graficoSectconMayorCantDeFuncionarios" width="100%" height="80"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-chart-pie pr-1"> </i> Cantidad de funcionarios por unidad</h6>
                                    <span class="btn btn-sm btn-success" id="expCantDeFuncionariosPorUnidad" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="graficoCantDeFuncionariosPorUnidad" width="100%" height="100%"></canvas>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <!-- Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file. -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="icofont-chart-pie-alt fa-1x pr-1"></i> Mensajes en la bandeja de contacto vs semestre</h6>
                                    <span class="btn btn-sm btn-success" id="BNDJYPORSEM" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <canvas id="banjmensjporsemestre" width="100%" height="100%"></canvas>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <!-- Letalidad desde Inicio de Pandemia 1.19% -->
                                </div>
                            </div>
                        </div>

                        <!-- ==================================== Estados de actividad de los banner de Imágenes y Videos =========================================-->

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary">Estados de actividad de los banner de Imágenes y Videos</h6>
                                    <span class="btn btn-sm btn-success" id="expBannerIMGeVID" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="GraficoBannerIMGeVID" width="100%" height="100%"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Videoconferencias </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="Pvideoconferencias">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-video fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Documentos en mi cuenta </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PDocMicuenta">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Documentos de Calidad </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PDocCalidad">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cantidad de Eventos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PCantEventoCalendario">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-week fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <!-- ==================================== (4) PATOLOGIAS MÁS FRECUENTES EN PACIENTES=========================================-->
                        <div class="col-xl-6 col-sm-12">
                            <div class="card shadow mb-4">

                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary">VACUNADOS y NO VACUNADOS</h6>
                                    <span class="btn btn-sm btn-success" id="VACYNOVAC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div> -->

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <canvas id="Pacienteconpatologias"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Patologias más frecuentes en pacientes
                                    <span class="btn btn-sm btn-success float-right" id="5patologiasfrec" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow-sm mb-4">

                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-normal text-secondary"><i class="fas fa-chart-bar pr-2"></i><i class="fas fa-arrow-down pr-2"></i><i class="fas fa-users"></i> Histórico menor cantidad de vacaciones por funcionario</h6>
                                    <span class="btn btn-sm btn-success" id="exportarpacientesingresado" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div> -->

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <canvas id="graficopacientesregistrado"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Gráfico de paciente registrados mensualmente en el año en curso
                                    <span class="btn btn-sm btn-success float-right" id="exportarpacientesregistrado" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <div id="graficohombreymujer"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    Pacientes por Rango de Edad y Género
                                    <span class="btn btn-sm btn-success float-right" id="expRangoEdadySexo" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="GraficoSolicitudesDeMedicamentosTrimestral"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Solicitudes de medicamentos trimestrales (En espera, En tránsito, Entregado)
                                    <span class="btn btn-sm btn-success float-right" id="expSolicDeMedTrimestral" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="GraficoHistoricoRegMedPorDiaDeSemana" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Histórico Cantidad de medicamentos registrados en dias de semana
                                    <span class="btn btn-sm btn-success float-right" id="expGraficoHistoricoRegMedPorDiaDeSemana" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="GraficoCantTotalMedPorEstadoDispoEntrVenc" width="800" height="550"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Stock de medicamentos según estado (Disponible, Entregados, Vencidos)
                                    <span class="btn btn-sm btn-success float-right" id="expCantTotalMedPorEstadoDispoEntrVenc" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="GraficoCantMedEstadosMedPorTrimestre" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Cantidad total de medicamentos según su estado y trimestre
                                    <span class="btn btn-sm btn-success float-right" id="expGraficoCantMedEstadosMedPorTrimestre" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="GraficoCantMedEstDiaSem" width="800" height="500"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Cantidad total de medicamentos según su estado y dia de semana
                                    <span class="btn btn-sm btn-success float-right" id="expGraficoCantMedEstDiaSem" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Cantidad de pacientes </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="Pcantpacientes">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase-medical fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Pacientes v/s sexo &nbsp; <small>M: Mujeres | H: Hombres</small> </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                M <span id="PcantPacMujeres">0</span> | H <span id="PcantPacHombres">0</span>
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase-medical fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Solicitudes de medicamentos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PCantSolicitudesDeMedicamentos">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase-medical fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_verde_oscuro shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Agenda de medicamentos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PCantAgendaRetiroDeMedicamentos">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase-medical fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- GRÁFICOS NUEVOS -->

                    <div class="row">

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoCantTotalSolAgendaRetMed" width="100%" height="100%"></canvas>
                                        </div>

                                        <!-- <div class="col-sm-3">
                                            <i class="fas fa-circle" style="color: #ff7b36;"></i> 30 Days
                                        </div>

                                        <div class="col-sm-3">
                                            <i class="fas fa-circle" style="color: #3b76ef;"></i> 60 Days
                                        </div>

                                        <div class="col-sm-3">
                                            <i class="fas fa-circle" style="color: #e8205e;"></i> 90 Days
                                        </div>

                                        <div class="col-sm-3">
                                            <i class="fas fa-circle" style="color: #00b382;"></i> 90+Days
                                        </div> -->

                                    </div>
                                    <hr>
                                    Cantidad total de solicitudes de agenda de retiro de medicamentos
                                    <span class="btn btn-sm btn-success float-right" id="expGraficoCantTotalSolAgendaRetMed" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoSolAprbRechzAgenRetMed"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Solicitudes trimestrales de retiro de medicamentos
                                    <span class="btn btn-sm btn-success float-right" id="expSolAprbRechzAgenRetMed" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficMedAgenDiaDeSemana" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Cantidad de medicamentos agendados en dias de semana
                                    <span class="btn btn-sm btn-success float-right" id="expgraficoMedAgenDiaDeSemana" data-toggle="tooltip" data-placement="top" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!--NUEVO PANEL DE DATOS -->

                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_palido shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #e8c3b9;">Cantidad total de permisos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="Pcant_total_de_perm">
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-certificate fa-3x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_rojo_oscuro shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Cantidad de permisos especiales </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="Pcant_perm_espec">
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-certificate fa-3x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_celeste_claro shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #b6d6e4;">Cantidad de permisos administrativos </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="Pcant_perm_adminis">
                                                0
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-certificate fa-3x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_azul_oscuro shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #3e95cd;">Cantidad de permisos feriado legal </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="Pcant_perm_feriado_legal">
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-certificate fa-3x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoCantidadSolicDePermisosEspAdminFerLeg" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Cantidad total de solicitudes de permiso especial, administrativo y feriado legal
                                    <span class="btn btn-sm btn-success float-right" id="expCantidadSolicDePermisosEspAdminFerLeg" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoMotivoSolcPermEspecial" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Motivo de las solicitudes de permiso especial (Historial)
                                    <span class="btn btn-sm btn-success float-right" id="expMotivoSolcPermEspecial" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoCantTotalTipoRemSolPermAdmin" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Tipo de remuneraciones en solicitudes de permiso administrativo (Historial)
                                    <span class="btn btn-sm btn-success float-right" id="expCantTotalTipoRemSolPermAdmin" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-xl-3 col-sm-12 mb-4">
                            <div class="card border_80aaa5 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_80aaa5 text-uppercase mb-1">Cantidad total de solicitudes en Libro R.S.F </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PCantTotSolLibroRSF">
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital-user fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12 mb-4">
                            <div class="card border_ab9559 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_ab9559 text-uppercase mb-1">Institución con más solicitudes </small> </div>
                                            <div class="mb-0 font-weight-bold text-gray-800 text-left">
                                                <small id="PNombreInstMasSolLibroRSF" style="font-size: 9.7px;"></small>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital-user fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-sm-12 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Pueblos indígenas presentes en cada solicitud </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PCantPuebIndgPresCadaSolLibroRSF">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital-user fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12 mb-4">
                            <div class="card border_3cba9f shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_3cba9f text-uppercase mb-1">Funcionarios que han respondido solicitudes </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PCantFuncRespoSolLibroRSF">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital-user fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <!--style="max-width:600px !important;max-height:250px !important;" -->
                                            <canvas id="graficoCantTipSolicLibroRSF" width="600" height="350"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Cantidad según tipo de solicitud en el Libro R.S.F
                                    <span class="btn btn-sm btn-success float-right" id="expgraficoCantTipSolicLibroRSF" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoCantRespSolicitudesReclamosSugerencias" width="100%" height="100%"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Estado de respuesta a las solicitudes reclamos y/o sugerencias
                                    <span class="btn btn-sm btn-success float-right" id="expCantRespSolicitudesReclamosSugerencias" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <!--style="max-width:600px !important;max-height:250px !important;" -->
                                            <canvas id="graficoInstMayorCantDeSolicReclamos" width="600" height="200"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Instituciones con mayor cantidad de solicitudes de reclamos
                                    <span class="btn btn-sm btn-success float-right" id="expgraficoInstMayorCantDeSolicReclamos" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Materiales Disponibles </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PMaterialesBodDisponible">
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pallet fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_80aaa5 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_80aaa5 text-uppercase mb-1">Materiales Entregados </small> </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PMaterialesBodEntregados">
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pallet fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_2e799a shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_2e799a text-uppercase mb-1">Materiales Defectuosos </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PMaterialesBodDefectuosos">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pallet fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_3cba9f shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_3cba9f text-uppercase mb-1">Materiales Perdidos </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PMaterialesBodPerdidos">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pallet fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="graficoMaterialesPorCategoria" width="100%" height="100%"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Frecuencia de las categorías (aseo, oficina e higiene) presentes en los materiales.</code>
                                    <span class="btn btn-sm btn-success float-right" id="expMaterialesPorCat" title="Generar informe en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoGraficoCantMaterBodTrim"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Cantidad trimestral de materiales en bodega según su estado
                                    <span class="btn btn-sm btn-success float-right" id="expgraficoGraficoCantMaterBodTrim" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <canvas id="GraficoStockmensualmaterialesBodega" height="117" style="display: block; width: 294px; height: 117px;" width="294"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Stock mensual de los materiales de bodega
                                    <span class="btn btn-sm btn-success float-right" id="expStockmensualmaterialesBodega" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-7 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficosiete" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    grafico7
                                    <span class="btn btn-sm btn-success float-right" id="expgrafico7" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficoocho"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    grafico8 con colores al azar
                                    <span class="btn btn-sm btn-success float-right" id="expgrafico8" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficonueve"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    grafico9
                                    <span class="btn btn-sm btn-success float-right" id="expgrafico9" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="graficodiez" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    grafico10
                                    <span class="btn btn-sm btn-success float-right" id="expgrafico10" data-toggle="tooltip" data-placement="top" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_c9cce6 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_c9cce6 text-uppercase mb-1">Solicitudes de ayuda</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PAN_SOL_DE_AYUDA">
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comment fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_cac2e2 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_cac2e2 text-uppercase mb-1">Sistema operativo más frecuente </small> </div>
                                            <div class="mb-0 font-weight-bold text-gray-800 text-left" id="PM2">
                                                <small id="PAN_SIS_OP" style="font-size: 13px;"></small>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comment fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_fbd4e5 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_fbd4e5 text-uppercase mb-1">Navegador más utilizado </div>
                                            <div class="mb-0 font-weight-bold text-gray-800 text-left" id="PM3">
                                                <small id="PAN_NAV_MAS_UTILIZADO" style="font-size: 12px;"></small>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comment fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border_babde0 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text_babde0 text-uppercase mb-1">Mensajes respondidos </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="PAN_MSJ_RESPONDIDOS_SPT">
                                                0
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-comment fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-4 col-sm-12 pb-2">
                            <div class="card shadow-none ml-2 mr-2" style="background-image: url('img/fd1.jpg');">
                                <div class="card-body">
                                    <!--style="background: #F5F6FF;" -->
                                    <div class="row justify-content-center">
                                        <!-- <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div> -->
                                        <div class="col-xl-10 col-sm-12">

                                            <div class="row justify-content-center">
                                                <div class="col-xl-12 col-sm-12 mb-4">
                                                    <div class="card bg-white shadow-sm h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-gray text-uppercase mb-1"> Sistema Operativo más frecuente: WIN</div>
                                                                </div>
                                                                <div class="col-xl-12 pt-3">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" id="barra_progreso_sistemaoperativo" style="width: 25%;background-color: #9eb0b8!important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-sm-12 mb-4">
                                                    <div class="card bg-white shadow-sm h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-gray text-uppercase mb-1"> Navegadores más frecuente: CHROME</div>
                                                                </div>
                                                                <div class="col-xl-12 pt-3">
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar" id="barra_progreso_nav_frecuentes" style="width: 45%;background-color: #adb3e3!important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-sm-12 mb-2">
                                                    <div class="card bg-white shadow-sm h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-gray text-uppercase mb-1"> Mensajes respondidos</div>
                                                                </div>
                                                                <div class="col-xl-12 pt-3">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" id="barra_progreso_msjrespondidos" style="width: 72%;background-color: #519faa!important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">72%</div>
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
                        </div>
                        <div class="col-xl-8 col-sm-12 pb-2">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-xl-12 col-sm-12 pb-2">
                                            <canvas id="GrafAyudasSopTecnico" width="800" height="450"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    Ayudas solicitadas a soporte técnico (mensual)
                                    <span class="btn btn-sm btn-success float-right" id="expgraficoAyudasSopTecnico" data-toggle="tooltip" data-placement="top" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Basic Tooltip</h5>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                        Tooltip on top
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                                        Tooltip on right
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                        Tooltip on bottom
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">
                                        Tooltip on left
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>



                    <!--data-date="2013-12-25 00:00:00"  data-timer="5"  -->
                    <!-- <div class="row">
                        <div class="col-xl-7 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center">
                                        <div class="table-responsive col-xl-12 col-sm-12 pb-2">
                                            <div id="exam_timer" data-timer="12"></div>
                                        </div>
                                    </div>
                                    <span class="btn btn-sm btn-success float-right" id="expgrafico100" data-toggle="tooltip" data-placement="top" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
                <!-- /.container-fluid -->

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



    <!-- 
            MENSAJES DE CONTACTO EN EL PRIMER SEMESTRE
                SELECT nombre_contacto FROM contacto WHERE month(fecha_contacto) >= 1 and month(fecha_contacto) <=6

            MENSAJES DE CONTACTO EN EL SEGUNDO SEMESTRE
                SELECT nombre_contacto FROM contacto WHERE month(fecha_contacto) >= 7 and month(fecha_contacto) <=12
        -->



    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#graph").attr('class', 'nav-item active');
    </script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.1/xlsx.full.min.js"></script>
    <script src="../js/funcionswal.js"></script>

    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <!-- <script src="../../jsdashboard/jquery.min.js"></script> -->
    <script>
        function ColoresAlAzar() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgba(" + r + "," + g + "," + b + ", 0.5)";
        }
    </script>



    <script src="js/llenar_grafico.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="js/Grafico.min.js"></script>
    <!-- <script src="js/grafico3.js"></script> -->
    <script src="js/grafico4.js"></script>
    <!-- <script src="js/grafico5.js"></script> -->
    <!-- <script src="js/grafico6.js"></script> -->
    <script src="js/d3.min.js"></script>
    <script src="js/popPyramid.js"></script>
    <script src="../js/TraducirMeses.js"></script>
    <script src="js/graficos.js"></script>
    <script src="js/paneles.js"></script>
    <script src="js/tablas.js"></script>
    <script src="../js/redondearDecimales.js"></script>
    <script src="../js/compararfechas.js"></script>

    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v12.0" nonce="fHwuauJy"></script>



    <!-- <script src="https://d3js.org/d3.v4.min.js"></script>
    
    <script src="js/popPyramid.js"></script> -->
    <!-- <script src="js/popPyramid.min.js"></script> -->

    <script>
        new Chart(document.getElementById("graficoocho"), {
            type: 'polarArea',
            data: {
                labels: ["Africa", "Asia"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["" + ColoresAlAzar(), "" + ColoresAlAzar()],
                    data: [2478, 5267]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        });

        // var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(document.getElementById("graficosiete"), {
            type: 'bar',
            data: {
                labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                datasets: [{
                    data: [86, 114, 106, 106, 107, 111, 133],
                    label: "Total",
                    borderColor: "#3e95cd",
                    backgroundColor: "rgb(62,149,205)",
                    borderWidth: 2,
                    type: 'line',
                    fill: false
                }, {
                    data: [70, 90, 44, 60, 83, 90, 100],
                    label: "Accepted",
                    borderColor: "#3cba9f",
                    backgroundColor: "#3cba9f",
                    borderWidth: 2
                }, {
                    data: [10, 21, 60, 44, 17, 21, 17],
                    label: "Pending",
                    borderColor: "#ffa500",
                    backgroundColor: "#ffa500",
                    borderWidth: 2,
                }, {
                    data: [6, 3, 2, 2, 7, 0, 16],
                    label: "Rejected",
                    borderColor: "#c45850",
                    backgroundColor: "#c45850",
                    borderWidth: 2
                }]
            },
        });

        new Chart(document.getElementById("graficonueve"), {
            type: 'bar',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    data: [70, 90, 44, 60, 83, 90, 100],
                    label: "Accepted",
                    borderColor: "#3cba9f",
                    backgroundColor: "#71d1bd",
                    borderWidth: 2
                }, {
                    data: [10, 21, 60, 44, 17, 21, 17],
                    label: "Pending",
                    borderColor: "#ffa500",
                    backgroundColor: "#ffc04d",
                    borderWidth: 2
                }, {
                    data: [6, 3, 2, 2, 7, 0, 16],
                    label: "Rejected",
                    borderColor: "#c45850",
                    backgroundColor: "#d78f89",
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }],
                }
            },
        });

        var myChart = new Chart(document.getElementById("graficodiez"), {
            type: 'line',
            data: {
                labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                datasets: [{
                    data: [86, 114, 106, 106, 107, 111, 133],
                    label: "Total",
                    borderColor: "rgb(62,149,205)",
                    backgroundColor: "rgb(62,149,205,0.1)",
                }, {
                    data: [70, 90, 44, 60, 83, 90, 100],
                    label: "Accepted",
                    borderColor: "rgb(60,186,159)",
                    backgroundColor: "rgb(60,186,159,0.1)",
                }, {
                    data: [10, 21, 60, 44, 17, 21, 17],
                    label: "Pending",
                    borderColor: "rgb(255,165,0)",
                    backgroundColor: "rgb(255,165,0,0.1)",
                }, {
                    data: [6, 3, 2, 2, 7, 0, 16],
                    label: "Rejected",
                    borderColor: "rgb(196,88,80)",
                    backgroundColor: "rgb(196,88,80,0.1)",
                }]
            },
        });
    </script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.js"></script> -->

    <script>
        // new Chart(document.getElementById("finalfinal"), {
        //     type: 'bar',
        //     data: {
        //         labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
        //         datasets: [{
        //             label: 'My First dataset',
        //             backgroundColor: 'rgb(255, 99, 132)',
        //             borderColor: 'rgb(255, 99, 132)',
        //             data: [0, 10, 5, 2, 20, 30, 45],
        //             borderWidth: 1,
        //             borderRadius: 50
        //         }]
        //     },
        // });
    </script>

    <script>
        // let asja = $('#PAN_SOL_DE_AYUDA').text();
        // NotifTipoIntranet("Información", ""+totalsolicitudesdeayuda_spt, "info");
    </script>

    <!-- Canvaaa -->
    <script>
        // var aricYparic = document.getElementById('Canvaaa').getContext('2d');

        // var chart = new Chart(aricYparic, {
        //     type: 'line',
        //     data: {
        //         datasets: [{
        //             borderColor: '#c3ddf1',
        //             backgroundColor: 'rgba(215, 236, 251, 0.2)',
        //             borderWidth: 1.5
        //         }]
        //     },
        //     options: {
        //         title: {
        //             display: false
        //         },
        //         layout: {
        //             padding: {
        //                 left: -5
        //             }
        //         },
        //         scales: {
        //             xAxes: [{
        //                 type: 'time',
        //                 time: {
        //                     unit: 'month',
        //                     displayFormats: {
        //                         month: 'MMM'
        //                     }
        //                 },
        //                 ticks: {
        //                     fontColor: '#464646',
        //                     fontSize: 12,
        //                     callback: function(label, index, labels) {

        //                         return traducir_label(label);
        //                     }
        //                 },
        //                 gridLines: {
        //                     display: false
        //                 }
        //             }],
        //             yAxes: [{
        //                 ticks: {
        //                     fontColor: '#464646',
        //                     display: true,
        //                     beginAtZero: false,
        //                     padding: 9
        //                 },
        //                 gridLines: {
        //                     color: 'rgba(136,153,166, .3)',
        //                     drawBorder: false,
        //                     drawTicks: false
        //                 }
        //             }]

        //         },
        //         legend: {
        //             display: false
        //         },
        //         elements: {
        //             point: {
        //                 radius: 0
        //             }
        //         },
        //         tooltips: {
        //             enabled: true,
        //             intersect: false,
        //             mode: 'index',
        //             callbacks: {
        //                 title: function(tooltipItem, data) {
        //                     return '';
        //                 },
        //                 label: function(tooltipItem, data) {
        //                     let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
        //                     let expl = var1.split("-");
        //                     return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
        //                 }
        //             }
        //         }
        //     }
        // });

        // //puede llenarse con el json de prueba: CovidRegionesJson/AricYParic.json
        // $.getJSON("https://www.biobiochile.cl/static/graficos/json/arica-y-parinacota.json", {
        //     _: new Date().getTime()
        // }, function(data) {

        //     console.log(data);
        //     // console.log(data.datos[0]);
        //     // console.log(data.datos[1]);

        //     // console.log(chart.data.datasets[0].data);

        //     // chart.data.labels = data.datos.map(function(item) {
        //     //     return Object.values(item)[0]
        //     // })
        //     // chart.data.datasets[0].data = data.datos.map(function(item) {
        //     //     return Object.values(item)[1]
        //     // })
        //     // var nombreRegion = data.nombreRegion;
        //     // chart.options.tooltips.callbacks.title = function(tooltipItem, data) {
        //     //     return 'Juanete'
        //     // }
        //     // chart.update()
        // });
    </script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

</body>

</html>