<?php
session_start();
$rut = $_SESSION['sesionCESFAM']['rut'];
$imagenusuario = $_SESSION['sesionCESFAM']['imagenusuario'];
$nombre = $_SESSION['sesionCESFAM']['nombre_usuario'];
if (!isset($nombre)) { //Si no esta iniciado 
    header("Location:../inicio/");
}
include '../dashboard/head.php'; ?>
<title>Salud los Álamos - Inicio Intranet</title>
<link rel="stylesheet" href="estilo.css">
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

                <?php
                $porciones = explode(" ", $nombre);
                ?>

                <section id="hero">
                    <div class="container-fluid">
                        <div class="row justify-content-end">
                            <div class="col-lg-7 pt-lg-0 d-flex">
                                <div class="text-right pb-3">
                                    <h1 class="text-right" style="font-family: 'Open Sans', sans-serif !important;">BIENVENIDO(A) ESTIMADO(A) <span><?php echo strtoupper($porciones[0]); ?></span></h1>
                                    <h2 class="text-right" style="font-family: 'Open Sans', sans-serif !important;">¡Que tengas una buen periodo laboral!</h2>

                                    <div class="row col-sm-11 justify-content-end divider-custom divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon">
                                            <i class="fas fa-hospital" style="font-size: 30px;"></i>
                                        </div>
                                        <div class="divider-custom-line"></div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
                        <defs>
                            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                            </path>
                        </defs>
                        <g class="wave1">
                            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                            </use>
                        </g>
                        <g class="wave2">
                            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                            </use>
                        </g>
                        <g class="wave3">
                            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                            </use>
                        </g>
                    </svg>

                </section>

                <style>
                    figure.profile-picture {
                        background-position: center center;
                        background-size: cover;
                        border: 5px #efefef solid;
                        border-radius: 50%;
                        /* align-items: center; */
                        bottom: 50px;
                        box-shadow: inset 1px 1px 3px rgb(133 135 150), 1px 1px 4px rgb(133 135 150);
                        height: 240px;
                        /* left: 150px; */
                        position: relative;
                        width: 240px;
                        /* z-index: 3; */
                    }
                </style>


                <div class="container-fluid">

                    <!-- <div class="row justify-content-center" id="fotopf">
                        <div class="col-xl-2 col-sm-12 pt-2">
                            <figure class="profile-picture animated" style="background-image: url('<?php //echo '../perfil/fotodeperfiles/' . $rut . '/' . $imagenusuario; 
                                                                                                    ?>')"></figure>
                        </div>
                    </div> -->

                    <div class="row justify-content-center" style="padding-top: 40px;">
                        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">

                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-5">
                                    <i class="fas fa-hospital-symbol fa-2x mb-3 text-primary"></i>
                                    <h5>5 POSTAS</h5>
                                    <p class="small text-muted font-italic">
                                        Posta Antihuala <br>
                                        Posta Tres Pinos <br>
                                        Posta Cerro Alto <br>
                                        Posta Pangue <br>
                                        Posta Ranquilco.
                                    </p>
                                    <div class="progress rounded-pill">
                                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar rounded-pill">CESFAM</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">

                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-5"><i class="fas fa-hospital-symbol fa-2x mb-3 text-success"></i>
                                    <h5>1 SAR</h5>
                                    <p class="small text-muted font-italic">
                                        Servicio de Alta Resolución(SAR), Infraestructura de 534 metros cuadrados, cuya inversión superó los 1.100 millones de pesos.
                                    </p>
                                    <div class="progress rounded-pill">
                                        <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;" class="progress-bar bg-success rounded-pill">CESFAM</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">

                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-5"><i class="fas fa-hospital-symbol fa-2x mb-3 text-info"></i>
                                    <h5> 5 SECTORES</h5>
                                    <p class="small text-muted font-italic">
                                        <strong>Sector Amarillo:</strong> Población asignada de 4.961 personas. <br>
                                        <strong>Sector Verde:</strong> Población asignada a este sector asciende a 5.165 personas. <br>
                                        <strong>Sector Rojo:</strong> Población asignada de 5.961 personas. <br>
                                        <strong>Sector Azul:</strong> Población asignada de 4.418 personas. <br>
                                        <strong>Sector Naranjo:</strong> corresponde a Unidades Transversales.
                                    </p>
                                    <div class="progress rounded-pill">
                                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar bg-info rounded-pill">CESFAM</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-5"><i class="fas fa-hospital-symbol fa-2x mb-3 text-warning"></i>
                                    <h5>1 CECOSF</h5>
                                    <p class="small text-muted font-italic">
                                        Centro Comunitario Salud Familiar (CECOSF): ubicado contiguo a la posta de Cerro Alto.
                                    </p>
                                    <div class="progress rounded-pill">
                                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar bg-warning rounded-pill">CESFAM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">

                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-5"><i class="fas fa-hospital-symbol fa-2x mb-3 text-info"></i>
                                    <h5>1 Estación Médico Rural</h5>
                                    <p class="small text-muted font-italic">
                                        Ubicada en la Localidad de Sara de Lebu que dista aproximadamente 12 Km. de nuestro CESFAM.
                                    </p>
                                    <div class="progress rounded-pill">
                                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar bg-info rounded-pill">CESFAM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-sm-12 justify-content-center divider-custom divider-custom" style="padding-top: 80px;" id="animacioniconofooter">
                        <div class="divider-custom-line" style="max-width: 35% !important; background-color: #85869080 !important;"></div>
                        <div class="divider-custom-icon animated" style="color: #85869080 !important;">
                            <i class="fas fa-hospital" style="font-size: 30px;"></i>
                        </div>
                        <div class="divider-custom-line" style="max-width: 35% !important; background-color: #85869080 !important;"></div>
                    </div>



                    <!--ESTA ES LA LISTA ORIGINAL DEL MENU NAVEGABLE -->



                    <!-- <div class="row">
                        <div class="col-xl-4">
                            <div class="card shadow-sm p-3 card-1">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column"> <span class="font-weight-bold">Group Info</span> <small>14 students in the group</small> </div> <i class="fa fa-bell-o"></i>
                                </div>
                                <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-4">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold">Group Homework</span> <small>14 students from your group are online</small> </div> <i class="fa fa-angle-right text-white"></i>
                                    </div>
                                </div>
                                <div class="info d-flex justify-content-between mt-3">
                                    <div class="group d-flex flex-column"> <span class="font-weight-bold">Today's Lession</span> <small>Unit-6 Articles</small> </div> <small>12:00 PM</small>
                                </div>
                            </div>
                        </div>
                    </div> -->

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

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->


    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <!-- <script src="../../jsdashboard/jquery.min.js"></script> -->

    <script>
        $("#indice").attr('class', 'nav-item active');
    </script>

    <script>
        $('#navTopbar').removeClass('mb-4');
    </script>



</body>

</html>