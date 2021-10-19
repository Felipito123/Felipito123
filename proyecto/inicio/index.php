<?php session_start();

//if (isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
//    header("Location:micuenta.php");
//}

include '../partes/consultasSQL.php';
include '../partes/encriptacion.php';
include '../partes/head.php';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" id="joinchat-css" href="../../css/joinchatwhstp.min.css" media="all">
<style>
    .swiper-container {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 300px;
    }

    .swiper-slide .imgBx img {
        width: 100%;
        height: 100%;
    }

    .swiper-slide .descripcion {
        box-sizing: border-box;
        font-size: 20px;
        padding: 20px;
    }

    .swiper-slide .descripcion h3 {
        margin: 0;
        padding: 0;
        font-size: 20px;
        text-align: center;
        line-height: 20px;
    }

    .swiper-slide .descripcion h3 span {
        font-size: 16px;
        color: red;
    }


    @media screen and (max-width: 449px) {
        #tamañotitulo {
            font-size: 5px;
        }

        #cesfam {
            display: none;
        }
    }

    @media screen and (max-width: 450px) {
        #tamañotitulo {
            font-size: 13px;
        }
    }

    @media screen and (max-width: 451px),
    screen and (max-width: 800px) {
        #tamañotitulo {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 801px),
    screen and (max-width: 1290px) {
        #tamañotitulo {
            font-size: 17px
        }
    }


    @media screen and (max-width: 750px) {
        #espacio {
            margin-left: 10px;
        }
    }


    .clasehrefdemiboton {
        background-color: #3197d6;
        color: white;
        padding: 12px 14px;
        border-radius: 0px 20px 20px 0px;
        border-color: #3197d6;
    }

    #miboton {
        position: fixed;
        bottom: 80px;
        left: -10px;
    }


    #h:hover {
        padding-left: 30px;
        width: 30px;
        transition: 1s;
        color: white;
    }
</style>
<title>Salud los Álamos - Inicio</title>
</head>

