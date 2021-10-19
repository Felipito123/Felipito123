<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (!isset($_SESSION['sesionCESFAM']) && !isset($rol)) { //VALIDA QUE LA SESIÓN ESTE INICIADA Y HALLA UN ROL, ESTA PANTALLA LA VEN TODOS LOS FUNCIONARIOS
    header("Location:../indice/");
}
?>
<?php include '../dashboard/head.php'; ?>
<?php //include 'conexion/conexion.php'; 
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
        width: 10px;
        background-color: #F5F5F5;
    }

    #scrolear::-webkit-scrollbar-thumb {
        background-color: #4e73df;
        border-radius: 10px;
    }

    .ml2 {
        font-weight: 900;
        font-size: 1.9em;
    }

    .ml2 .letter {
        display: inline-block;
        line-height: 1em;
    }

    .border-top-info {
        border-top: .25rem solid #36b9cc !important;
    }
</style>

<link rel="stylesheet" href="comentarios/css/estilo.css">

<!-- <link rel="stylesheet" href="assets/owl.carousel.min.css"> -->
<title>Salud los Álamos - Calidad</title>
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
                                    <span><i class="fas fa-map-pin" style="color: #36b9cc;font-size: 22px;margin-right: 6px;"></i> Documentos en mi cuenta</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="round" data-value="0.65" data-size="200" data-thickness="6">
                                    <strong id="total_calidad">+ 0</strong>
                                    <span><i class="fas fa-map-pin" style="color: #36b9cc;font-size: 22px;margin-right: 6px;"></i> Documentos en calidad</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="round" data-value="0.95" data-size="200" data-thickness="6">
                                    <strong id="total_sl_permisos">+ 0</strong>
                                    <span><i class="fas fa-map-pin" style="color: #36b9cc;font-size: 22px;margin-right: 6px;"></i> Solicitudes registradas</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="round" data-value="0.95" data-size="200" data-thickness="6">
                                    <strong id="total_videoconf">+ 0</strong>
                                    <span><i class="fas fa-map-pin" style="color: #36b9cc;font-size: 22px;margin-right: 6px;"></i> Videoconferencias registradas</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end py-2">
                        <div class="col-xl-5 col-sm-12">
                            <div class="alert alert-secondary" role="alert">
                                <i class="fas fa-info-circle"></i> <strong>A considerar</strong> <br>
                                <ul>
                                    <li>Haz click en el botón <span class="badge badge-info" style="padding: 5px;width:58px;"><i class="fa fa-files-o"></i></span> de la tabla y podrás visualizar el documento.</li>
                                </ul>
                            </div>

                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-sm-12">
                            <div class="card shadow-sm border-top-info">
                                <!--style="background-image: url(img/fondo.jpg);" -->
                                <img src="img/miperfil.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title ml2">DOCUMENTOS PROGRAMA DE CALIDAD</h5>
                                    <p class="card-text" style="font-weight:400">
                                        Documentos del programa de Calidad basados en la evaluación y mejora continua de los procesos clínicos que lleven a la obtención de una <em class="text-info">atención de calidad</em> segura, efectiva y digna a todos los pacientes de nuestra comunidad.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart -->
                        <div class="col-xl-7 col-sm-12">
                            <div class="card shadow-sm mb-4">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h6 class="m-0 font-weight-bold text-secondary">DOCUMENTOS RECIBIDOS DESDE EL ÁREA DE CALIDAD</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tabla-calidad-usuario" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <th>ID CALIDAD</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>ARCHIVO</th>
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

    <?php include '../partes/modal/modal_mostrar_archivo_calidad.php'; ?>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#micuenta").attr('class', 'nav-item active');
    </script>



    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="js/calidad_usuario.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js'></script>
    <script>
        function Circlle(el) {
            $(el).circleProgress({
                fill: {
                    color: '#36b9cc'
                }
                // })
                /* .on('circle-animation-progress', function(event, progress, stepValue) {
                    $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2) + '%');*/
            });
        };
        Circlle('.round');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <script>
        // Wrap every letter in a span
        var textWrapper = document.querySelector('.ml2');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({
                loop: true
            })
            .add({
                targets: '.ml2 .letter',
                scale: [4, 1],
                opacity: [0, 1],
                translateZ: 0,
                easing: "easeOutExpo",
                duration: 950,
                delay: (el, i) => 70 * i
            }).add({
                targets: '.ml2',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 3500
            });
    </script>

    <!-- <script src="owl.carousel.min.js"></script> -->


</body>

</html>