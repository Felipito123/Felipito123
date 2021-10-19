<?php session_start();
include '../partes/encriptacion.php';

$filtro_busqueda = null;
if (!isset($_GET['pg'])) header('location:?pg=1');
if (isset($_GET['ba'])) {
    $catacteresespeciales = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

    if (preg_match($catacteresespeciales, $_GET['ba'])) { //encontro caracteres especiales
        header('location:?pg=1');
    } else {
        $filtro_busqueda = $_GET['ba'];
    }
}
include '../partes/SQL_noticias.php';
include '../partes/head.php';
?>

<style>
    /*Efecto de transición del card*/
    .card {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card::after {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        opacity: 0;
        -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card:hover {
        -webkit-transform: scale(1.02, 1.02);
        transform: scale(1.02, 1.02);
    }

    .card:hover::after {
        opacity: 1;
    }

    @media screen and (max-width: 449px) {
        #tamañotitulo {
            font-size: 5px;
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
</style>

<title>Salud los Álamos - Noticias</title>
</head>

<body style="background-color: #ffff">
    <?php include '../partes/navbar.php'; ?>


    <div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-star etiqueta"></i> Noticias <small class="hidden-xs-down hidden-sm-down">Encuentra la noticia de tu interés. </small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../inicio">Inicio</a></li>
                        <li class="breadcrumb-item" style="color:#0091e5;">Noticias</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

                    <?php
                    if ($existeesearticulo¿ == 0) {
                        echo '<div class="row justify-content-center"><img src="../../importantes/nohayresultados.jpg"  style="text-align: center;border-radius:50%;box-shadow: 10px 5px 5px gray;padding-bottom:10px;"></div>'; //esa linea blanca en el final del circulo se creo con el padding-bottom
                        echo '<h3 style="text-align: center;padding-top:25px;">No se encontraron resultados de la búsqueda: ' . $_GET['ba'] . '</h3>';
                    } else {
                        while ($fila = mysqli_fetch_array($sql7)) {

                            if (empty($fila["id_articulo"])  || empty($fila["nombre_imagen_articulo"])) {
                                $imagen_noticias = '<img src="imagenes/default/no-imagen.jpg" alt="" class="img-fluid">';
                            } else {
                                $imagen_noticias = '<img src="imagenes/' . $fila["id_articulo"] . '/' . $fila["nombre_imagen_articulo"] . '" alt="" class="img-fluid" style="width:320px;height:170px;">';
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
                            <div class="page-wrapper">
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

                                                <h4><a id="tamañotitulo" style="height:95px;" href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title=""><?php echo $fila["titulo_articulo"]; //utf8_encode() 
                                                                                                                                                                                        ?>[...]</a></h4>

                                                <small class="firstsmall"><a class="etiqueta" onclick="location.href='../descrnoticia/?v=<?php echo encriptar($fila['id_articulo'], 'e'); ?>'" title=""><?php echo $fila["nombre_categoria_articulo"]; ?></a></small>
                                                <small><a href="../descrnoticia/?v=<?php echo encriptar($fila['id_articulo'], 'e'); ?>" title=""><?php echo $fila["fecha_articulo"]; ?></a></small>
                                                <small><a href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title="Comentarios"><?php echo $Cantidaddecomentarios; ?> <i class="fas fa-comment-alt"></i></a></small> <!-- <?php //echo $fila["id_articulo"]; 
                                                                                                                                                                            ?>  -->
                                                <small><a href="../descrnoticia/?v=<?php echo encriptar($fila["id_articulo"], "e"); ?>" title="Visitas"><i class="fa fa-eye"></i> <?php echo $fila["visualizaciones_articulo"]; ?></a></small>


                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->

                                    </div><!-- end blog-list -->
                                </div>

                            </div><!-- end page-wrapper -->

                            <hr class="invis">
                    <?php }
                    } ?>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <!-- content-start lo tira a la izquierda-->
                                    <li class="page-item <?php echo $_GET['pg'] <= 1 ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?pg=<?php echo $_GET['pg'] - 1 ?>">Anterior</a>
                                        <!--obtengo de la url el numero de pagina, si es n le resta 1, para ir a la anterior -->
                                    </li>


                                    <?php
                                    for ($i = 0; $i < $paginas; $i++) { ?>
                                        <li class="page-item <?php echo $_GET['pg'] == $i + 1 ? 'active' : '' ?>">
                                            <!-- si el numero de la pagina es igual a $i+1 se pinta activo-->
                                            <a class="page-link" href="?pg=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                        <!--Para que comience desde el 1 y no desde el 0 -->
                                    <?php } ?>


                                    <li class="page-item <?php echo $_GET['pg'] >= $paginas ? 'disabled' : '' ?>">
                                        <!--si el numero de pagina es mayor o igual (Ej: 5 total >= 5, si: entonces se deshabilita el boton siguiente) -->
                                        <a class="page-link" href="?pg=<?php echo $_GET['pg'] + 1 ?>">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

                <?php include '../partes/banners-derecha.php'; ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <?php include '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#noticias").attr('class', 'nav-item active');
    </script>


    <!-- Core JavaScript
    ================================================== -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <script src="../js/custom.js"></script>

    <script>
        /*
         const truncartitulo = document.querySelector('#truncartitulo');
         truncartitulo.innerText = truncartitulo.innerText.substring(0, 60) + '';

        const truncardescripcion = document.querySelector('.truncardescripcion');
        truncardescripcion.innerText = truncardescripcion.innerText.substring(0, 159) + '..';*/

        function truncateText(selector, maxLength) {
            var element = document.querySelector(selector),
                truncated = element.innerText;

            if (truncated.length > maxLength) {
                truncated = truncated.substr(0, maxLength) + '...';
            }
            return truncated;
        }
        //You can then call the function with something like what i have below.
        document.querySelector('p').innerText = truncateText('p', 137);
    </script>
</body>

</html>