<body>


    <?php include '../partes/navbar.php'; ?>

    <!-- LA PRIMERA SECCIÓN DE NOTICIAS-->
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
                <div class="first-slot">
                    <div class="masonry-box post-media">
                        <!--upload/tech_01.jpg - imagenes/acordeon.jpg - max-height:788px-->
                        <!--<img src="imagenes/imagen.jpg" alt="" class="img-fluid" style="height:529px"> -->

                        <a href="index.php" title="">
                            <?php echo $mostrarimagen; ?>
                        </a>
                        <div class="shadoweffect">
                            <!-- <label style="background-color: red; color: white; padding: 10px; border-radius: 0px 0px 5px 5px;float:right;margin-right:10px;"><i class="fa fa-edit" aria-hidden="true"></i></label>-->
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="etiqueta"><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo1, "e"); ?>" title=""><?php echo $nombre_categoria; ?></a></span>
                                    <h4><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo1, "e"); ?>" title="Titulo primero"><?php echo $titulo_articulo;//utf8_encode() ?></a></h4>
                                    <!--style="text-decoration: none !important;" SIRVE PARA QUITAR EL SUBRAYO PERO LO DEFINI EN style.css linea 62-->
                                    <small><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo1, "e"); ?>" title=""><?php echo $fecha; ?></a></small>
                                    <small><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo1, "e"); ?>" title=""><?php echo $autor; ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end first-side -->

                <div class="second-slot">
                    <div class="masonry-box post-media">
                        <!--upload/tech_02.jpg-->
                        <?php echo $mostrarimagen2; ?>
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="etiqueta"><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo2, "e"); ?>" title=""><?php echo $nombre_categoria2; ?></a></span>
                                    <h4><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo2, "e"); ?>" title="Titulo segundo"><?php echo $titulo_articulo2;//utf8_encode() ?></a></h4>
                                    <small><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo2, "e"); ?>" title=""><?php echo $fecha2; ?></a></small>
                                    <!--03 Julio, 2020 -->
                                    <small><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo2, "e"); ?>" title=""><?php echo $autor; ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end second-side -->

                <div class="last-slot">
                    <div class="masonry-box post-media">
                        <?php echo $mostrarimagen3; ?>
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="etiqueta"><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo3, "e"); ?>" title=""><?php echo $nombre_categoria3; ?></a></span>
                                    <h4><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo3, "e"); ?>" title=""><?php echo $titulo_articulo3; //utf8_encode() ?></a></h4>
                                    <small><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo3, "e"); ?>" title=""><?php echo $fecha3; ?></a></small>
                                    <small><a href="../descrnoticia/?v=<?php echo encriptar($id_articulo3, "e"); ?>" title=""><?php echo $autor; ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end second-side -->
            </div><!-- end masonry -->
        </div>
    </section>




    <!--Aqui las publicaciones o las noticias-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-top clearfix">
                            <h4 class="pull-left">Noticias <i class="fa fa-rss"></i></h4>
                        </div><!-- end blog-top -->

                        <?php while ($fila = mysqli_fetch_array($sql6)) {

                            if (empty($fila["id_articulo"])  || empty($fila["nombre_imagen_articulo"])) {
                                $imagen_noticias = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" class="img-fluid">';
                            } else {
                                $imagen_noticias = '<img src="../noticias/imagenes/' . $fila["id_articulo"] . '/' . $fila["nombre_imagen_articulo"] . '" alt="" class="img-fluid" style="width:320px;height:190px;">';
                            }

                            $IDarticulo = $fila["id_articulo"];
                            $QueryCantComentArtic = mysqli_query($mysqli, "SELECT COUNT(id_opte) as cantidad FROM opinante WHERE id_articulo='$IDarticulo'");

                            if (!$QueryCantComentArtic) {
                                $Cantidaddecomentarios = 0;
                            } else {
                                $ResQueryCantComentArtic = mysqli_fetch_assoc($QueryCantComentArtic);
                                $Cantidaddecomentarios = $ResQueryCantComentArtic['cantidad']; 
                            }
                        ?>
                            <div class="card shadow">
                                <div class="blog-list clearfix">
                                    <div class="blog-box row">
                                        <!-- Desde aqui el while -->
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title="">
                                                    <?php echo $imagen_noticias; ?>
                                                    <!-- <img src="upload/tech_blog_01.jpg" alt="" class="img-fluid">  $fila["id_articulo"]; upload/tech_blog_01.jpg -->
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->

                                        <div class="blog-meta big-meta col-md-8" id="espacio">

                                            <h4><a id="tamañotitulo" style="height:95px;" href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title=""><?php echo $fila["titulo_articulo"]; //utf8_encode() ?></a>...</h4>

                                            <small class="firstsmall"><a class="etiqueta" href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title=""><?php echo $fila["nombre_categoria_articulo"]; ?></a></small>
                                            <small><a href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title=""><?php echo $fila["fecha_articulo"]; ?></a></small>
                                            <small id="cesfam"><a href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title="Comentarios"><?php echo $Cantidaddecomentarios;?> <i class="fas fa-comment-alt"></i></a></small>
                                            <small><a href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title="Visitas"><i class="fa fa-eye"></i> <?php echo $fila["visualizaciones_articulo"]; ?></a></small>


                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                </div><!-- end blog-list -->
                            </div>

                            <hr class="invis">

                        <?php } ?>
                    </div><!-- end page-wrapper -->

                    <div class="container" hidden>
                        <!-- Swiper -->
                        <div class="swiper-container" style="max-width: 300px;">
                            <div class="swiper-wrapper" style="max-width: 300px;">

                                <?php while ($fila_img_galeria = mysqli_fetch_array($sql7)) {
                                    if (!empty($fila_img_galeria["id_galeria"]) && !empty($fila_img_galeria["archivo_galeria"])) {
                                        $direccion = '../pgaleria/galeria/' . $fila_img_galeria["id_galeria"] . '/' . $fila_img_galeria["archivo_galeria"] . '';
                                ?>

                                        <div class="swiper-slide" style="background-image:url(<?php echo $direccion; ?>)"> </div>

                                <?php }
                                } ?>
                                <!--<div class="swiper-slide" style="background-image:url(imagenes/20/medicamentos.jpg)"></div> -->

                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                </div><!-- end col -->

                <?php include '../partes/banners-derecha.php'; ?>
            </div><!-- end row -->


        </div><!-- end container -->
    </section>


    <!-- <div id="miboton">
        <a href="https://api.whatsapp.com/send?phone=56992344331" class="clasehrefdemiboton" target="_blank">
            <i class="fa fa-whatsapp text-center" style="width: 75%; font-weight: bold;font-size:23px;color:white;" id="h"> </i>
        </a>
    </div> -->

    <div class="joinchat joinchat--left joinchat--show pb-3" data-settings="{&quot;telephone&quot;:&quot;56957459545&quot;,&quot;mobile_only&quot;:false,&quot;button_delay&quot;:1,&quot;whatsapp_web&quot;:true,&quot;message_views&quot;:2,&quot;message_delay&quot;:5,&quot;message_badge&quot;:true,&quot;message_send&quot;:&quot;Hola *CENTRO DE SALUD FAMILIAR LOS ÁLAMOS*. Necesito información sobre&quot;,&quot;message_hash&quot;:&quot;4deac29c&quot;}" style="--peak:url(\#joinchat__message__peak);">
            <div class="joinchat__button">
                <div class="joinchat__button__open"></div>
                <div class="joinchat__button__sendtext">Iniciar chat</div>
                <svg class="joinchat__button__send" viewBox="0 0 400 400" stroke-linecap="round" stroke-width="33">
                    <path class="joinchat_svg__plain" d="M168.83 200.504H79.218L33.04 44.284a1 1 0 0 1 1.386-1.188L365.083 199.04a1 1 0 0 1 .003 1.808L34.432 357.903a1 1 0 0 1-1.388-1.187l29.42-99.427">
                    </path>
                    <path class="joinchat_svg__chat" d="M318.087 318.087c-52.982 52.982-132.708 62.922-195.725 29.82l-80.449 10.18 10.358-80.112C18.956 214.905 28.836 134.99 81.913 81.913c65.218-65.217 170.956-65.217 236.174 0 42.661 42.661 57.416 102.661 44.265 157.316">
                    </path>
                </svg>
                <div class="joinchat__badge">1</div>
                <div class="joinchat__tooltip">
                    <div>¿Necesitas ayuda?</div>
                </div>
            </div>
            <div class="joinchat__box">
                <div class="joinchat__header">
                    <div class="joinchat--left">
                        <img src="../../importantes/logocesfam-head.png" alt="" class="img-fluid mr-3" style="border-radius: 50%;width:55px;height:55px;">
                    </div>
                    <span class="joinchat__header__text">CENTRO DE SALUD FAMILIAR <br> <small class="text-center pl-4">CESFAM Los Álamos </small> </span>
                    <div class="joinchat__close" aria-label="Cerrar"></div>
                </div>
                <div class="joinchat__box__scroll" style="background-image: url('../../importantes/wallpaper-familiar.jpg');background-color:rgba(230,221,212);position:relative;overflow:auto;background-position:center;">
                    <div class="joinchat__box__content">
                        <div class="joinchat__message">
                            <label style="font-size:13px;font-weight:700;line-height:18px;color:rgba(0,0,0,0.4);">CENTRO DE SALUD FAMILIAR</label> <br>
                            ¡Hola! 👋 <br>
                            ¿En qué podemos ayudarte?
                            <!-- Si tienes alguna duda, escríbenos por WhatsApp. -->
                        </div>
                    </div>
                </div>
            </div>
            <svg height="0" width="0">
                <defs>
                    <clipPath id="joinchat__message__peak">
                        <path d="M17 25V0C17 12.877 6.082 14.9 1.031 15.91c-1.559.31-1.179 2.272.004 2.272C9.609 18.182 17 18.088 17 25z">
                        </path>
                    </clipPath>
                </defs>
            </svg>
        </div>

    <?php require '../partes/footer.php'; ?>
    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <!-- <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>  -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- <script src="../js/custom.js"></script> -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="../js/joinchatwhstp.min.js" id="joinchat-js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            /* pagination: {
                el: '.swiper-pagination',
             }, */
        });
    </script>



</body>

</html>