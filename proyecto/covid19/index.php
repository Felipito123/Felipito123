<?php session_start();
include '../partes/head.php';
?>
<title>Salud los Álamos - Covid-19</title>

<style>
    /*DIFUMINAR LA CARGA DEL DEL FRAME DEL MAPA DE SECTORIZACIÓN*/
    .blur {
        filter: blur(10px);
        transition: all 1s;
    }

    .noblur {
        transition: all 3s;
    }

    /* .nav-item .nav-link .active {
        background-color: #90bde4;
        color: white !important;
    } */

    .nav-pills .nav-link.active,
    .nav-pills .nav-item.show .nav-link {
        color: #fff;
        cursor: default;
        background-color: #90bde4;
    }


    a:hover {
        text-decoration: none;
        color: #477aa7 !important;
    }

</style>

</head>


<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>

    <div class="container-fluid" style="padding-top:80px;padding-bottom:30px;">
        <!-- For Demo Purpose-->
        <header class="text-center">
            <h1 class="font-weight-bold mb-2" id="titulosectores" style="color: #6a97bd;font-size: 50px;">Covid<span style="color:#90bde4;">-19</span></h1>
            <label class="pl-2" style="font-size:11px;"> Actualizado: <strong id="actualizadofechayhora">14/06 - 13:25</strong></label>
        </header>

        <div class="row justify-content-center text-center pb-4 pt-2">

            <div class="col-xl-3 col-sm-6">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="secciones" id="seccion1" value="1" checked>
                    <label class="form-check-label" for="seccion1">
                        Datos gráficos Vacunación Nacional
                    </label>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="secciones" id="seccion2" value="2">
                    <label class="form-check-label" for="seccion2">
                        Datos gráficos Vacunación Comunal
                    </label>
                </div>
            </div>
        </div>

        <div class="container-fluid" id="seccionNacional">
            <div class="row justify-content-center">

                <div class="col-lg-7 pb-2">

                    <div class="card">
                        <div class="row pt-4 m-2">
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


                <div class="col-lg-5">

                    <div class="row">
                        <div class="col-xl-6 col-sm-12 pb-2">
                            <div class="card shadow-sm">
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

                        <div class="col-xl-6 col-sm-12 pb-2">
                            <div class="card shadow-sm">
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

                    <div class="row">
                        <div class="col-xl-6 col-sm-12 pb-2">
                            <div class="card shadow-sm">
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

                        <div class="col-xl-6 col-sm-12">
                            <div class="card shadow-sm">
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

            </div>


            <div class="row justify-content-center text-center pt-2 pb-2">


                <div class="col-xl-8 pt-2">

                    <div class="row justify-content-between pb-2">

                        <div class="col-sm-5">
                            <button type="button" onclick="cifrasoficiales()" class="btn btn-sm btn-block" style="background-color: #90bde4; color:#fff;"> <i class="fas fa-chart-pie"></i> Cifras Oficiales <small>(Fuente: Base de datos Ministerio de Ciencia)</small> </button>
                        </div>

                        <div class="col-sm-3">
                            <button type="button" onclick="calendariovacunacion()" class="btn btn-sm btn-block" style="background-color: #90bde4; color:#fff;"> <i class="fas fa-calendar"></i> Calendario Vacunación </button>
                        </div>

                        <div class="col-sm-4"></div>

                    </div>

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="r1" role="tabpanel" aria-labelledby="r1">
                            <!-- ==================================== REGIÓN ARICA Y PARINACOTA=========================================-->
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <canvas id="aricayparinacota"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    <code> Región de Arica y Parinacota (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="ARICPARINC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN TARAPACÁ=========================================-->
                        <div class="tab-pane fade" id="r2" role="tabpanel" aria-labelledby="r2">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="tarapaca"></canvas>
                                    <hr>
                                    <code> Región de Tarapacá (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="TARAPC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN ATACAMA=========================================-->
                        <div class="tab-pane fade" id="r3" role="tabpanel" aria-labelledby="r3">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="atacama"></canvas>
                                    <hr>
                                    <code> Región de Atacama (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="ATACM" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN ANTOFAGASTA=========================================-->
                        <div class="tab-pane fade" id="r4" role="tabpanel" aria-labelledby="r4">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="antofagasta"></canvas>
                                    <hr>
                                    <code> Región de Antofagasta (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="ANTF" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN COQUIMBO=========================================-->
                        <div class="tab-pane fade" id="r5" role="tabpanel" aria-labelledby="r5">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="coquimbo"></canvas>
                                    <hr>
                                    <code> Región de Coquimbo (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="CQUIM" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>

                        <!-- ==================================== REGIÓN VALPARAISO=========================================-->
                        <div class="tab-pane fade" id="r6" role="tabpanel" aria-labelledby="r6">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="valparaiso"></canvas>
                                    <hr>
                                    <code> Región de Valparaiso (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="Valpa" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN METROPOLITANA=========================================-->
                        <div class="tab-pane fade" id="r7" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="metropolitana"></canvas>
                                    <hr>
                                    <code> Región de Metropolitana (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="METROP" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN O'HIGGINS=========================================-->
                        <div class="tab-pane fade" id="r8" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="ohiggins"></canvas>
                                    <hr>
                                    <code> Región de O'higgins (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="OHIGG" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN MAULE=========================================-->
                        <div class="tab-pane fade" id="r9" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="maule"></canvas>
                                    <hr>
                                    <code> Región de Maule (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="MAUL" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN ÑUBLE=========================================-->
                        <div class="tab-pane fade" id="r10" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="ñuble"></canvas>
                                    <hr>
                                    <code> Región de Ñuble (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="ÑUBL" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN BÍO BÍO=========================================-->
                        <div class="tab-pane fade" id="r11" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="biobio"></canvas>
                                    <hr>
                                    <code> Región de BÍO BÍO (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="BIOB" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN ARAUCANÍA=========================================-->
                        <div class="tab-pane fade" id="r12" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="araucania"></canvas>
                                    <hr>
                                    <code> Región de la Araucanía (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="ARAUC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN LOS RIOS=========================================-->
                        <div class="tab-pane fade" id="r13" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="losrios"></canvas>
                                    <hr>
                                    <code> Región de los Ríos (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="RI" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN LOS LAGOS=========================================-->
                        <div class="tab-pane fade" id="r14" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="loslagos"></canvas>
                                    <hr>
                                    <code> Región de los Lagos (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="LAG" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN DE AYSÉN=========================================-->
                        <div class="tab-pane fade" id="r15" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="aysen"></canvas>
                                    <hr>
                                    <code> Región de Aysén (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="AY" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>
                        <!-- ==================================== REGIÓN MAGALLANES=========================================-->
                        <div class="tab-pane fade" id="r16" role="tabpanel">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <canvas id="magallanes"></canvas>
                                    <hr>
                                    <code> Región de Magallanes y de la Antártica Chilena (Casos por cada 100.000 habitantes)</code>
                                    <!-- <span class="btn btn-sm btn-success float-right" id="MAG" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4 col-sm-12">
                    <div class="card shadow-sm">
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

                    <div class="row justify-content-center text-center pt-3 pb-2">

                        <div class="col-lg-12 mx-auto">
                            <div class="rounded-lg shadow-sm p-3 border-0" style="background: transparent;">

                                <!-- <div class="row pl-5 pr-5 pb-4">

                                    <select class="form-control" id="navigation">
                                        <option value="r1">Home</option>
                                        <option value="r2">Profile</option>
                                        <option value="r3"> asasa</option>
                                        <option data-target="#messages">Settings</option>
                                    </select>
                                </div> -->

                                <div class="row justify-content-center">

                                    <div class="col-xl-9 col-md-6 pb-4">
                                        <!-- <label style="font-weight: 700;font-size:18px"> Zona Norte</label> -->

                                        <div class="nav flex-column nav-pills" id="v-pills-tab1" role="tablist" aria-orientation="vertical">
                                            <a data-toggle="pill" id="r1" href="#r1" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-primary" style="width:100%">Región Arica y Parinacota</span> </a>
                                            <a data-toggle="pill" id="r2" href="#r2" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-primary" style="width:100%">Región de Tarapacá</span> </a>
                                            <a data-toggle="pill" id="r3" href="#r3" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-primary" style="width:100%">Región de Atacama</span> </a>
                                            <a data-toggle="pill" id="r4" href="#r4" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-primary" style="width:100%">Región de Antofagasta</span> </a>
                                            <a data-toggle="pill" id="r5" href="#r5" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-primary" style="width:100%">Región de Coquimbo</span> </a>
                                        </div>


                                    </div>

                                    <div class="col-xl-9 col-md-6 pb-4">
                                        <!-- <label style="font-weight: 700;font-size:18px"> Zona Centro</label> -->
                                        <div class="nav flex-column nav-pills" id="v-pills-tab2" role="tablist" aria-orientation="vertical">

                                            <a id="r6" data-toggle="pill" href="#r6" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-light" style="width:100%;color:#6a97bd">Región de Valparaiso</span> </a>
                                            <a id="r7" data-toggle="pill" href="#r7" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-light" style="width:100%;color:#6a97bd">Región de Metropolitana</span> </a>
                                            <a id="r8" data-toggle="pill" href="#r8" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-light" style="width:100%;color:#6a97bd">Región de O'higgins</span> </a>
                                            <a id="r9" data-toggle="pill" href="#r9" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-light" style="width:100%;color:#6a97bd">Región de Maule</span> </a>
                                            <a id="r10" data-toggle="pill" href="#r10" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-light" style="width:100%;color:#6a97bd">Región de Ñuble</span> </a>
                                            <a id="r11" data-toggle="pill" href="#r11" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-light" style="width:100%;color:#6a97bd">Región de Bío Bío</span> </a>

                                        </div>
                                    </div>

                                    <div class="col-xl-9 col-md-6 pb-4">
                                        <!-- <label style="font-weight: 700;font-size:18px"> Zona Sur</label> -->
                                        <div class="nav flex-column nav-pills" id="v-pills-tab3" role="tablist" aria-orientation="vertical">

                                            <a id="r12" data-toggle="pill" href="#r12" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-danger" style="width:100%;">Región de la Araucanía</span> </a>
                                            <a id="r13" data-toggle="pill" href="#r13" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-danger" style="width:100%;">Región de los Ríos</span> </a>
                                            <a id="r14" data-toggle="pill" href="#r14" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-danger" style="width:100%;">Región de los Lagos</span> </a>
                                            <a id="r15" data-toggle="pill" href="#r15" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-danger" style="width:100%;">Región de Aysén</span> </a>
                                            <a id="r16" data-toggle="pill" href="#r16" role="tab" aria-controls="v-pills-home" aria-selected="true"> <span class="badge bg-danger" style="width:100%;">Región de Magallanes y de la Antártica Chilena</span> </a>

                                        </div>
                                    </div>

                                </div>


                                <!-- End -->
                            </div>


                        </div>


                    </div>

                </div>
            </div>


<!-- 
            <div class="row justify-content-between pb-2">

                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm btn-block rounded-pill" onclick="window.open('../PRUEBAS/radio.php','newWin','width=400, height=700')"> Abrir radio </a>.
                </div>

                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm btn-block rounded-pill" onclick="window.open('../PRUEBAS/tv.php','newWin','width=550, height=675')"> Tv </a>.
                </div>

                <div class="col-sm-6"></div>
            </div> -->


        </div>

        <div class="container-fluid" id="seccioncomunal" hidden>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row justify-content-center pb-4 pt-2">
                                <div class="col-xl-6 col-sm-12 row">
                                    <label for="buscarpor" class="form-control border-0 col-sm-4" style="color:black;font-weight:800">Buscar por:</label>
                                    <select class="form-control col-sm-8" id="buscarpor">
                                        <option value="1">Casos activos</option>
                                        <option value="2">Casos acumulados</option>
                                        <option value="3">Casos recuperados</option>
                                        <option value="4">Fallecidos</option>
                                    </select>
                                </div>
                            </div>

                            <canvas id="graficocovidcomunal"></canvas>
                            <hr>
                            <code class="text-center"> Comuna de los Álamos(Casos por cada 100.000 habitantes)</code>
                            <span class="btn btn-sm btn-success float-right" id="casoscomunal" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#covid19").attr('class', 'nav-item active');
        </script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>



        <script src="../../jsdashboard/jquery.min.js"></script>
        <script src="../js/moment.min.js"></script>
        <script src="../js/Grafico.min.js"></script>
        <script src="../js/TraducirMeses.js"></script>
        <script src="js/covidregiones.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.1/xlsx.full.min.js"></script>
        <script src="js/covidcomunal.js"></script>


        <script>
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
            covidComunaLosAlamos(1);
        </script>

        <script>
            $("input[name=secciones]").on('change', function() {

                let opcion = $(this).val();

                if (opcion == 1) {
                    $('#seccioncomunal').attr('hidden', '');
                    $('#seccionNacional').removeAttr('hidden');
                } else if (opcion == 2) {
                    $('#seccionNacional').attr('hidden', '');
                    $('#seccioncomunal').removeAttr('hidden');
                }
            });

            $('#buscarpor').change(function() {
                let opcion = $(this).find("option:selected").attr('value');
                covidComunaLosAlamos(opcion);
                // console.log("OPCIÓN: " + opcion);
            });
        </script>

        <script>
            $("#navigation").change(function() {
                // window.location.href = $(this).val();
                let vlaor = $(this).val();
                $('.nav-tabs a[href="#' + tab + '"]').click('show');
            });
        </script>
        <script>
            var html1 = `
                <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h4 id="alertaswal1" class="pt-2" style="font-size: 1.1em;font-weight: 500;text-align: center;text-transform: none;word-wrap: break-word;">Cargando...</h4>
                    <iframe id="frame1" class="blur" frameborder="0" marginheight="0" marginwidth="0" scrolling="si" style="max-width:100%;" src="https://e.infogram.com/86924dc1-f6c3-4951-905f-ca055c5397a0?parent_url=https%3A%2F%2Fwww.gob.cl%2Fcoronavirus%2Fcifrasoficiales%2F&src=embed#async_embed" height="700" width="1140">Cargando</iframe>
                </div>
                </div>`;

            var html2 = `
                <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h4 id="alertaswal2" class="pt-2" style="font-size: 1.1em;font-weight: 500;text-align: center;text-transform: none;word-wrap: break-word;">Cargando...</h4>
                    <iframe id="frame2" class="blur" frameborder="0" marginheight="0" marginwidth="0" scrolling="si" style="max-width:100%;" src="https://infogram.com/dosis-de-refuerzo-20-al-24-de-septiembre-1h7z2l8xnwglg6o" height="700" width="1140">Cargando</iframe>
                </div>
                </div>`;

            function cifrasoficiales() {
                Swal.fire({
                    title: "Cifras Oficiales <br> <small style='font-size:15px'>(Fuente: Base de datos Ministerio de Ciencia)</small>",
                    html: html1,
                    focusConfirm: false,
                    showCancelButton: true,
                    showConfirmButton: false,
                    // confirmButtonText: 'Guardar',
                    cancelButtonText: '<div class="container-fluid"><div class="row justify-content-center" style="width:270px;">Cerrar ventana</div></div>',
                    // confirmButtonColor: "#e74a3b",
                    cancelButtonColor: "#757575",
                    width: '1200px'
                });

                var frame1 = document.getElementById("frame1");
                frame1.onload = function() {
                    $('#alertaswal1').fadeOut();
                    frame1.className = "noblur";
                    $('#frame1').css('height', '780px');
                }
            }

            function calendariovacunacion() {
                Swal.fire({
                    title: "Calendario Vacunación",
                    html: html2,
                    focusConfirm: false,
                    showCancelButton: true,
                    showConfirmButton: false,
                    // confirmButtonText: 'Guardar',
                    cancelButtonText: '<div class="container-fluid"><div class="row justify-content-center" style="width:270px;">Cerrar ventana</div></div>',
                    // confirmButtonColor: "#e74a3b",
                    cancelButtonColor: "#757575",
                    width: '1200px'
                });

                var frame2 = document.getElementById("frame2");
                frame2.onload = function() {
                    $('#alertaswal2').fadeOut();
                    frame2.className = "noblur";
                    $('#frame2').css('height', '780px');
                }
            }
        </script>

</body>

</html>