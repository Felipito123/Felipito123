<?php include '../dashboard/head.php'; ?>
<title>Salud los Álamos - COVID 19</title>
<!-- <link rel="stylesheet" href="https://www.biobiochile.cl/resultados-elecciones-constituyentes/css/chunk-common.f62bf890.css"> -->
<link rel="stylesheet" href="css/candidatos.css">
</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="pb-4">

                <?php include '../dashboard/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" id="contenedorgeneral">

                    <div class="container">
                        <div class="card">
                            <div class="row justify-content-center m-2 pt-4">

                                <div class="col-sm-2">
                                    <div>
                                        <span style="color: black;font-weight: 700; font-size:12px;">VACUNACIÓN EN CHILE</span>
                                    </div>
                                    <label id="vacuna-actualizado" style="font-size:11px;">...</label>
                                </div>

                                <div class="col-sm-5">

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" style="color: black;font-size:13px;">Primera Dosis</label>
                                        <span id="primera-value" class="col-sm-4 text-primary" style="font-weight: 700; font-size:20px;">...</span>
                                        <label class="col-sm-5 col-form-label" style="color: black;font-size:13px;">Objetivo: <label id="dosis-objetivo-1">...</label></label>

                                        <div class="col-sm-12">
                                            <div class="progress" style="height: 5px;">
                                                <div id="primera-dosis" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" class="progress-bar bg-primary" style="width: 99.56%;"></div>
                                            </div>
                                        </div>

                                        <label id="primera-dosis-value" class="col-sm-12 text-center text-primary pt-2" style="font-weight: 700;font-size:13px;">... %</label>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" style="color: black;font-size:13px;">Segunda Dosis</label>
                                        <span id="segunda-value" class="col-sm-4 text-primary" style="font-weight: 700; font-size:20px;">...</span>
                                        <label class="col-sm-5 col-form-label" style="color: black;font-size:13px;">Objetivo: <label id="dosis-objetivo-2">...</label></label>

                                        <div class="col-sm-12">
                                            <div class="progress" style="height: 5px;">
                                                <div id="segunda-dosis" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" class="progress-bar bg-primary" style="width: 99.56%;"></div>
                                            </div>
                                        </div>

                                        <label id="segunda-dosis-value" class="col-sm-12 text-center text-primary pt-2" style="font-weight: 700;font-size:13px;">... %</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <script>
                        /*  ==========================================ESTE ES EL JSON QUE CONSUME==============================================
                    {"primeraDosis":11438522,"segundaDosis":8804347,"total":15200840,"actualizado_dia_mes":"14\/06","actualizado_hora":"08:00"}
                    */
                        $.getJSON("https://www.biobiochile.cl/static/graficos/json/vacunas.json", {
                            _: new Date().getTime()
                        }, function(data) {

                            console.log(data);

                            var primeraDosis = data.primeraDosis * 100 / data.total
                            var total = data.total.toLocaleString("es-CL");
                            $("#primera-dosis").attr("aria-valuenow", data.primeraDosis);
                            $("#primera-dosis").attr("aria-valuemax", data.total);
                            $("#primera-dosis").attr("style", "width: " + primeraDosis + "%");
                            $("#primera-dosis-value").text(primeraDosis.toFixed(2) + "%");

                            // console.log("v1: "+data.primeraDosis);
                            var primera = data.primeraDosis.toLocaleString("es-CL"); //sete los números por ejemplo: 1000 -> 1.000 ó 1000000 -> 1.000.000
                            // console.log("v2: "+primera);
                            $("#primera-value").text(primera);

                            var segundaDosis = data.segundaDosis * 100 / data.total
                            $("#segunda-dosis").attr("aria-valuenow", data.segundaDosis);
                            $("#segunda-dosis").attr("aria-valuemax", data.total);
                            $("#segunda-dosis").attr("style", "width: " + segundaDosis + "%");
                            $("#segunda-dosis-value").text(segundaDosis.toFixed(2) + "%");
                            var segunda = data.segundaDosis.toLocaleString("es-CL");
                            $("#segunda-value").text(segunda);
                            var objetivo = data.total.toLocaleString("es-CL");
                            $("#dosis-objetivo-1").text(objetivo);
                            $("#dosis-objetivo-2").text(objetivo);
                            $("#vacuna-actualizado").text('Ultima actualización entregada por el Minsal: ' + data.actualizado_dia_mes + ' - ' + data.actualizado_hora);


                        });
                    </script>
                    <br>

                    <div class="container-fluid p-2">

                        <div class="row justify-content-center">

                            <div class="col-sm-3 col-md-12 text-center pb-2">
                                <div>
                                    <span style="color: #154F91;font-weight: 700; font-size:22px;">COVID-19</span>
                                    <span style="font-size:22px;color:#154F91;">|</span>
                                    <span style="color:#154F91;font-size:17px;">C H I L E</span>
                                </div>
                                <label class="pl-2" style="font-size:11px;"> Actualizado: <strong id="actualizadofechayhora">...</strong></label>
                            </div>

                            <div class="col-xl-3 col-sm-12 pb-2">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center" style="height: 25px;">
                                            <div class="col mr-2">
                                                <label style="color: black;font-family: 'Ubuntu', sans-serif;font-size:15px;">Contagios</label> <!-- font-weight-bold -->
                                            </div>
                                            <div class="col-auto">
                                                <label id="contagios" style="color: black;font-weight: 700;font-size:21px;">...</label>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <label style="font-family: 'Ubuntu', sans-serif;font-size:12px;">Total Contagios</label>
                                            </div>
                                            <div class="col-auto">
                                                <label id="total_contagios" style="color: black;font-size:12px;">...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-12 pb-2">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center" style="height: 25px;">
                                            <div class="col mr-2">
                                                <label style="color: black;font-family: 'Ubuntu', sans-serif;font-size:15px;">Fallecidos</label> <!-- font-weight-bold -->
                                            </div>
                                            <div class="col-auto">
                                                <label id="fallecidos" class="text-danger" style="color: black;font-weight: 700;font-size:21px;">...</label>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <label style="font-family: 'Ubuntu', sans-serif;font-size:12px;">Total fallecidos</label>
                                            </div>
                                            <div class="col-auto">
                                                <label id="total_fallecidos" class="font-weight-bold text-danger" style="color: black;font-size:12px;">...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-sm-12 pb-2">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center" style="height: 50px;">
                                            <div class="col mr-2">
                                                <label style="color: black;font-family: 'Ubuntu', sans-serif;font-size:15px;">Casos activos</label> <!-- font-weight-bold -->
                                            </div>
                                            <div class="col-auto">
                                                <label id="casos_activos" style="color: black;font-weight: 700;font-size:21px;">...</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center" style="height: 50px;">
                                            <div class="col mr-2">
                                                <label style="color: black;font-family: 'Ubuntu', sans-serif;font-size:15px;">Ocupación Camas UCI</label> <!-- font-weight-bold -->
                                            </div>
                                            <div class="col-auto">
                                                <label id="camas_uci" class="text-danger" style="color: black;font-weight: 700;font-size:21px;">...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="container-fluid p-2">

                        <div class="row justify-content-center text-center pb-2">

                            <div class="col-xl-3 col-sm-12">
                                <div class="card shadow">
                                    <div class="card-body">

                                        <div class="pb-3">
                                            <span style="color: black;font-weight: 700; font-size:16px;">MAYORES ALZAS CONTAGIOS</span>
                                        </div>

                                        <div class="form-group row">
                                            <label id="primera_region" class="col-sm-6 col-form-label col-form-label-sm">Región Metropolitana</label>
                                            <div class="col-sm-6">
                                                <i class="fa fa-chevron-up text-danger"></i>
                                                <label id="primer_alza" class="text-danger" style="color: black;font-weight: 700;font-size:18px"> ...</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label id="segunda_region" class="col-sm-6 col-form-label col-form-label-sm">Región Metropolitana</label>
                                            <div class="col-sm-6">
                                                <i class="fa fa-chevron-up text-danger"></i>
                                                <label id="segunda_alza" class="text-danger" style="color: black;font-weight: 700;font-size:18px"> ...</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label id="tercera_region" class="col-sm-6 col-form-label col-form-label-sm">Región Metropolitana</label>
                                            <div class="col-sm-6">
                                                <i class="fa fa-chevron-up text-danger"></i>
                                                <label id="tercer_alza" class="text-danger" style="color: black;font-weight: 700;font-size:18px"> ...</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <!-- ==================================== REGIÓN ARICA Y PARINACOTA=========================================-->
                            <div class="col-xl-9 pt-2">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <canvas id="aricayparinacota"></canvas>
                                            </div>
                                        </div>
                                        <hr>
                                        <code> Región de Arica y Parinacota (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="ARICPARINC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>
                                <!-- ==================================== REGIÓN TARAPACÁ=========================================-->

                                <!-- <div class="col-xl-9 col-lg-12 pt-2"> -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="tarapaca"></canvas>
                                        <hr>
                                        <code> Región de Tarapacá (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="TARAPC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>
                                <!-- </div> -->


                                <!-- ==================================== REGIÓN ATACAMA=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="atacama"></canvas>
                                        <hr>
                                        <code> Región de Atacama (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="ATACM" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>


                                <!-- ==================================== REGIÓN ANTOFAGASTA=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="antofagasta"></canvas>
                                        <hr>
                                        <code> Región de Antofagasta (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="ANTF" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN COQUIMBO=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="coquimbo"></canvas>
                                        <hr>
                                        <code> Región de Coquimbo (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="CQUIM" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN VALPARAISO=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="valparaiso"></canvas>
                                        <hr>
                                        <code> Región de Valparaiso (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="Valpa" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN METROPOLITANA=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="metropolitana"></canvas>
                                        <hr>
                                        <code> Región de Metropolitana (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="METROP" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN O'HIGGINS=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="ohiggins"></canvas>
                                        <hr>
                                        <code> Región de O'higgins (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="OHIGG" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN MAULE=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="maule"></canvas>
                                        <hr>
                                        <code> Región de Maule (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="MAUL" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN ÑUBLE=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="ñuble"></canvas>
                                        <hr>
                                        <code> Región de Ñuble (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="ÑUBL" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN BÍO BÍO=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="biobio"></canvas>
                                        <hr>
                                        <code> Región de BÍO BÍO (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="BIOB" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN ARAUCANÍA=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="araucania"></canvas>
                                        <hr>
                                        <code> Región de la Araucanía (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="ARAUC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN LOS RIOS=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="losrios"></canvas>
                                        <hr>
                                        <code> Región de los Ríos (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="RI" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN LOS LAGOS=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="loslagos"></canvas>
                                        <hr>
                                        <code> Región de los Lagos (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="LAG" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN DE AYSÉN=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="aysen"></canvas>
                                        <hr>
                                        <code> Región de Aysén (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="AY" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== REGIÓN MAGALLANES=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="magallanes"></canvas>
                                        <hr>
                                        <code> Región de Magallanes (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="MAG" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>

                                <!-- ==================================== COVID 19 EN LOS ÁLAMOS=========================================-->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <canvas id="losalamos"></canvas>
                                        <hr>
                                        <code> Covid-19 LOS ÁLAMOS (Casos por cada 100.000 habitantes)</code>
                                        <span class="btn btn-sm btn-success float-right" id="MAG" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                    </div>
                                </div>


                            </div>


                        </div>


                        <main role="main" class="container">
                            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-danger rounded box-shadow">
                                <img class="mr-3" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h6 class="mb-0 text-white lh-100">Bootstrap</h6>
                                    <small>Since 2011</small>
                                </div>
                            </div>

                            <div class="my-3 p-3 bg-white rounded box-shadow">
                                <h6 class="border-bottom border-gray pb-2 mb-0" style="color: #212529;font-weight:700">Recent updates</h6>
                                <div class="media text-muted pt-3">
                                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a01bf07%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a01bf07%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <strong class="d-block text-gray-dark">@username</strong>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                    </p>
                                </div>
                                <div class="media text-muted pt-3">
                                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=e83e8c&amp;fg=e83e8c&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a01bf0a%20text%20%7B%20fill%3A%23e83e8c%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a01bf0a%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23e83e8c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <strong class="d-block text-gray-dark">@username</strong>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                    </p>
                                </div>
                                <div class="media text-muted pt-3">
                                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=6f42c1&amp;fg=6f42c1&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a01bf0c%20text%20%7B%20fill%3A%236f42c1%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a01bf0c%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%236f42c1%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <strong class="d-block text-gray-dark">@username</strong>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                    </p>
                                </div>
                                <small class="d-block text-right mt-3">
                                    <a href="#">All updates</a>
                                </small>
                            </div>

                            <div class="my-3 p-3 bg-white rounded box-shadow">
                                <h6 class="border-bottom border-gray pb-2 mb-0 text-dark">Suggestions</h6>
                                <div class="media text-muted pt-3">
                                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a01bf0d%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a01bf0d%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <strong class="text-gray-dark">Full Name</strong>
                                            <a href="#">Follow</a>
                                        </div>
                                        <span class="d-block">@username</span>
                                    </div>
                                </div>
                                <div class="media text-muted pt-3">
                                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a01bf0f%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a01bf0f%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <strong class="text-gray-dark">Full Name</strong>
                                            <a href="#">Follow</a>
                                        </div>
                                        <span class="d-block">@username</span>
                                    </div>
                                </div>
                                <div class="media text-muted pt-3">
                                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a01bf10%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a01bf10%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <strong class="text-gray-dark">Full Name</strong>
                                            <a href="#">Follow</a>
                                        </div>
                                        <span class="d-block">@username</span>
                                    </div>
                                </div>
                                <small class="d-block text-right mt-3">
                                    <a href="#">All suggestions</a>
                                </small>
                            </div>
                        </main>

                        <div class="row mb-2">
                            <div class="col-md-4 col-sm-12">
                                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                                        <h3 class="mb-0">
                                            <a class="text-dark" href="#">Featured post</a>
                                        </h3>
                                        <div class="mb-1 text-muted">Nov 12</div>
                                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#">Continue reading</a>
                                    </div>
                                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a0ce56a%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a0ce56a%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a4a0ce56d%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a4a0ce56d%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 250px;">
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                                        <h3 class="mb-0">
                                            <a class="text-dark" href="#">Post title</a>
                                        </h3>
                                        <div class="mb-1 text-muted">Nov 11</div>
                                        <p class="card-text mb-auto text-center">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#">Continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <script>
                        $.getJSON("https://www.biobiochile.cl/static/coronavirus-v3.json", function(data) {

                            // console.log("DATA: "+ JSON.stringify(data));

                            $("#contagios").text('+ ' + data.nuevos_contagios.toLocaleString("pt-EU")); //es-CL
                            $("#total_contagios").text(data.contagios_totales.toLocaleString('pt-EU'));
                            $("#fallecidos").text('+ ' + data.nuevos_fallecidos.toLocaleString('pt-EU'));
                            $("#total_fallecidos").text(data.fallecidos.toLocaleString('pt-EU'));
                            $("#casos_activos").text(data.recuperados.toLocaleString('pt-EU'));
                            $("#camas_uci").text(data.camas.toLocaleString('pt-EU') + '%');
                            $("#primera_region").text(data.primera_region.replace(String.fromCharCode(92), ''));
                            $("#primer_alza").text(data.primer_alza);
                            $("#segunda_region").text(data.segunda_region.replace(String.fromCharCode(92), ''));
                            $("#segunda_alza").text(data.segunda_alza);
                            $("#tercera_region").text(data.tercera_region.replace(String.fromCharCode(92), ''));
                            $("#tercer_alza").text(data.tercer_alza);
                            $("#actualizadofechayhora").text(data.actualizado_dia_mes + ' - ' + data.actualizado_hora);
                        });
                    </script>

                    <br>


                </div>

                <section style="background-image: url('https://partidorepublicanodechile.cl/wp-content/uploads/2021/06/FONDO-SLIDE-ACTUALIZA-TUS-DATOS.jpg');background-position: 50% -100px;background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
                    <img width="711" height="631" src="https://partidorepublicanodechile.cl/wp-content/uploads/2021/06/FOTOS-DE-PERFIL-PDF.png" class="attachment-full size-full" alt="https://partidorepublicanodechile.cl/wp-content/uploads/2021/06/FOTOS-DE-PERFIL-PDF.png" loading="lazy">
                </section>

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

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#firmadigital").attr(' class', 'nav-item active');
    </script>

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../jsdashboard/jquery.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/Grafico.min.js"></script>
    <script src="js/TraducirMeses.js"></script>
    <script src="js/covidregiones.js"></script>

    <script>
        // moment.locale('es-CL');

        covidRegionAricaYParinacota();
        covidRegionTarapaca();
        covidRegionAtacama();
        covidRegionAntofagasta();
        covidRegionCoquimbo();
        covidRegionValparaiso();
        covidRegionMetropolitana();
        covidRegionOhiggins();
        covidRegionMaule();
        covidRegionNuble();
        covidRegionBioBio();
        covidRegionAraucania();
        covidRegionLosRios();
        covidRegionLosLagos();
        covidRegionAysen();
        covidRegionMagallanes();

        //=============================VACUNADOS Y NO VACUNADOS====================================//
        // var ctx = document.getElementById('VacunadosYnoVacunados');
        // var grafico6 = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ['No Vacunados', 'Dosis N°1', 'Dosis N°2'],
        //         datasets: [{
        //             label: ['#No Vacunados', '#Dosis1', '#Dosis2'],
        //             data: [9065, 16651, 12921],
        //             backgroundColor: [
        //                 'rgba(255, 0, 0, 0.2)',
        //                 'rgba(169, 50, 38, 0.51)',
        //                 'rgba(255, 99, 132, 0.2)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     }
        // });




        var ctx = document.getElementById("losalamos");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>


</body>

</html>