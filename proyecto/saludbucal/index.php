<?php
session_start();
$filtro_busqueda = null;
if (!isset($_GET['pg'])) header('location:?pg=1');

if (isset($_GET['bq'])) {
    $catacteresespeciales = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

    if (preg_match($catacteresespeciales, $_GET['bq'])) { //encontro caracteres especiales,esto para detectar inserciones en la url
        header('location:?pg=1');
    } else {
        $filtro_busqueda = $_GET['bq'];
    }
}
include '../partes/odontologia/SQLodonto_principal.php';
include '../partes/head.php';
include '../partes/encriptacion.php'; ?>
<link rel="stylesheet" href="../../css/estilo_calendario.css">

<title>Salud los Álamos - Salud bucal</title>
<meta property="og:image" content="" /> <!-- el meta properiti og:image le setea la imagen al dialogo del compartir en facebook-->
<meta property="og:title" content="" />
<style>
    .btn-danger:hover {
        color: #fff;
        background-color: #c30505;
        border-color: #c30505;
    }
    .btn-danger:active {
        color: #fff;
        background-color: #c30505;
        border-color: #c30505;
    }
    .btn-danger:focus {
        color: #fff;
        background-color: #c30505;
        border-color: #c30505;
    }
</style>
</head>

<body>

    <?php include '../partes/navbar.php'; ?>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

                    <?php
                    if ($existeesearticulo == 0) {
                        echo '<h1 class="font-weight-bold mb-2 text-center py-2" style="color: #6a97bd;font-size: 50px;">UP<span style="color:#90bde4;">S!</span></h1>';
                        echo '<div class="row justify-content-center py-3"><img src="../../importantes/nohayresultados.jpg"  style="text-align: center;border-radius:50%;box-shadow: 10px 5px 5px gray;padding-bottom:10px;"></div>'; //esa linea blanca en el final del circulo se creo con el padding-bottom

                        echo '
                        <div class="row justify-content-center">
                            <a href="javascript:void(0)" onclick="location.href=\'../saludbucal/\'" class="btn btn-outline-primary btn-sm"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                        </div>';

                        echo '<h3 style="text-align: center;padding-top:25px;">No se encontraron resultados de la búsqueda: ' . $_GET['bq'] . '</h3>';
                    } else {
                    ?>
                        <div class="container py-3">

                            <!-- First Row [Prosucts]-->
                            <h2 class="font-weight-bold mb-2" style="color: #90bde4;">Información a la comunidad Salud Bucal</h2>
                            <!-- <p class="font-italic mb-4" style="color: #9cb9d8;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->


                            <div class="form-inline">
                                <input class="form-control mr-sm-2 input-lg" type="search" placeholder="Filtrar" aria-label="Buscar" id="inputbuscarodonto" onkeypress="return validainput(event)" onpaste="return false" autocomplete="off">
                                <!--onpaste="return false" -->
                                <button class="btn btn-danger my-2 my-sm-0" id="botonbuscarodonto"><i class="fa fa-search"></i></button>
                            </div>


                            <div class="row justify-content-end">

                                <div class="col-xl-12 col-sm-6 pt-2" id="mostraralertas">

                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-danger btn-sm" id="botonresumen"> Resumen</button>
                                        </div>
                                        <span class="form-control text-center"><i class="fas fa-info-circle" style="font-size: 25px;"></i></span>
                                        <div class="input-group-append">
                                            <!-- <span class="input-group-text" id="basic-addon2">@example.com</span> -->
                                            <button class="btn btn-danger btn-sm" id="botonobjetivos"> Objetivos</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--el text-muted es el color normal por asi decirlo -->
                            <div class="row pb-5 mb-4">
                                <?php

                                while ($fila = mysqli_fetch_array($sql2)) {

                                    if (empty($fila["id_articulo_odonto"])  || empty($fila["archivo_articulo_odonto"])) {
                                        $imagen_odonto = '<img src="odontologia/default/no-imagen.jpg" alt="" class="img-fluid d-block mx-auto mb-3" style="height: 155px;">';
                                    } else {
                                        $imagen_odonto = '<img src="odontologia/' . $fila["id_articulo_odonto"] . '/' . $fila["archivo_articulo_odonto"] . '" alt="" class="img-fluid d-block mx-auto mb-3 rounded" style="height: 155px;">';
                                    }
                                ?>

                                    <div class="col-lg-4 py-3">
                                        <!-- Card-->
                                        <a href="../descrodonto/?rd=<?php echo encriptar($fila["id_articulo_odonto"], "e"); //encriptar($fila["id_articulo"], "e"); 
                                                                    ?>" title="Ver">
                                            <div class="card rounded shadow border-0">
                                                <div class="card-body p-4"><?php echo $imagen_odonto; ?>
                                                    <h5><?php echo $fila["titulo_articulo_odonto"]; ?></h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                        <!-- <hr class="invis"> -->

                    <?php } ?>
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


                <?php include '../partes/banners-derecha.php' ?>

            </div>
        </div><!-- end container -->
    </section>

    <?php include '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#saludbucal").attr('class', 'nav-item active');
    </script>

    <!-- Core JavaScript
    ================================================== -->
    <script src="../js/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="../js/tether.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- <script src="../js/custom.js"></script> -->
    <script src="js/busqueda.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->


    <script>
        $('#bannervideotendencias').hide();
        $('#redessociales').hide();
    </script>

    <script>

        $('#botonresumen').click(function() {
            $('#mostraralertas').html(`
            <div class="alert alert-secondary alert-dismissible" role="alert" id="alerta1">
                    <strong>Resumen</strong> <br>
                Es reconocida como una de las prioridades de salud del país, tanto por la prevalencia y severidad de las enfermedades bucales como por la mayor percepción de la población frente a estas patologías que afectan su salud general y su calidad de vida.
                La Política de Salud Bucal está orientada a la prevención y promoción de la Salud Bucal de la población, con énfasis en los grupos más vulnerables. Considera además actividades recuperativas en grupos priorizados mediante acciones costo efectivas basadas en la mejor evidencia disponible.
                La visión del Departamento de Salud Bucal es que la población goce y valore una Salud Bucal que le permita mejorar su calidad de vida, con la participación activa de toda la sociedad. Su misión es integrar la Salud Bucal con eficacia, equidad y solidaridad a las políticas y estrategias de salud del país, con énfasis en la promoción y en la prevención.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            `);
        });

        $('#botonobjetivos').click(function() {
            $('#mostraralertas').html(`
            <div class="alert alert-secondary alert-dismissible" role="alert">
                    <strong>Objetivos</strong> <br>
                    1. Fortalecer la autoridad sanitaria nacional y regional.<br>
                    2. Instalar un modelo de salud en todas las políticas a través del trabajo intersectorial.<br>
                    3. Diseñar Políticas, Planes y Programas en Salud Bucal que disminuyan la inequidad en Salud Bucal.<br>
                    4. Evaluar y Monitorear Políticas Planes y Programas en Salud Bucal.<br>
                    5. Difundir Políticas, Planes y Programas e información referente a Salud Bucal.

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            `);
        });
    </script>

</body>

</html>