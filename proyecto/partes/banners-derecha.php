<?php
include '../partes/SQL_banner_derecha.php';
?>

<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <!--.sidebar .widget{ margin-bottom: x rem} AQUI SE VE EL ESPACIO ENTRE BANNERS (style.css)-->
        <?php while ($fila_IMG_LINK = mysqli_fetch_array($SQL_IMG_LINK)) {

            if (empty($fila_IMG_LINK["id_ban_imagenes"])  || empty($fila_IMG_LINK["nombre_ban_imagenes"])) {
                $imagen_IMG_LINK = '<img src="../bannerimagenes/banimg/default/no-imagen.jpg" alt="" class="img-fluid" style="max-height:190px;">';
            } else {
                $imagen_IMG_LINK = '<img src="../bannerimagenes/banimg/' . $fila_IMG_LINK["id_ban_imagenes"] . '/' . $fila_IMG_LINK["nombre_ban_imagenes"] . '" alt="" class="img-fluid" style="max-height:140px;">';
            }
        ?>
            <div class="widget shadow-sm rounded">
                <div class="banner-spot clearfix">
                    <a href="<?php echo $fila_IMG_LINK["link_ban_imagenes"] ?>" target="_blank">
                        <div class="banner-img">
                            <?php echo $imagen_IMG_LINK; ?>
                        </div>
                    </a>
                </div>
            </div>

        <?php } ?>

        <div class="widget" style="display: none;" id="bannerodonto">
            <ul class="list-group">
                <?php while ($fila_ODONTO = mysqli_fetch_array($SQL_CATEGORIA_ODONTO)) { ?>
                    <!--<span class="badge badge-primary badge-pill px-4">14</span>-->
                    <a href="../descrodonto?rd=<?php echo encriptar($fila_ODONTO["id_articulo_odonto"], "e"); //encriptar($fila["id_articulo"], "e"); 
                                                ?>" class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $fila_ODONTO['titulo_articulo_odonto']; ?>
                    </a>

                <?php } ?>
            </ul>
        </div>

        <div class="widget" id="bannervideotendencias">
            <h2 class="widget-title text-center"> Videos tendencias</h2>
            <div class="trend-videos">
                <?php while ($fila_VIDEO_LINK = mysqli_fetch_array($SQL_VIDEO_LINK)) { // WHILE 

                    if (empty($fila_VIDEO_LINK["id_ban_videos"])  || empty($fila_VIDEO_LINK["nombre_ban_videos"])) {
                        $VIDEO_LINK = '<video width="100%" controls><source src="../bannervideos/banvideos/default/no-video.mp4" type="video/mp4"> </video>';
                    } else {
                        $VIDEO_LINK = '<video width="100%" autoplay="autoplay" controls muted><source src="../bannervideos/banvideos/' . $fila_VIDEO_LINK["id_ban_videos"] . '/' . $fila_VIDEO_LINK["nombre_ban_videos"] . '" type="video/mp4"></video>';
                    }
                ?>

                    <div class="blog-box">
                        <div class="post-media">
                            <?php echo $VIDEO_LINK; ?>
                        </div><!-- end media -->
                        <div class="blog-meta">
                            <h5 class="text-danger" style="font-size: small;"><?php echo $fila_VIDEO_LINK["titulo_ban_videos"]; ?></h5>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->

                    <hr class="invis">

                <?php } ?>
                <!-- FIN DEL WHILE -->

            </div><!-- end videos -->
        </div><!-- end widget -->

        <div class="widget" id="bannerlomasvisto">
            <h2 class="widget-title text-center">Lo más visto</h2>
            <div class="blog-list-widget">
                <div class="list-group">

                    <?php while ($fila_LO_MAS_VISTO = mysqli_fetch_array($SQL_LO_MAS_VISTO)) {

                        if (empty($fila_LO_MAS_VISTO["id_articulo"])  || empty($fila_LO_MAS_VISTO["nombre_imagen_articulo"])) {
                            $imagen_LO_MAS_VISTO = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" class="img-fluid float-left" style="max-width:70px;">';
                        } else {
                            $imagen_LO_MAS_VISTO = '<img src="../noticias/imagenes/' . $fila_LO_MAS_VISTO["id_articulo"] . '/' . $fila_LO_MAS_VISTO["nombre_imagen_articulo"] . '" alt="" class="img-fluid float-left" style="max-width:70px;">';
                        }
                    ?>
                        <a href="../descrnoticia/?v=<?php echo encriptar($fila_LO_MAS_VISTO["id_articulo"], "e"); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <?php echo $imagen_LO_MAS_VISTO; ?>
                                <h5 class="mb-1"><?php echo $fila_LO_MAS_VISTO["titulo_articulo"]; //utf8_encode() 
                                                    ?></h5>
                                <small><?php echo $fila_LO_MAS_VISTO["fecha_articulo"]; ?></small>
                            </div>
                        </a>

                    <?php } ?>


                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->


        <div class="widget" id="redessociales">
            <h2 class="widget-title text-center">Redes sociales</h2>

            <div class="row text-center justify-content-center">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="https://www.facebook.com/Salud-Los-%C3%81lamos-282022055557052/" target="_blank" class="social-button facebook-button">
                        <i class="fa fa-facebook"></i>
                        <p>2.3k</p>
                    </a>
                </div>

                <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button twitter-button">
                        <i class="fa fa-twitter"></i>
                        <p>98k</p>
                    </a>
                </div> -->

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="https://saludlosalamos.cl:2083/" target="_blank" class="social-button google-button">
                        <i class="fa fa-envelope"></i>
                        <p>238</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="https://www.youtube.com/channel/UCVQo4luAgqmuZ_t3wgs-A8A" target="_blank" class="social-button youtube-button">
                        <i class="fa fa-youtube"></i>
                        <p>27</p>
                    </a>
                </div>
            </div>
        </div><!-- end widget -->

        <!-- <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                                </div>-->
        <!-- end banner-img -->
        <!-- </div>-->
        <!-- end banner -->
        <!--</div>-->
        <!-- end widget -->

    </div><!-- end sidebar -->
</div><!-- end col -->

