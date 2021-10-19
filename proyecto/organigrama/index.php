<?php session_start(); //Inicio las sesiones para que se muestren los item de los navbar que usan session
include '../partes/head.php';
?>
<title>Salud los Álamos - Organigrama</title>
</head>

<body>
    <?php
    include '../partes/navbar.php';
    include '../partes/consultasSQL.php';
    include '../partes/encriptacion.php';
    ?>

<div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-bookmark etiqueta"></i>Organigrama <small class="hidden-xs-down hidden-sm-down"></small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="../mision">Misión</a></li>
                        <li class="breadcrumb-item"><a href="../vision">Visión</a></li>
                        <li class="breadcrumb-item" style="color:#0091e5;">Organigrama</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">
                            <div class="blog-box pt-2">
                                <div class="post-media">
                                   <!-- <img src="importantes/organigrama-imagen.png" alt="" class="img-fluid" style="height:410px;">-->
                                </div>
                                <!-- end media -->
                                <div class="blog-meta big-meta text-center">
<!-- 
                                    <h4>Organigrama</h4>
                                    <p>CESFAM - Los Álamos</p> -->

                                    <embed src="../../importantes/ORGANIGRAMA CESFAM.pdf#toolbar=0" type="application/pdf" width="100%" height="595px" />

                                    <small>Organigrama</small>
                                    <small>CESFAM</small>
                                    <small>Organigrama</small>

                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div><!-- end blog-custom-build -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis">
                </div><!-- end col -->

                <?php include '../partes/banners-derecha.php' ?>

            </div>
        </div><!-- end container -->
    </section>

    <?php include '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <script>
        $('#bannervideotendencias').hide();
        $('#bannerlomasvisto').hide();
    </script>
    
    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendario.js"></script>
</body>

</html>