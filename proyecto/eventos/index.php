<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 2 || $rol == 3 || $rol == 7 || $rol == 8 || $rol == 11 || $rol == 16 || $rol == 17)) {
    //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR, SUPERADMIN. Jefe Sector, Jefe Unidad, Director, Enc. Área Comités Técnicos, Jefe de Programa
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$fechaminima = $anoactual . "-01" . "-01";
$fechamaxima = $anoactual . "-12" . "-31";
?>

<?php include '../conexion/conexion.php'; ?>
<?php include '../dashboard/head.php'; ?>

<script src='../js/moment.min.js'></script>
<!-- <script src='../js/jquery.min.js'></script> -->
<script src='../js/fullcalendar.min.js'></script>
<script src='../js/es.js'></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .fc-event,
    /*Establezco el color del texto con o sin hover como blanco por defecto*/
    .fc-event:hover {
        color: white !important;
        text-decoration: none;
    }

    /* .fc-sat, .fc-sun {
    background-color: red !important;
    pointer-events: none !important;
} */
</style>
<title>Salud los Álamos - Gestión de Calendario</title>
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
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Gestión de Calendario</h1>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-sm-12">
                            <div class="alert alert-primary" role="alert">
                                <!-- <div class="row justify-content-between"> -->
                                <div class="row justify-content-center">
                                    <strong><i class="fas fa-info-circle pb-2"></i> A considerar</strong>
                                    <p class="pr-4"></p>
                                </div>
                                <!-- </div> -->
                                <ul>
                                    <li>En el calendario aparece un dia marcado <span style="background-color: #efead5;color: #efead5;"><i class="fas fa-square-full" style="width:25px;"></i></span> , que corresponde al dia actual.</li>
                                    <li>Al hacer click <i class="fas fa-mouse-pointer"></i> en un dia dentro del calendario se abrirá una ventana <i class="fas fa-pager"></i> , donde podrás registrar un evento y el funcionario lo podrá visualizar en su cuenta personal.</li>
                                    <li>Al hacer click en un dia previamente registrado <span class="badge badge-primary"> <strong>10:00</strong> "Titulo de ejemplo"</span> en el calendario <i class="fas fa-hand-point-up"></i> , se abrirá una ventana <i class="fas fa-pager"></i> donde podrás editar o eliminar el evento.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-sm-12">
                            <div class="card shadow border-bottom-primary mb-4">
                                <!-- Card Header - Dropdown -->

                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h5 class="m-0 font-weight-bold text-<?php //echo $temadelacookie; 
                                                                            ?>">Calendario</h5>
                                </div> -->

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id='calendariop'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FIN DEL ROW -->
                </div>

            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include '../partes/modal/modal_eventos.php'; ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#eventos").attr('class', 'nav-item active');
    </script>



    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <?php
    // if ($rol == 2) {
    // echo '<script>$("#eventos").attr("class", "nav-item active"); </script>';
    // } else if ($rol == 3) {
    //     //echo '<script>$("#SuperADMIN").attr("class", "nav-item active"); </script>';
    // }
    ?>


    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../assets/popper/popper.min.js"></script>
    <!-- <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/eventos.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <!-- <script>
        $("#alertsDropdown").hide();
        $("#userDropdown").hide();
    </script> -->


</body>

</html>