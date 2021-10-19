<?php session_start(); ?>
<?php include '../partes/head.php';
include '../partes/encriptacion.php'; ?>

<link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

<title>Salud los Álamos - Plan Auge</title>

<style>
    /*DIFUMINAR LA CARGA DEL DEL FRAME DEL MAPA DE SECTORIZACIÓN*/
    .blur {
        filter: blur(10px);
        transition: all 1s;
    }

    .noblur {
        transition: all 3s;
    }


    /* Tamaños del navbar para celulares adaptable */
    @media (max-width: 320px) {
        .navbar{
            width: 320px;
        }
    }

    @media (min-width: 321px) and (max-width: 360px) {
        .navbar{
            width: 360px;
        }
    }
    @media (min-width: 361px) and (max-width: 375px) {
        .navbar{
            width: 375px;
        }
    }
    @media (min-width: 376px) and (max-width: 411px) {
        .navbar{
            width: 411px;
        }
    }
    @media (min-width: 412px) and (max-width: 414px) {
        .navbar{
            width: 414px;
        }
    }
</style>

</head>


<!--
.profile-page .page-header // 700px; contiene el ancho o altura del fondo
.main-raised // contiene el ancho o altura de la tarjeta
 -->


<body class="profile-page sidebar-collapse">

    <?php include '../partes/navbar.php'; ?> 

<!-- </div> -->

    <div class="page-header header-filter" style="background-image: url('assets/archivos/fondosegundo.jpg');"></div>

    <div class="container">

        <div class="main main-raised mb-4">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="assets/archivos/ministeriosaludcircular.png" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="row justify-content-end pr-4">
                    <span class="badge badge-pill badge-info">Calificacion</span>
                </div> -->

                <div class="row justify-content-center">

                    <!-- Post Content Column -->
                    <div class="col-xl-10">

                        <!-- Title -->
                        <h1>¿Deseas saber que enfermedades cubre el AUGE?</h1>

                        <!-- Preview Image -->
                        <img class="img-fluid pt-4 pb-4 pl-1" src="assets/archivos/auge.jpg" alt="">


                        <!-- ======= Sección AUGE ======= -->
                        <section>
                            <div class="container">
                                <div class="section-title">
                                    <!-- <h2>¿Deseas saber que enfermedades cubre el AUGE?</h2> -->
                                    <p class="pt-2">Plan de Acceso Universal a Garantías Explícitas: AUGE
                                        El AUGE, es un Plan de Acceso Universal a Garantías Explícitas, que actualmente asegura la cobertura de 80 enfermedades
                                        (Garantías Explícitas en Salud, GES) por parte del Fondo Nacional de Salud (FONASA) y las Instituciones de Salud Previsional (ISAPRE).</p>

                                    <h4 class="title text-center"><a href="javascript:void(0)" onclick="modalAuge(1);">Saber más <i class="far fa-hand-point-left"></i>  </a></h4> <!--<i class="fas fa-hand-point-up"></i> -->
                                </div>
                            </div>
                        </section><!-- End Sección AUGE -->

                        <hr class="pb-5">


                    </div>

                </div>


                <!-- <div class="row justify-content-center pb-3 pt-2">
                    <div class="col-md-3">
                        <label class="btn btn-outline-primary" style="color:#007bff;border-color: #007bff;"><i class="fab fa-facebook-f"></i> Compartir Facebook</label>
                    </div>
                    <div class="col-md-3">
                        <label class="btn btn-outline-info"><i class="fab fa-twitter"></i> Compartir Twitter<div class="ripple-container"></div></label>
                    </div>
                </div> -->


            </div>
        </div>
    </div>


    <a href="javascript:void(0)" class="back-to-top"><i class="icofont-simple-up" style="background: #1eceab;"></i></a>


    <!--   Core JS Files   -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="../js/tether.min.js"></script>
    <!-- <script src="assets/js/bootstrap-material-design.min.js" type="text/javascript"></script> -->
    <script src="assets/js/modalAuge.js"></script>



    <script>
        // $(".navbar").css({"width": "320px"});
    </script>

    <!-- Core JavaScript
    ================================================== -->
    <!-- <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script> -->

</body>

</html>