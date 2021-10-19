<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - PLAN CONTRA EL CÁNCER</title>


<style>
    a:hover {
        text-decoration: none;
        opacity: 0.7;
    }

    .hashtag {
        color: white !important;
        font-size: 30px;
        /* width: 400px !important; */
        margin: auto;
        padding: 20px 30px 10px 30px;
        transition: all 0.3s ease-in-out;
        border-radius: 50px;
        background-color: #132256;
    }

    @media screen and (max-width: 500px) {
        .hashtag h2 {
            text-align: center;
            font-size: 7px;
            /* padding: 10px 30px 0px 0px; */
        }
    }

    .footer {
        bottom: 0;
        width: 100%;
        height: 100px;
        line-height: 80px;
        border-bottom: 20px solid #132256;
        background-color: #132256;
    }

    #contenedorgeneral {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 16px;
        background: #b8e8ff;
        background: -moz-linear-gradient(top, #b8e8ff 0%, #ffffff 100%);
        background: -webkit-linear-gradient(top, #b8e8ff 0%, #ffffff 100%);
        background: linear-gradient(to bottom, #b8e8ff 0%, #ffffff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b8e8ff', endColorstr='#ffffff', GradientType=0);
    }

    h1 {
        /*Agrega una barrita roja en el H1*/
        font-size: 1.6em;
        font-weight: 700;
        background: url(img/linea_h1.svg) left bottom no-repeat;
        padding: 0 0 10px;
        margin: 0 0 40px 0;
    }


    /*===============================AQUI EL ESTILO DE LAS TARJETAS==============================*/
    .card {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .image-container {
        position: relative;
    }

    .thumbnail-image {
        border-radius: 10px !important;
        height: 350px;
    }

    .discount {
        background-color: red;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 4px;
        padding-right: 4px;
        font-size: 10px;
        border-radius: 6px;
        color: #fff
    }

    .wishlist {
        height: 25px;
        width: 25px;
        background-color: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .first {
        position: absolute;
        width: 100%;
        padding: 9px
    }

    .voutchers {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        width: 190px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        overflow: hidden
    }

    .voutcher-divider {
        display: flex;
    }

    .voutcher-left {
        width: 70%
    }

    .voutcher-name {
        color: grey;
        font-size: 9px;
        font-weight: 500
    }

    .voutcher-code {
        color: red;
        font-size: 11px;
        font-weight: bold
    }

    .voutcher-right {
        width: 30%;
        background-color: #e91e63;
        color: #fff;
        padding-top: 7px;
    }

    .discount-percent {
        font-size: 12px;
        font-weight: bold;
        position: relative;
        top: 5px
    }

    .off {
        font-size: 14px;
        position: relative;
        bottom: 5px
    }

    .card-title {
        color: #5599b2;
        font-size: 26px;
        line-height: 1.54;
        font-weight: 900;
        margin-bottom: 24px;
    }

    .card-text {
        color: gray;
        font-size: 16px;
        line-height: 1.5;
        font-weight: 400;
        padding-bottom: 40px;
    }
</style>
<!-- 
<link rel="stylesheet" href="css/estilo_minvu.css"> -->

</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" id="contenedorgeneral">

                    <!-- Page Heading -->
                    <!-- <div class="row justify-content-center">
                        <h2 class="h3 mb-0 text-gray-800 pl-5" style="font-family: 'Kaushan Script', cursive;">MODO PRUEBA</h2>
                        <div class="col-lg-1"></div>
                    </div> -->

                    <!----------------- HEADER ----------------->
                    <div class="row header" id="header">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #b8e8ff;">
                                <a class="navbar-brand" href="https://www.gob.cl/" target="_blank"><img src="https://s3.amazonaws.com/gobcl-prod/filer_public/b2/0f/b20f4bc0-e5a4-482f-abc9-fa0313ef886f/logo2.png" width="150" class="d-inline-block align-top img-fluid logo-img" alt="Gobierno de Chile"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -35px;">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" style="z-index: 1;">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#ejes" style="color:#132256;">Ejes de acción</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://www.minsal.cl/wp-content/uploads/2019/01/2019.01.23_PLAN-NACIONAL-DE-CANCER_web.pdf" target="_blank" style="color:#132256;">Descarga el acuerdo</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!----------------- LOGO ----------------->
                    <div class="row">
                        <div class="container">
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3"></div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center">
                                <img class="card-img-top text-center" src="https://s3.amazonaws.com/gobcl-prod/filer_public/51/61/51610720-79c2-4156-a1ae-33590dcba07f/logo-cancer.png" alt="img-hero">
                            </div>
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3"></div>
                        </div>
                    </div>
                    <!----------------- JUMBOTRON ----------------->
                    <div class="jumbotron jumbotron-fluid justify-content-center" style="margin-top: -100px;background-color:#b8e8ff;">
                        <div class="container">
                            <img class="card-img-top text-center" src="https://s3.amazonaws.com/gobcl-prod/filer_public/84/8b/848bc8f9-2e04-424a-aa3c-a8f40beeceb3/img-hero.png" alt="img-hero">
                        </div>
                    </div>
                    <!----------------- VIDEO ----------------->
                    <div class="container">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/GfiWYAyQQ5E" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <br><br>
                    <!----------------- TEXTO ----------------->
                    <div class="row">
                        <div class="container">
                            <div class="col-12 text-center">
                                <p class="intro" style="font-size: 25px; line-height: 40px;">El gobierno del Presidente Sebastián Piñera ha presentado el <strong>Plan Nacional de Cáncer</strong>, cuyo objetivo es disminuir tanto la incidencia como la mortalidad atribuibles a la enfermedad, a través de estrategias y acciones que <strong>faciliten la promoción, prevención, diagnóstico precoz, tratamiento, cuidados paliativos y seguimiento de pacientes, para mejorar su sobrevida, calidad de vida y la de sus familias y comunidades.</strong></p>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <hr style="color: #5599b2; border: 2px solid #5599b2;">
                    </div>
                    <br><br>



                    <div class="row justify-content-center" id="ejes">
                        <div class="col-md-2 pb-2">
                            <div class="mt-3 pb-2">
                                <div class="card voutchers">
                                    <div class="voutcher-divider">
                                        <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                            <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #e91e63;">#JuntosSumamosVida</a></h5>
                                        </div>
                                        <div class="voutcher-right text-center border-left">
                                            <i class="fas fa-handshake" style="font-size: 28px;"></i>
                                            <!-- <h5 class="discount-percent">20%</h5> <span class="off">Off</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span> <span class="wishlist"><i class="fa fa-heart-o"></i></span> </div>
                                    </div> <img src="https://fundecor.es/images/imagenes_cursos/educacion_para_la_salud.jpg" class="img-fluid rounded thumbnail-image">
                                </div>

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        Promoción, educación y prevención
                                    </div>
                                    <div class="card-text">
                                        Crear conciencia respecto a la importancia del cáncer y el rol de la sociedad civil en la prevención y tratamiento. <br><br>
                                        Fortalecer estilos de vida saludable para el autocuidado de la población, a través de la educación en salud, promoción de factores protectores y prevención de factores de riesgo. <br><br>
                                        Mejorar cobertura de inmunización como estrategia de prevención. Por ejemplo, la vacunación contra el virus del papiloma humano (VPH), que a partir de 2019 incluirá a niños hombres.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 pb-2">
                            <div class="mt-3 pb-2">
                                <div class="card voutchers">
                                    <div class="voutcher-divider">
                                        <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                            <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #e91e63;">#JuntosSumamosVida</a></h5>
                                        </div>
                                        <div class="voutcher-right text-center border-left">
                                            <i class="fas fa-handshake" style="font-size: 28px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span> <span class="wishlist"><i class="fa fa-heart-o"></i></span> </div>
                                    </div> <img src="https://diarioenfermero.es/wp-content/uploads/2019/04/closeup-support-hands_53876-14963.jpg" class="img-fluid rounded thumbnail-image">
                                </div>

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        Cuidados paliativos: un servicio fundamental
                                    </div>
                                    <div class="card-text">
                                        Garantizar una atención integral, oportuna y de calidad a todos los chilenos, con acceso a cuidados paliativos como un servicio fundamental para pacientes oncológicos. <br><br>
                                        Mejorar cobertura de tamizaje, mejorar oportunidad y calidad del diagnóstico, a través de un aumento en la cobertura de exámenes como Papanicolau, mamografías y de cáncer digestivo.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 pb-2">
                            <div class="mt-3 pb-2">
                                <div class="card voutchers">
                                    <div class="voutcher-divider">
                                        <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                            <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #e91e63;">#JuntosSumamosVida</a></h5>
                                        </div>
                                        <div class="voutcher-right text-center border-left">
                                            <i class="fas fa-handshake" style="font-size: 28px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span> <span class="wishlist"><i class="fa fa-heart-o"></i></span> </div>
                                    </div> <img src="https://thumbs.dreamstime.com/b/tablero-y-lista-de-control-del-vector-con-la-marca-cotejo-tableta-negocio-el-formulario-inscripci%C3%B3n-terminado-115614354.jpg" class="img-fluid rounded thumbnail-image">
                                </div>

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        Registro Nacional del cáncer
                                    </div>
                                    <div class="card-text">
                                        Fortalecer los sistemas de registro, información y vigilancia epidemiológica, para facilitar la generación,
                                        calidad y acceso a la información, a través de un Registro Nacional del Cáncer a partir del año 2020 que
                                        signifique un apoyo en la toma de decisiones en salud pública.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 pb-2">
                            <div class="mt-3 pb-2">
                                <div class="card voutchers">
                                    <div class="voutcher-divider">
                                        <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                            <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #e91e63;">#JuntosSumamosVida</a></h5>
                                        </div>
                                        <div class="voutcher-right text-center border-left">
                                            <i class="fas fa-handshake" style="font-size: 28px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span> <span class="wishlist"><i class="fa fa-heart-o"></i></span> </div>
                                    </div> <img src="https://image.freepik.com/vector-gratis/prescripcion-medica-linea-rx-chequeo-medico-telefono-inteligente-ilustracion-medico-que-muestra-aplicacion-telefono-recetas-examenes-medicos-diagnostico-paciente-concepto-medicina-linea_165217-210.jpg" class="img-fluid rounded thumbnail-image">
                                </div>

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        Calidad de los procesos clínicos
                                    </div>
                                    <div class="card-text">
                                        Fortalecer la rectoría, regulación y fiscalización para asegurar la calidad de los procesos
                                        clínicos establecidos para diagnóstico y tratamiento de personas con cáncer.
                                        También para asegurar los aspectos técnicos y de funcionamiento de equipos para una atención de calidad. <br> <br>
                                        Actualizar guías y protocolos de tratamiento en los 20 cánceres de mayor impacto.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 pb-2">
                            <div class="mt-3 pb-2">
                                <div class="card voutchers">
                                    <div class="voutcher-divider">
                                        <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                            <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #e91e63;">#JuntosSumamosVida</a></h5>
                                        </div>
                                        <div class="voutcher-right text-center border-left">
                                            <i class="fas fa-handshake" style="font-size: 28px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span> <span class="wishlist"><i class="fa fa-heart-o"></i></span> </div>
                                    </div> <img src="https://image.freepik.com/vector-gratis/icono-mapa-isometrico-ilustracion-puntero-pin-ubicacion-destino_108231-1.jpg" class="img-fluid rounded thumbnail-image">
                                </div>

                                <div class="card-body">
                                    <div class="card-title text-center">
                                        Mejoramiento de la red oncológica
                                    </div>
                                    <div class="card-text">
                                        Optimizar Centros Oncológicos de Alta complejidad en Antofagasta, Valparaíso, Santiago, Concepción y Valdivia, y sumar a la red 11 Centros de Complejidad a lo largo de Chile. <br><br>
                                        Formar cerca de 130 especialistas oncólogos para incorporarse a la red al año 2022. <br> <br>
                                        Invertir 20.000 millones de pesos anuales en equipamiento e infraestructura oncológica, hasta el año 2028, para asegurar acceso a prestaciones de calidad. <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----------------- BUTTON WITH ICON ----------------->
                    <div class="row pb-3">
                        <div class="container text-center">
                            <div class="col-12">
                                <a href="https://www.minsal.cl/wp-content/uploads/2019/01/2019.01.23_PLAN-NACIONAL-DE-CANCER_web.pdf" target="_blank"><button class="btn btn-danger" style="font-size: 20px;"><i class="fas fa-cloud-download-alt"></i>&nbsp; Descarga el Acuerdo</button></a>
                            </div>
                        </div>
                    </div>


                    <!----------------- SECCION HASHTAG Y BOTÓN VOLVER ARRIBA ----------------->
                    <div class="row" style="padding: 40px 0px;">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-6 text-center">
                                    <a href="https://twitter.com/search?f=tweets&amp;q=chilecontraelc%C3%A1ncer&amp;src=typd" target="_blank">
                                        <!-- HASHTAG -->
                                        <div class="hashtag">
                                            <h2><strong>#Chile</strong>Contra<strong>El</strong>Cáncer</h2>
                                        </div>
                                        <!-- FIN HASHTAG -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- FIN DEL ROW -->


                </div>
                <!-- End of Main Content -->

                <!-- <div class="container">
                    <div class="row pt-5 pb-3">
                        <div class="col-12">
                            <div class="progress" style="height: 9px;">
                                <div class="progress-bar bg-morado" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div> -->


            </div>
            <!----------------- FOOTER (LOGO Y REDES SOCIALES) ----------------->
            <footer class="footer">
                <div class="container">
                    <div class="col-6 col-md-9 col-lg-9">
                        <a href="https://www.gob.cl/">
                            <img src="https://s3.amazonaws.com/gobcl-prod/filer_public/53/92/53927a9c-d2ec-4248-a00d-1e383a96ae51/logo.png" width="150px" alt="Gobierno de Chile">
                        </a>
                    </div>
                </div>
            </footer>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#firmadigital").attr('class', 'nav-item active');
        </script>

        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>

        <script>
            // $('#modal-popup').modal('show');
            // $('#modal-popup').show();

            // $('#modal1').modal('show');

            // setTimeout(function() {
            //     alertify.success("as");
            //     $('#modal1').modal('hide');
            // }, 60 * 1000); //en un minuto si no lo cierran antes se cierra



            // function cerrar() {
            //     alertify.success("as");
            //     $("#modal-popup").removeClass("animate__animated animate__fadeInDown").addClass("animate__animated animate__fadeOutUp");
            // }

            /*===================================00EFECTO SUAVE DEL SCROOL DESDE EL HEADER================================== */
            var scrolltoOffset = $('#header').outerHeight() - 1;
            $(document).on('click', '.nav a, .mobile-nav a', function(e) {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    if (target.length) {
                        e.preventDefault();

                        var scrollto = target.offset().top - scrolltoOffset;

                        if ($(this).attr("href") == '#header') {
                            scrollto = 0;
                        }

                        $('html, body').animate({
                            scrollTop: scrollto
                        }, 1500, 'easeInOutExpo');

                        if ($(this).parents('.nav, .mobile-nav').length) {
                            $('.nav .active, .mobile-nav .active').removeClass('active');
                            $(this).closest('li').addClass('active');
                        }

                        if ($('body').hasClass('mobile-nav-active')) {
                            $('body').removeClass('mobile-nav-active');
                            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                            $('.mobile-nav-overly').fadeOut();
                        }
                        return false;
                    }
                }
            });
        </script>



</body>

</html>