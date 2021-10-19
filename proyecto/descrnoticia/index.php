<?php
// session_start();
// $actuallink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $actuallink = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$obtener_id_encriptado = $_GET['v'];

if (!isset($_GET['v'])) {
    header("Location:../noticias/");
}

include_once('FB/fb-config.php');
// unset($_SESSION['noticia']);
$_SESSION['noticia']['pagina'] = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// setcookie("FBCOMENTARIO", "", 1); //Caducar en 1 segundo la cookie

if (isset($_SESSION['noticia']['fbUserId']) and $_SESSION['noticia']['fbUserId']  != "") {
    if (!isset($_COOKIE['FBCOMENTARIO'])) {
        $IDUSUARIO = $_SESSION['noticia']['fbUserId'];
        $NOMBREUSUARIO = $_SESSION['noticia']['fbUserName'];
        $CORREO = $_SESSION['noticia']['fbCorreo'];
        $IMAGEN = $_SESSION['noticia']['imagen'];
        // $IMAGEN = substr($IMAGEN, 0, -1); //Quito el último carácter del hash de la imagen que genera añadiendo el "#_=_"
        // $IMAGEN = str_replace($IMAGEN, '')ÃÜ
        $informacion = base64_encode($IDUSUARIO . '--' . $NOMBREUSUARIO . '--' . $CORREO . '--' . $IMAGEN);
        setcookie('FBCOMENTARIO', $informacion, time() + 365 * 24 * 60 * 60);
    } else {
        unset($_SESSION['noticia']);
    }
}

$urlSinParametros = preg_replace('/\\?.*/', '', "$_SERVER[REQUEST_URI]"); //Es decir, quito EJ: ?v=SkVheDhiUC9WQ1krT1B5dXZqNzhIdz09

