<?php session_start();
$IDencriptado = $_GET['rd'];
include '../partes/head.php';
include '../partes/encriptacion.php';
include '../partes/odontologia/SQL_ver_art_odonto.php'; 
?>
<style>
    .nav-pills .navega.active {
        background-color: #00b1e5;
        border-radius: 5px;
        color: white !important;
        /*Color blanco de la letra cuando el nav-link esta activo*/
    }

    .nav-pills .navega {
        border-radius: 2px;
        border: 2px solid #00b1e5;
        /*bordes celestes alrededor del nav-link*/
        margin-right: 15px;
        color: #00b1e5 !important;
        /*Color celeste de la letra cuando el nav-link no esta activo*/
    }

    .navega,
    .navega:hover {
        font-size: 14px;
        color: white !important;
        padding: 6px 25px;
        transition: all ease 0.5s;
        /*transicion de medio segundo*/
    }

    .navega:hover {
        background-color: #00b1e5;
        /*Color del fondo del nav-link no activado*/
        color: white !important;
        /*Color blanco de la letra cuando pasamos con el mouse sobre el nav-link que no esta activo*/
    }
</style>
<title>Salud los Álamos - Salud bucal</title>

<meta property="og:image" content="" /> <!-- el meta properiti og:image le setea la imagen al dialogo del compartir en facebook-->
<meta property="og:title" content="" />
</head>

<body>

    <?php include '../partes/navbar.php'; ?>


    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <!--Featured Image-->
                    <div class="card mb-4 shadow">

                        <img src="../../importantes/salud_bucal.jpg" class="img-fluid" alt="" style="max-height: 432px;">
                      
                    </div>
                    <!--/.Featured Image-->

                    <!--Card-->
                    <div class="card mb-4 shadow">

                        <!--Card content-->
                        <div class="card-body">

                            <p class="h5 my-4 text-center"><?php echo $titulo_articulo; ?></p>

                            <?php if ($frase_articulo != '' || $cita_articulo != '') { ?>
                                <blockquote class="blockquote">
                                    <p class="mb-0"><?php echo $frase_articulo; ?></p>
                                    <footer class="blockquote-footer">
                                        <cite title="Source Title"><?php echo $cita_articulo; ?></cite>
                                    </footer>
                                </blockquote>
                            <?php } ?>

    
                            <p><?php echo $decripcion_articulo; ?></p>

                        </div>

                    </div>
                    <!--/.Card-->
   
                    <div class="card shadow" id="carddelanexo">
                        <div class="container py-3">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <?php echo $tabmenu;?>
                            </ul>


                            <div class="tab-content" id="pills-tabContent">
                                <?php echo $tabcontent; ?>
                            </div>

                        </div>
                    </div>

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
      //  $("#mision").attr('class', 'nav-item active');
    </script>

    <!-- Core JavaScript
    ================================================== -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <script src="../js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
        $('#bannerodonto').show();
        $('#bannerlomasvisto').hide();
        $('#bannervideotendencias').hide();
        $('#redessociales').hide();
    </script>

    <script>
    let versiocultoelcard=<?php echo $Contar?>;

    if(versiocultoelcard==0){
        $('#carddelanexo').hide();
    }
    else{
        $('#carddelanexo').show();
    }
   // console.log("Contar: "+versiocultoelcard);
    //console.log("Contar: "."<?php //echo $Contar?>");
    </script>

</body>

</html>