<?php
$sesion_iniciada = false;
$usuario = null;
if (isset($_SESSION['sesionCESFAM'])) {
    $sesion_iniciada = true;
    $usuario = $_SESSION['sesionCESFAM'];

    if (isset($_SESSION['sesionCESFAM']['id_rol'])) {
        $rol = $_SESSION['sesionCESFAM']['id_rol'];
    }
}

include '../conexion/conexion.php';
?>

<div id="wrapper">

    <header class="tech-header header" style="padding-top: 20px;">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse" style="height: 70px;">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <a class="navbar-brand" href="index.php"><img src="images/version/tech-logo.png" alt="logiyo" style="max-height: 50px; max-width: 200px;"></a>-->
                <!--images/version/tech-logo.png-->
                <a class="navbar-brand" href="index.php"><img src="../../importantes/logosalud1.png" alt="logo" style="max-height: 70px; max-width: 100px;"></a>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../inicio/'">Inicio</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Sobre nosotros</a>
                            <ul class="dropdown-menu" style="border-radius: 0.25rem;width:150px !important;text-align:center">
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../mision/'">Misión</a></li>
                                <!--mision.php EN EL HTACCESS LE QUITE LA EXTENSION-->
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../vision/'">Visión</a></li>
                                <!--vision.php-->
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../organigrama/'">Organigrama</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">De interés</a>
                            <ul class="dropdown-menu" style="border-radius: 0.25rem;">
                                <li id="gali"><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../pgaleria/?pg=1'">Galería</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../telefonos/'" >Teléfonos</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../jefesdesector/'" >Jefes de sector</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../reddepostas/'">Red de postas</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../LibroRSF/'">Libro R.S.F</a></li>
                                <li><a class="dropdown-item" href="https://deis.minsal.cl/" target="_blank">Estadística de salud</a></li>
                                <!-- <li><a class="dropdown-item" href="javascript:void(0)">Plan paso a paso</a></li> -->
                            </ul>
                        </li>

                        <li class="nav-item" id="sectores">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../sectores/'">Sectores</a>
                        </li>

                        <li class="nav-item" id="programas">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../programas/'">Programas</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Planes</a>
                            <ul class="dropdown-menu" style="border-radius: 0.25rem;">
                                <li id="planauge"><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../planauge/'">Plan Auge</a></li>
                                <li id="plancancer"><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../plannacionaldecancer/'" >Plan Nacional de cáncer</a></li>
                            </ul>
                        </li>

                        <li class="nav-item" id="noticias">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../noticias/'">Noticias</a>
                        </li>

                        <li class="nav-item" id="saludbucal">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../saludbucal/'">Salud bucal</a>
                        </li>

                        <li class="nav-item" id="farmaciaenlinea">
                            <a class="nav-link" href="javascript:void(0)" onclick="window.open('../farmaciaenlinea/', '_blank')">Farmacia en linea</a>
                        </li>

                        <!-- <li class="nav-item" id="covid19">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../covid19/'">Covid-19</a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">Covid-19</a>
                            <ul class="dropdown-menu" style="border-radius: 0.25rem;">
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../covid19/'">Covid-19</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="location.href='../planpasoapaso/'">Plan paso a paso</a></li>
                            </ul>
                        </li>

                        <li class="nav-item" id="contactanos">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../contacto/'">Contáctanos</a>
                        </li>
                        
                        <?php if ($sesion_iniciada) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../indice/">Volver al sistema</a>
                            </li>
                        <?php } ?>

                        <?php if (!$sesion_iniciada) { ?>
                            <!--Mostrar esta pestaña login sólo si la sesion no esta iniciada, si se inicia la sesion desaparece la pestaña -->
                            <li class="nav-item" id="login">
                                <a class="nav-link" href="javascript:void(0)" onclick="location.href='../login/'">Intranet</a>
                            </li>
                        <?php } ?>


                        <!--Alerta de mensajes nuevos-->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                 Counter - Alerts
                                <sup><span class="badge badge-danger badge-counter">+3</span></sup>
                            </a>
                             Dropdown - Alerts 

                            el border-color del .header .dropdown-menu  en style.css me estaba generando ese espacio que se veia blanco
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" style="border-radius: 0.35rem; border:0">
                               <h6 class="dropdown-header" style="background-color:red;border-color:red;color: #fff;font-family: 'Poppins', serif !important;text-transform: uppercase !important;font-weight: 800;font-size: .65rem;display:block;">
                                    Centro de alertas
                                </h6>
                            

                            </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <i style="color: #00b7e5" class="fa fa-circle" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <div class="small text-gray-200">Noviembre 11, 2020</div>
                                        ¿Hola Ignacio que tal?
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <i style="color: #00b7e5" class="fa fa-circle" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <div class="small text-gray-200">Noviembre 1, 2020</div>
                                       Estimado Documento enviado
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <i style="color: #00b7e5" class="fa fa-circle" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <div class="small text-gray-200">Octubre 13, 2020</div>
                                        Informe de medicamentos
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-200" href="micuenta.php">Mostrar todo</a>
                            </div>
                        </li> -->

                    </ul>

                    <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="form-inline my-2 my-lg-0 btn-buscar-noticia">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar" id="inputbuscar" onkeypress="return validainput(event)" onpaste="return false" autocomplete="off">
                            <button class="btn btn-danger my-2 my-sm-0" id="botonbuscar"><i class="fa fa-search"></i></button>
                        </li>
                    </ul>


                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->


    <?php
    $sqlnavbarnoticia = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,im.id_articulo,im.nombre_imagen_articulo, a.titulo_articulo, a.descripcion_articulo,a.fecha_articulo ,cat.nombre_categoria_articulo FROM articulo a, imagen_articulo im, categoria_articulo cat WHERE a.id_articulo=im.id_articulo and a.id_categoria_articulo=cat.id_categoria_articulo ORDER BY a.id_articulo DESC");
    $sqlnavbarsaludbucal = mysqli_query($mysqli, "SELECT id_articulo_odonto,titulo_articulo_odonto,descripcion_articulo_odonto, archivo_articulo_odonto, estado_articulo_odonto FROM articulo_odonto WHERE estado_articulo_odonto='visible' ORDER BY id_articulo_odonto DESC");
    $vervacio_noticia = mysqli_num_rows($sqlnavbarnoticia);
    $vervacio_saludbucal = mysqli_num_rows($sqlnavbarsaludbucal);

    if ($vervacio_noticia == 0 || $vervacio_noticia == '') {
        echo '<script language="javascript">document.getElementById("noticias").style.display = "none"; </script>';
    }
    if ($vervacio_saludbucal == 0 || $vervacio_saludbucal == '') {
        echo '<script language="javascript">document.getElementById("saludbucal").style.display = "none"; </script>';
    }

    ?>
    <script>
        function validainput(e) {
            key = e.keycode || e.which;
            teclado = String.fromCharCode(key).toLowerCase();
            letras = " 1234567890abcdefghijklmnñopqrstuvwxyzáéíóú@."; //es lo que se permite en el input cuando se presiona el teclado (keypress)
            especiales = "8-37-38-39-46-164";
            teclado_especial = false;

            if (letras.indexOf(teclado) === -1 && !teclado_especial) {
                return false;
            }
        }
    </script>


    <script>
        $("#botonbuscar").click(activarFiltroBusqueda); // si se apreta el boton buscar se activa el filtro de busqueda

        $('#inputbuscar').on('keydown', function(ev) { //si en el input se apreta enter se activa el filtro de busqueda
            if (ev.key === 'Enter') {
                activarFiltroBusqueda();
            }
        });

        function activarFiltroBusqueda() {
            var myUrl = window.location.href; // se obtiene la  url
            console.log("URL 1: " + myUrl);

            let var1 = myUrl.split('proyecto/');
            myUrl = myUrl.replace(var1[1], 'noticias/?pg=1'); //el var1[1] toma el valor ej: /mision
            //console.log("URL 2: " + myUrl);

            var url = new URL(myUrl);
            var search_params = url.searchParams; //parámetro recibido por get, en este caso pg=1
            let busqueda = $('#inputbuscar').val();

            if (busqueda !== '') { //Si el input es distinto de vacio
                search_params.set('ba', busqueda); // le agrego el parámetro &
                url.search = search_params.toString(); //le agrego el parámetro ?pg=1&ba=valordelinput
                new_url = url.toString(); //obtengo la nueva url completa
                window.location = new_url; //redirijo a la url completa ej: http://localhost/TESIS/tesis/proyecto/noticias/?pg=1&ba=valordelinput
            }
        }
    </script>



<!-- </div> -->


    <!-- <script src="js/jquery.min.js"></script> -->