$permissions = array('email'); // Permiso Opcional
$loginUrl = $helper->getLoginUrl((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$urlSinParametros" . "FB/fb-callback.php", $permissions);


require_once('traductor/vendor/autoload.php');

use \Statickidz\GoogleTranslate;

function traducir($idiomaentrada, $idiomasalida, $frase)
{
    $source = $idiomaentrada;
    $target = $idiomasalida;
    $text = $frase;
    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);
    return $result;
}
?>

<?php
include '../partes/encriptacion.php';
include '../partes/SQL_descripcion.php'; ?>
<?php include '../partes/head.php'; ?>
<!--Los title deben ir al principio -->
<link rel="stylesheet" href="../../css/estilo_calendario.css">
<script src="js/rating.js"></script>
<script type="text/javascript">
    if (window.location.hash === "#_=_") {
        history.replaceState ?
            history.replaceState(null, null, window.location.href.split("#")[0]) :
            window.location.hash = "";
    }
</script>
<!--Las calificaciones tienen un estilo que lo guarde en estilosdeblog.css -->
<style>
    @media screen and (max-width: 415px) {

        /*Para el boton escuchar*/
        .btn-primary {
            width: 80px !important;
            font-size: 0.7em !important;
            padding-top: 10px;
        }

        .btn-comentar {
            width: 100% !important;
        }
    }

    .btn-light:hover {
        color: #fff;
        background-color: #e6e9ec;
        border-color: #e6e9ec;
    }

    .btn-crema {
        color: black;
        border-color: #fbf7f7;
        background-color: #fbf7f7;
    }

    .btn-crema:hover {
        color: black !important;
        /* border-color: #fbf7f7; */
        background-color: #fbf7f7 !important;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #ad2633;
        border-color: #ad2633;
    }

    .btn-danger:focus {
        color: #fff;
        background-color: #ad2633;
        border-color: #ad2633;
    }

    .btn-outline-dark:hover {
        color: white;
        background-color: #343a40;
    }
</style>

<?php $h = "../noticias/imagenes/" . $resultado["id_articulo"] . "/" . $resultado["nombre_imagen_articulo"]; ?>
<meta property="og:image" content="<?php echo $h; ?>" /> <!-- este meta sirve para que tome la imagen el dialogo de el boton compartir en facebook-->
<meta property="og:title" content="<?php echo $resultado["titulo_articulo"]; ?>" />
<meta property='og:description' content="<?php $resultado["titulo_articulo"]; ?>" />
<link rel="stylesheet" href="comentarios/css/estilo.css">

<title>Salud los Álamos - Descripción</title>
</head>

<body>

    <?php
    include '../partes/navbar.php'; ?>

    <section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">

                            <span class="color-orange"><a href="javascript:void(0);" title="<?php echo $nombre_categoria; ?>"><?php echo $nombre_categoria; ?></a></span>

                            <div class="row justify-content-center py-2" id="muestracalificacion" style="visibility: hidden;">
                                <div class="calificaciones">
                                    <input id="rating" value="1" type="radio" />
                                    <input id="rating" value="2" type="radio" />
                                    <input id="rating" value="3" type="radio" />
                                    <input id="rating" value="4" type="radio" />
                                    <input id="rating" value="5" type="radio" />
                                </div>
                            </div>

                            <h3><?php echo $titulo_articulo; ?></h3>

                            <div class="blog-meta big-meta">
                                <small><?php echo $fecha; ?></small>
                                <small><?php //echo $id; 
                                        ?>Cesfam</small>
                                <small><a title=""><i class="fa fa-eye"></i> <?php echo $visitas; ?> visitas</a></small>
                            </div><!-- end meta -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <?php echo $mostrarimagen; ?>
                        </div><!-- end media -->

                        <div class="row justify-content-end pr-4">
                            <!-- <div class="pt-1"> <p style="color:blue;"><strong>Idioma</strong></p> </div> -->
                            <div class="pr-1">
                                <input type="radio" id="langEspañol" name="idioma" value="1" style="display: none;" checked />
                                <!--onchange="idiomas('español')" -->
                                <label for="langEspañol" title="escuchar en español"><i><img src="idiomas/español.png" alt="no imagen" style="width:20px;height:20px;"></i></label>
                            </div>
                            <div class="pl-1">
                                <input type="radio" id="langIngles" name="idioma" value="2" style="display: none;" />
                                <!--onchange="idiomas('ingles')" -->
                                <label for="langIngles" title="escuchar en ingles"><i><img src="idiomas/ingles.png" alt="no imagen" style="width:20px;height:20px;"></i></label>
                            </div>
                        </div>

                        <div class="botonescucha">
                            <div class="row justify-content-center">
                                <button class="btn btn-primary btn-sm" style="float:left;font-size:15px;border-color: white;" id="colordellabel"> <i class="fa fa-volume-up" aria-hidden="true" id="contraseñaimagen" style="color:white;"></i> Escuchar</button>
                            </div>
                        </div>

                        <div class="blog-content">
                            <div class="pp">
                                <h3><strong><?php echo $titulo_articulo; ?></strong></h3>
                                <p><?php echo nl2br($descripcion); ?></p>

                                <!-- <textarea id="escuchar" class="escucharclase" rows="10" col="10"><?php //echo strip_tags($descripcion); 
                                                                                                        ?></textarea> -->

                                <div class="row justify-content-center">
                                    <div class="card shadow">
                                        <?php echo '<img src="../noticias/imagenes/' . $resultado["id_articulo"] . '/' . $resultado["nombre_imagen_articulo"] . '" alt="" width="380">'; ?>
                                    </div>
                                </div>
                            </div><!-- end pp -->

                            <?php echo $mostrarpdf; ?>
                        </div><!-- end content -->


                        <?php
                        $link = 'https://www.linkedin.com/shareArticle?mini=true&url=encodeURIComponent(tesisactual/proyecto/descrnoticia/?v=SkVheDhiUC9WQ1krT1B5dXZqNzhIdz09); return false';

                        ?>
                        <hr class="invis1">

                        <div class="post-sharing">

                            <ul class="list-inline text-center pb-2">
                                <li class="col-xl-6 col-sm-12"><a id="boton-compartir-en-facebook" class="btn btn-outline-dark btn-block mb-2">
                                        <i class="fa fa-facebook-square"></i> Compartir en Facebook</a></li>
                                <li class="col-xl-6 col-sm-12"><a id="boton-compartir-en-twitter" class="btn btn-outline-dark btn-block mb-2"><i class="fa fa-twitter"></i> Compartir en Twitter</a></li>

                                <li class="col-xl-6 col-sm-12"><a id="boton_compartir_en_linkedin" class="btn btn-outline-dark btn-block mb-2"><i class="fab fa-linkedin"></i> Compartir en Linkedin</a></li>
                                <!-- onclick="window.location = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(window.location); return false" -->
                                <!-- <li><a id="javascript:void(0)" onclick="'https://www.tumblr.com/widgets/share/tool?shareSource=legacy&canonicalUrl=<-urlencode('www.google.com')->&posttype=www.google.com'" class="btn btn-outline-dark"> <i class="fab fa-tumblr"></i> Compartir en Tumblr</a></li> -->
                            </ul>


                        </div><!-- end post-sharing -->

                        <div class="blog-title-area">
                            <div class="tag-cloud-single">
                                <span>Tags</span>
                                <?php
                                while ($filatags = mysqli_fetch_array($sql_tags)) {
                                ?>
                                    <small><a href="../noticias/?pg=1&ba=<?php echo $filatags['nombre_categoria_articulo'] ?>" title=""><?php echo $filatags['nombre_categoria_articulo']; ?></a></small>
                                <?php } ?>
                            </div><!-- end meta -->
                        </div><!-- end title -->

                        <hr class="invis1">
                        <?php if ((!$contar_publi_anterior == 0 || !$contar_publi_anterior == '') && (!$contar_publi_siguiente == 0 || !$contar_publi_siguiente == '')) { ?>
                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                    <?php if (!$ocultarclaseanterior) { ?>
                                        <!--es decir cuando si se obtienen parámetros (false) -->
                                        <div class="col-lg-6">
                                            <div class="blog-list-widget">
                                                <div class="list-group">

                                                    <a href="?v=<?php echo encriptar($resultado_anterior["id_articulo"], "e"); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                        <div class="w-100 justify-content-between text-right">
                                                            <?php echo $imagen_anterior; ?>
                                                            <h5 class="mb-1"><?php echo $resultado_anterior["titulo"]; ?>...</h5>
                                                            <small>Anterior</small>
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div><!-- end col -->
                                    <?php } ?>
                                    <?php if (!$ocultarclasesiguiente) { ?>
                                        <!--es decir cuando si se obtienen parámetros -->
                                        <div class="col-lg-6">
                                            <div class="blog-list-widget">

                                                <div class="list-group">
                                                    <a href="?v=<?php echo encriptar($resultado_siguiente["id_articulo"], "e"); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                        <div class="w-100 justify-content-between">
                                                            <?php echo $imagen_siguiente; ?>
                                                            <h5 class="mb-1"><?php echo $resultado_siguiente["titulo"]; ?>...</h5>
                                                            <small>Siguiente</small>
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div><!-- end col -->
                                    <?php } ?>
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                        <?php } ?>

                        <hr class="invis1">

                        <?php if ($totalcalificacion != 0) { ?>
                            <div class="custombox authorbox clearfix col-xl-8 col-sm-12">
                                <!-- AQUI SE PUEDE VALIDAR SI EL CAMPO ES VACIO EJ: $comentario_autor == '' no se muestra, sino se muestra -->
                                <h4 class="small-title"><?php for ($i = 0; $i < 1; $i++) { ?><i class="fa fa-star px-1"></i><?php } ?> Tablero de calificaciones <?php for ($i = 0; $i < 1; $i++) { ?><i class="fa fa-star px-1"></i><?php } ?></h4>
                                <div class="row justify-content-center">
                                    <div class="col-xl-12 col-sm-12">
                                        <div class="card shadow">
                                            <!-- mb-4 le da un espacio(margin-bottom) al card -->
                                            <div class="card-body">
                                                <h4 class="small text-center"><span> <i class="fa fa-star"></i></span></h4>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-danger" id="primervalor" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><?php echo $calif_uno; ?></div>
                                                </div>
                                                <h4 class="small text-center"><span><?php for ($i = 0; $i < 2; $i++) { ?><i class="fa fa-star px-1"></i><?php } ?></span></h4>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><?php echo $calif_dos; ?></div>
                                                </div>
                                                <h4 class="small text-center"><span><?php for ($i = 0; $i < 3; $i++) { ?><i class="fa fa-star px-1"></i><?php } ?></span></h4>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><?php echo $calif_tres; ?></div>
                                                </div>
                                                <h4 class="small text-center"><span><?php for ($i = 0; $i < 4; $i++) { ?><i class="fa fa-star px-1"></i><?php } ?></span></h4>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"><?php echo $calif_cuatro; ?></div>
                                                </div>
                                                <h4 class="small text-center"><span><?php for ($i = 0; $i < 5; $i++) { ?><i class="fa fa-star px-1"></i><?php } ?></span></h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $calif_cinco; ?></div>
                                                </div>

                                            </div>
                                            <h4 class="small text-center"><?php echo $promedio; ?> <span><i class="fa fa-star white"></i> <?php echo $totalcalificacion; ?> total
                                                    <!--10.000 total-->
                                                </span></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end author-box -->
                        <?php } ?>
                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">También te puede interesar</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog-box">
                                        <div class="post-media">

                                            <a href="?v=<?php echo encriptar($resultado_tatpint["id_articulo"], "e"); ?>" title="">
                                                <!--<img src="upload/tech_menu_04.jpg" alt="" class="img-fluid">-->
                                                <?php echo $imagen_tatpint; ?>
                                                <div class="hovereffect">
                                                    <span class=""></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="?v=<?php echo encriptar($resultado_tatpint["id_articulo"], "e"); ?>" title=""><?php echo $resultado_tatpint["titulo"]; ?>[...]</a></h4>
                                            <!--Noticias más vista ultimamente -->
                                            <small><a href="?v=<?php echo encriptar($resultado_tatpint["id_articulo"], "e"); ?>" title="">Más visto</a></small>
                                            <small><a href="?v=<?php echo encriptar($resultado_tatpint["id_articulo"], "e"); ?>" title=""><?php echo $resultado_tatpint["fecha_articulo"]; ?></a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="?v=<?php echo encriptar($resultado_tatpint_reciente["id_articulo"], "e"); ?>" title="">
                                                <!--<img src="upload/tech_menu_06.jpg" alt="" class="img-fluid">-->
                                                <?php echo $imagen_tatpint_reciente; ?>
                                                <div class="hovereffect">
                                                    <span class=""></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="?v=<?php echo encriptar($resultado_tatpint_reciente["id_articulo"], "e"); ?>" title=""><?php echo $resultado_tatpint_reciente["titulo"]; ?>[...]</a></h4>
                                            <!--Noticia más reciente -->
                                            <small><a href="?v=<?php echo encriptar($resultado_tatpint_reciente["id_articulo"], "e"); ?>" title="">Reciente</a></small>
                                            <small><a href="?v=<?php echo encriptar($resultado_tatpint_reciente["id_articulo"], "e"); ?>" title=""><?php echo $resultado_tatpint_reciente["fecha_articulo"]; ?></a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix" id="contenedorgeneral">
                            <h4 class="small-title">Comentarios <span id="contarwechi"></span></h4>
                            <div class="container" id="contenedorymostrar"></div>
                        </div>

                        <div class="row justify-content-center text-center pt-2" id="comentarioBtnTextarea">
                            <!-- <div class="col-md-4 col-lg-4">
                                    <button class="btn btn-danger"> <i class="fas fa-chevron-circle-right"></i> Cerrar sesión</button>
                                </div> -->
                        </div>

                        <div class="row">
                            <?php
                            // echo $valorIP;
                            ?>
                        </div>

                        <?php
                        // function closetags($html) {
                        //     preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
                        //     $openedtags = $result[1];
                        //     preg_match_all('#</([a-z]+)>#iU', $html, $result);
                        //     $closedtags = $result[1];
                        //     $len_opened = count($openedtags);
                        //     if (count($closedtags) == $len_opened) {
                        //         echo 'valid html'; 
                        //     } else {
                        //         echo 'invalid html';
                        //     }
                        // } 

                        // $html = '<p>This is some text and here is a <strong>bold text then the post stop here....</p>';
                        // closetags($descripcion);

                        ?>


                        <hr class="invis1">
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <?php include '../partes/banners-derecha.php' ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <?php include '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <!-- <script src="../js/jquery.min.js"></script> -->

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/tether.min.js"></script>
    <script src="../js/funcionswal.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- <script src="../js/custom.js"></script> -->


    <script>
        // NotifTipoIntranet("Información", "Ahora puede imprimir su certificado. Presione el Botón Imprimir3", "info");
    </script>


    <script>
        var idart;
        var titulo;
        idart = "<?php echo $id; ?>";
    </script>

    <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v12.0" nonce="xudBBhvf"></script> -->

    <script src="js/compartir.js"></script>
    <script src="js/agregarcalificacion.js"></script>



    <script>
        // $(document).ready(function() {
        function leerCookie(key) {
            let value = ''
            document.cookie.split(';').forEach((e) => {
                if (e.includes(key)) {
                    value = e.split('=')[1]
                }
            })
            return value
        }

        function ExisteCookie(cname) {
            let name = cname + "=";
            let ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";

        }

        // console.log(leerCookie('FBCOMENTARIO'));
        // console.log("Leer cookie: " + Base64.decode(leerCookie('FBCOMENTARIO')));

        if (ExisteCookie('FBCOMENTARIO')) {


            console.log("Si existe cookie");

            $('#comentarioBtnTextarea').html(`
            <div class="col-xl-8 col-sm-12">
                <form class="form-wrapper" method="POST" autocomplete="off">
                    <textarea class="form-control" placeholder="Ingrese un comentario" rows="2" cols="5" name="comentario" id="comentario" onkeypress="return soloCaractDeConversacion(event)" minlength="2" maxlength="150" style="resize: none;min-height: 70px !important;" required></textarea>

                    <small class="col-sm-7">
                        Escrito <span id="escrito1" style="color:red;">00</span>
                        Restantes <span id="contadorcaract1" style="color:#007bff;">00</span>
                    </small>
            </div>
            <div class="col-xl-4 col-sm-12">
                    <button type="submit" id="enviar" onclick="enviar_comentario();" class="btn btn-primary btn-block">Publicar <i class="fas fa-comment-alt"></i></button>
                </form>
            </div>
            `);

            // <div class="row justify-content-center text-center" id="comentarioBtnTextarea">
            //     <div class="col-md-4 col-lg-4">
            //         <button class="btn btn-primary"> <i class="fab fa-facebook"></i> Comentar a través de Facebook</button>
            //     </div>
            // </div>                      
        } else {
            console.log("No existe cookie");
            $('#comentarioBtnTextarea').html(`
            <div class="row">
            <div class="col-xl-12 col-sm-12 pt-2">
                <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="btn btn-primary btn-comentar"> <i class="fab fa-facebook"></i> Comentar a través de Facebook</a>
            </div>
            </div>
            `);
        }

        muestra_comentarios();

        function muestra_comentarios() {

            $.post('funciones/acciones.php', {
                seleccionar: 1,
                valarticulo: '<?php echo $_GET['v'] ?>'
            }, function(respuesta) {
                let jsonresp, contador;
                jsonresp = JSON.parse(respuesta);
                largoarray = jsonresp.length;

                let recibecookie = Base64.decode(leerCookie('FBCOMENTARIO'));
                let separador = recibecookie.split("--");
                // console.log(leerCookie('FBCOMENTARIO'));
                // console.log("Leer cookie: " + Base64.decode(leerCookie('FBCOMENTARIO')));

                let visualizar_datos = '';

                // console.log("PROBAR DATOS: " + respuesta);
                // console.log("LARGO DEL ARRAY: " + largoarray);

                // visualizar_datos+=`
                // <div class="row justify-content-center text-center">
                //             <div class="col-xl-4 col-sm-6">
                //                 <a class="btn btn-crema" href="#carouselExampleControls" role="button" data-slide="prev"> <i class="fas fa-chevron-circle-left"></i> </a>
                //             </div>

                //             <div class="col-xl-4 col-sm-6">
                //                 <a class="btn btn-crema" href="#carouselExampleControls" role="button" data-slide="next"> <i class="fas fa-chevron-circle-right"></i> </a>
                //             </div>
                //     </div> 
                // `;

                if (largoarray == 0) {
                    $('#contenedorgeneral').html(`
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12">
                                <div class="alert alert-info" role="alert">
                                        Este artículo no tiene comentarios que mostrar
                                </div>
                            </div>
                        </div>
                    </div>
                `);
                } else {
                    $('#contarwechi').text('(' + largoarray + ')');
                    visualizar_datos += '<div class="container"><div id="carouselExampleControls" class="carousel slide" data-ride="carousel">';

                    let i = 1;
                    let next_item = true;

                    while (i <= largoarray) {
                        for (let j = 0; j < largoarray; j++) {
                            if (i == 1) {
                                visualizar_datos += '<div class="carousel-item comentarios active"><div class="row pb-3">';
                            } else if (next_item == true) {
                                visualizar_datos += '<div class="carousel-item comentarios"><div class="row pb-3">';
                            }
                            // let fecha = jsonresp[j].FECHA_OPTE;
                            // var separa = fecha.split("-");
                            // ` + separa[2] +`/` + separa[1] +`/` + separa[0] +`

                            visualizar_datos += `
                        <div class="col-md-6 col-lg-6 item">
                            <div class="box">
                                <p class="description">` + jsonresp[j].COMENTARIO_OPTE + `</p>
                            </div>
                            <div class="author"><img class="rounded-circle" src="` + jsonresp[j].DIRECCION_IMAGEN + `">
                                <h5 class="name">` + jsonresp[j].NOMBRE_APELLIDO_OPTE + `</h5>
                                <p class="title">  ` + jsonresp[j].FECHA_OPTE + `</p>`;

                            if (parseInt(separador[0]) == parseInt(jsonresp[j].ID_FB_OPTE)) {
                                // console.log()
                                visualizar_datos += `
                                <button class='btn btn-danger btn-sm btnEliminarComentario btn-block col-xl-4 col-sm-12 float-right' title='Eliminar comentario' value='` + jsonresp[j].ID_OPTE + `' style="color:white;"><i class="fas fa-trash"></i></button>`;
                            }

                            visualizar_datos += `
                            </div>
                        </div>`;
                            next_item = false;
                            if (i % 2 == 0) { //cada 2 datos se cree un un carousel
                                visualizar_datos += `</div></div>`;
                                next_item = true;
                            }
                            i++;
                        }
                    }
                    visualizar_datos += `</div>`;
                    // console.log(visualizar_datos);
                    $('#contenedorymostrar').html(visualizar_datos);
                }
            }).fail(function(error) {
                console.log("Ha ocurrido un error al cargar los comentarioss");
            });
        }

        function enviar_comentario() {
            let comentario = $('#comentario').val();

            var recibecookie = Base64.decode(leerCookie('FBCOMENTARIO'));
            var separador = recibecookie.split("--");
            // console.log(leerCookie('FBCOMENTARIO'));
            // console.log("Leer cookie: " + Base64.decode(leerCookie('FBCOMENTARIO')));

            if (comentario == '' || !comentario) {
                // alertify.warning("Comentario vacío", "info");
            } else {
                if (ExisteCookie('FBCOMENTARIO')) {

                    $.post('funciones/acciones.php', {
                        seleccionar: 2,
                        valarticulo: '<?php echo $_GET['v'] ?>',
                        params1: separador[0],
                        params2: separador[1],
                        params3: separador[2],
                        params4: separador[3],
                        params5: comentario
                    }, function(respuesta) {
                        if (respuesta == 1) {
                            NotifTipoIntranet("Información", "Parámetros vacíos", "info");
                        } else if (respuesta == 2) {
                            NotifTipoIntranet("Información", "Ha ocurrido un error al comentar, por favor, contacte a soporte.", "info");
                        } else if (respuesta == 3) {
                            muestra_comentarios();
                            NotifTipoIntranet("Exito", "Comentario registrado", "success");
                            $('#comentario').val('');
                            $("#escrito1").text(0);
                            $("#contadorcaract1").text(150);
                        } else if (respuesta == 4) {
                            NotifTipoIntranet("Información", "No se han recibido parámetros", "info");
                        }
                    }).fail(function(error) {
                        console.log("Ha ocurrido un error para enviar el comentario");
                    });
                }
            }
        }

        $(document).on('click', '.btnEliminarComentario', function() {
            $.post('funciones/acciones.php', {
                seleccionar: 3,
                params1: $(this).val()
            }, function(respuesta) {
                // console.log("Repsuesta: "+respuesta);
                if (respuesta == 1 || respuesta == 5) {
                    NotifTipoIntranet("Información", "Parámetros no recibidos", "info");
                } else if (respuesta == 2) {
                    NotifTipoIntranet("Información", "No se ha podido eliminar el comentario, si el problema persiste, por favor contacte a soporte.", "info");
                } else if (respuesta == 3 || respuesta == 4) {
                    NotifTipoIntranet("Exito", "Comentario eliminado", "success");
                    muestra_comentarios();
                }
            }).fail(function(error) {
                console.log("Ha ocurrido un error para enviar el comentario");
            });
        });
        // });
    </script>

    <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script>
        /*=====================================================IDIOMA=======================================================*/
        // var valoridioma = $('input:radio[name=idioma]:checked').val(); //toma el valor del input radio checkeado
        // alertify.success("VI:" + valoridioma);

        // function idiomas(val) {
        //     console.log(val);
        //     alertify.success(val);
        //     valoridioma=val;
        // }
        /*=====================================================IDIOMA=======================================================*/

        /*NOTA: la función php strip_tags, elimina las etiquetas html y convierte a texto plano
        NOTA2:  en la funcion traducir() puedo agregar otros parámetros y traducirá a otro idioma 
        NOTA3: SÓLO se puede usar php en javascript cuando esta dentro del mismo archivo php, no si estuviere en una extension Ej: "js/escucharvoz.js"*/

        var toogled = false;
        var español = ``;
        var ingles = ``;

        español = `<?php echo strip_tags($descripcion); ?>`;
        ingles = `<?php echo traducir('es', 'en', strip_tags($descripcion)); ?>`;

        // console.log(español);
        // console.log("\n" + ingles);

        document.getElementById("colordellabel").addEventListener("click", toogle, false);

        function toogle() {
            var valoridioma = $('input:radio[name=idioma]:checked').val(); //toma el valor del input radio checkeado
            if (!español || !ingles || español == '' || ingles == '') {

                if (valoridioma == 1) {
                    responsiveVoice.speak("No puedo leer la noticia, si el problema persiste contacte a soporte, yendo a la pestaña contáctanos", "Spanish Latin American Female");
                } else if (valoridioma == 2) {
                    responsiveVoice.speak("I can't read the news, if the problem persists contact support, going to the contact us tab", "US English Female");
                }
            } else {
                if (!toogled) {
                    toogled = true;
                    // alertify.success("VI:" + valoridioma);
                    if (valoridioma == 1) {
                        responsiveVoice.speak(español, "Spanish Latin American Female");
                    } //Male= Varon,US English Female 
                    else if (valoridioma == 2) {
                        responsiveVoice.speak(ingles, "US English Male");
                    }
                    // decir(nuevo);
                    // responsiveVoice.speak(nuevo, "Spanish Latin American Female"); //Male= Varon
                    // responsiveVoice.speak(nuevo, "Spanish Latin American Female"); //Male= Varon,US English Female
                    document.getElementById("colordellabel").style.backgroundColor = "#0551a2";
                    return;
                } else {
                    toogled = false;
                    document.getElementById("colordellabel").style.backgroundColor = "#007bff";
                    responsiveVoice.cancel();
                    // speechSynthesis.cancel();
                    return;
                }
            }
        }
        // }

        $("#comentario").keyup(function() {
            let noc = $("#comentario").val().length;
            let now = $("#comentario").val();
            let escrito = noc;
            // en caso que en el html del navegador alguien cambie el maxlenght
            if (noc >= 150) {
                $('#comentario').attr('maxlength', '150')
            }
            noc = 150 - noc;
            now = now.match(/\w+/g);
            if (!now) {
                now = 0;
            } else {
                now = now.length;
            }
            $("#escrito1").text(escrito);
            $("#contadorcaract1").text(noc);
        });
    </script>

</body>

</html>