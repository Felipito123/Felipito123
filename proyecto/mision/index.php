<?php
session_start();
include '../partes/head.php'; ?>
<style>
    .tarjeta:hover {
        background-color: #097abb !important;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0551a2;
        border-color: #0551a2;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #c30505;
        border-color: #c30505;
    }

    .btn-secondary:hover {
        color: #fff;
        background-color: #44494e;
        border-color: #44494e;
    }

    .btn-light:hover {
        color: #fff;
        background-color: #e6e9ec;
        border-color: #e6e9ec;
    }

    @media screen and (max-width: 415px) {

        /*Para el boton escuchar*/
        .btn-primary {
            width: 80px !important;
            font-size: 0.7em !important;
            padding-top: 10px;
        }
    }
</style>
<title>Salud los Álamos - Misión</title>
<?php //$h="imagenes/".$resultado1["id_articulo"]. "/" .$resultado1["nombre_imagen"]; echo '<script>console.log("IMG MISION'.$h.'");</script>';
?>
<meta property="og:image" content="<?php echo "'../../importantes/compromiso.jpg' alt='' class='img-fluid'>" ?>" /> <!-- el meta properiti og:image le setea la imagen al dialogo del compartir en facebook-->
<meta property="og:title" content="Misión" />
<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
<script src="js/mision.js"></script>
</head>

<body>

    <?php include '../partes/navbar.php'; ?>

    <div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-bookmark etiqueta"></i>Misión <small class="hidden-xs-down hidden-sm-down"></small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../inicio">Inicio</a></li>
                        <li class="breadcrumb-item" style="color:#0091e5;">Misión</li>
                        <li class="breadcrumb-item"><a href="../vision">Visión</a></li>
                        <li class="breadcrumb-item"><a href="../organigrama">Organigrama</a></li>
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

                            <div class="blog-box">

                                <div class="post-media">
                                    <img src="../../importantes/compromiso.jpg" alt="" class="img-fluid" style="height:529px">
                                </div>
                                <!-- end media -->

                                <div class="blog-meta big-meta text-center">

                                    <label class="btn btn-primary btn-sm" style="float:left;font-size:15px;" onclick="toogle()" id="colordellabel"> <i class="fa fa-volume-up" aria-hidden="true" id="contraseñaimagen" style="color:white;"></i> Escuchar</label>

                                    <h4>Misión</h4>

                                    <p>Somos un centro de atención primaria de salud, de excelencia, que a través de un equipo humano comprometido presta servicios de salud con enfoque bio-psicosocial a la comunidad, con pertinencia cultural, en los ámbitos de promoción, prevención, tratamiento y rehabilitación.</p>
                                    <!--el nl2br muestra los espacios del parrafo -->
                                    <small>Misión</small>
                                    <small>CESFAM</small>
                                    <small>Misión</small>

                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a onclick="compartirfb()" class="btn btn-light"><i class="fa fa-facebook-square" style="color: #308ff0;"></i> <span class="down-mobile" style="color: #308ff0;">Compartir en Facebook</span></a></li>
                                            <li><a onclick="compartirtw()" class="btn btn-light"><i class="fa fa-twitter" style="color: rgb(31 165 247);"></i> <span class="down-mobile" style="color: rgb(31 165 247);">Compartir en Twitter</span></a></li>
                                        </ul>
                                    </div><!-- end post-sharing -->

                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div><!-- end blog-custom-build -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis">

                </div><!-- end col -->

                <?php include '../partes/banners-derecha.php'; ?>

            </div>
        </div><!-- end container -->
    </section>

    <?php require '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        // $("#mision").attr('class', 'nav-item active'); NO LO ACTIVO PORQUE ESTA EN UN DROPDOWN 
        $('#bannervideotendencias').hide();
        $('#bannerlomasvisto').hide();
        $('#redessociales').hide();
    </script>

    <!-- Core JavaScript
    ================================================== -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

</html>