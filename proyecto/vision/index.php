<?php 
session_start();
include '../partes/head.php';
?>
<style>
    .tarjeta:hover {
        background-color: #097abb !important;
    }

    @media screen and (max-width: 415px) {

        /*Para el boton escuchar*/
        .btn-primary {
            width: 80px !important;
            font-size: 0.7em !important;
            padding-top: 10px;
        }
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0551a2;
        border-color: #0551a2;
    }

    .btn-light:hover {
        color: #fff;
        background-color: #e6e9ec;
        border-color: #e6e9ec;
    }
</style>
<title>Salud los Álamos - Visión</title>

<meta property="og:image" content="<?php echo "'../../importantes/compromiso.jpg' alt='' class='img-fluid'>" ?>" />
<meta property="og:title" content="Visión" />
<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
<script src="js/vision.js"></script>
</head>

<body>
    <?php include '../partes/consultasSQL.php'; ?>
    <?php include '../partes/navbar.php'; ?>

    <div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-bookmark etiqueta"></i>Visión <small class="hidden-xs-down hidden-sm-down"></small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="../mision">Misión</a></li>
                        <li class="breadcrumb-item" style="color:#0091e5;">Visión</li>
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

                                    <h4>Visión</h4>
                                    <p>En un plazo de cuatro años seremos un centro de salud familiar de experiencia, reconocidos y validados por la comunidad, con pertinencia cultural, con un equipo de salud capacitado y comprometido con las familias de la comuna, mejorando su calidad de vida a través de todo el ciclo vital.</p>

                                    <small>Visión</small>
                                    <small>CESFAM</small>
                                    <small>Visión</small>

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

                <?php include '../partes/banners-derecha.php' ?>

            </div>
        </div><!-- end container -->
    </section>

    <?php include '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        // $("#vision").attr('class', 'nav-item active');
        $('#bannervideotendencias').hide();
        $('#bannerlomasvisto').hide();
        $('#redessociales').hide();
    </script>
    <!-- Core JavaScript
    ================================================== -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/calendario.js"></script>

    <script>
        var fbButton = document.getElementById('boton-compartir-en-facebook');
        var url = window.location.href; //OJO! EL LOCALHOST NO LO TOMA COMO PARA COMPARTIR PERO SI EL 
        fbButton.addEventListener('click', function() {
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
                'facebook-share-dialog',
                'width=800,height=600'
            );
            return false;
        });

        var twButton = document.getElementById('boton-compartir-en-twitter');
        var url = window.location.href;
        twButton.addEventListener('click', function() {
            window.open('https://twitter.com/share?url=' + url,
                'twitter-share-dialog',
                'width=800,height=600'
            );
            return false;
        });
    </script>
</body>

</html>