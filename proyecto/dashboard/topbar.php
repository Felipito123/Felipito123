<?php
$sesion_iniciada = false;
$usuario = null;
if (isset($_SESSION['sesionCESFAM'])) {
    $sesion_iniciada = true;
    $usuario = $_SESSION['sesionCESFAM'];

    if (isset($_SESSION['sesionCESFAM']['id_rol'])) {
        $rol = $_SESSION['sesionCESFAM']['id_rol'];
        $id = $_SESSION['sesionCESFAM']['rut'];
    }
}

/*COOKIE PARA EL TEMA */

if (isset($_COOKIE['color'])) {
    $temadelacookie = $_COOKIE['color'];
} else {
    $temadelacookie = 'primary'; //valor por defecto
}

?>


<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id="navTopbar">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <!--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar como..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>-->

    <!--<span class="badge badge-warning m-1" id="diadesemana" style="color: white"></span>-->
    <span class="badge badge-<?php echo $temadelacookie ?> m-1" id="fecha" style="color: white"></span>
    <!--  <span class="badge badge-warning m-1" id="hora" style="color: white"></span>-->




    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> -->

        <?php if ($sesion_iniciada) { ?>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $usuario['nombre_usuario']; ?></span>
                    <img class="img-profile rounded-circle" id="imagenpequena2" src="">
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                    <a class="dropdown-item" href="../perfil">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Perfil
                    </a>
                    <label class="dropdown-item" data-toggle="modal" data-target="#modaltemaconcookie">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Tema
                    </label>
                    <div class="dropdown-divider"></div>

                    <label class="dropdown-item" onclick="funcioncerrar()">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cerrar Sesión
                    </label>

                </div>
            </li>
        <?php } ?>

        <!-- <i class="fas fa-envelope-square"></i>
        <span class="badge badge-success">CORREO</span> -->
        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link" href="www.google.com">
                <i class="fas fa-envelope fa-fw">as</i>
            </a>
        </li> -->


        <div id="visualizar"></div>

        <li class="nav-item dropdown no-arrow" id="iconocorreo" title="Gmail">
            <a class="nav-link" onclick="window.open('https://mail.google.com/mail/u','_blank')">
                <i class="fas fa-envelope fa-fw " style="color: #6ed9e6;"></i>
            </a>
        </li>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#ambulancia">
                <!-- TAMBIÉN FUNCIONA ASÍ -> href="#ambulancia" data-toggle="modal" -->
                <!-- TAMBIÉN FUNCIONA ASÍ -> href="javascript:void(0);"  onclick="abrirmodalAmbulancia();" -->
                <i class="fas fa-ambulance fa-fw" id="iconoambulancia" style="color: #ffc107;"></i>
            </a>
        </li>

        <li class="nav-item dropdown no-arrow" id="iconoradio" title="Radio">
            <a class="nav-link" onclick="window.open('../radiointegrado/','newWin','width=400, height=700')">
                <!-- <i class="fa fa-radio fa-fw " style="color: #6ed9e6;"></i> -->
                <lord-icon src="https://cdn.lordicon.com/soryfkft.json" trigger="loop" colors="primary:#858796,secondary:#858796" style="width:30px;height:30px"></lord-icon>
            </a>
        </li>



        <!--  TIPOS DE EFECTOS EN EL MODAL 
                        data-easein="bounce"
                        data-easein="bounceIn"
                        data-easein="bounceUpIn"
                        data-easein="bounceDownIn"
                        data-easein="bounceLeftIn"
                        data-easein="bounceRightIn"
                        data-easein="flash"
                        data-easein="fadeIn"
                        data-easein="flipXIn"
                        data-easein="flipYIn"
                        data-easein="flipBounceXIn"
                        data-easein="flipBounceYIn"
                        data-easein="swoopIn"
                        data-easein="whirlIn"
                        data-easein="shrinkIn"
                        data-easein="expandIn"
                        data-easein="slideUpIn"
                        data-easein="slideDownIn"
                        data-easein="slideLeftIn"
                        data-easein="slideRightIn"
                        data-easein="slideUpBigIn"
                        data-easein="slideDownBigIn"
                        data-easein="slideLeftBigIn"
                        data-easein="slideRightBigIn"
                        data-easein="perspectiveUpIn"
                        data-easein="perspectiveDownIn"
                        data-easein="perspectiveLeftIn"
                        data-easein="perspectiveRightIn"
                        data-easein="shake"
                        data-easein="tada"
                        data-easein="swing"
                        data-easein="pulse" 
                    -->

        <style>
            .btn_blanco_modal,
            .btn_azul_modal {
                border: none;
                border-radius: 2px;
                display: inline-block;
                color: #424242;
                background-color: #FFF;
                text-align: center;
                height: 36px;
                line-height: 36px;
                outline: 0;
                padding: 0 2rem;
                vertical-align: middle;
                -webkit-tap-highlight-color: transparent;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                letter-spacing: .5px;
                transition: .2s ease-out;
            }

            .btn_blanco_modal:hover {
                background-color: #FFF;
                color: #000;
                box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
            }

            .btn_azul_modal {
                color: #FFF;
                background-color: #2980B9 !important;
                /* border: none !important; */
                outline: none !important;
            }

            .btn_azul_modal:hover {
                background-color: #2980B9 !important;
                color: #FFF;
                box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
                /* border: none !important; */
                outline: none !important;
            }

            .btn_azul_modal:active {
                outline: none !important;
            }

            /* @media (max-width: 360px) {
                #fecha {
                    display: none;
                }
            } */
        </style>

        <div id="ambulancia" class="modal text-left" data-easein="flipBounceXIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="font-family: 'Roboto', sans-serif;">
                <div class="modal-content" style="border: none;border-radius: 2px;box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);">
                    <div class="modal-header" style="padding-top: 15px;padding-right: 26px;padding-left: 26px;padding-bottom: 0px;border-bottom: 0;">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-size: 34px; color:#333;">Título del Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter: alpha(opacity=20);opacity: .2;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border-bottom: 0;padding-top: 5px;padding-right: 26px;padding-left: 26px;padding-bottom: 10px;font-size: 15px;">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="modal-footer" style="border-top:0;padding-top: 0px;padding-right:26px;padding-bottom:26px;padding-left:26px;">
                        <button class="btn btn_blanco_modal" data-dismiss="modal" aria-hidden="true">
                            Cerrar
                        </button>
                        <button class="btn btn_azul_modal">
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal text-left" data-easein="flipBounceXIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="font-family: 'Roboto', sans-serif;">
                <div class="modal-content" style="border: none;border-radius: 2px;box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);">
                    <div class="modal-header" style="padding-top: 15px;padding-right: 26px;padding-left: 26px;padding-bottom: 0px;border-bottom: 0;">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-size: 34px; color:#333;">Título del Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter: alpha(opacity=20);opacity: .2;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border-bottom: 0;padding-top: 5px;padding-right: 26px;padding-left: 26px;padding-bottom: 10px;font-size: 15px;">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="modal-footer" style="border-top:0;padding-top: 0px;padding-right:26px;padding-bottom:26px;padding-left:26px;">
                        <button class="btn btn_blanco_modal" data-dismiss="modal" aria-hidden="true">
                            Cerrar
                        </button>
                        <button class="btn btn_azul_modal">
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include '../partes/modal/modal_menu_navegacion.php';
        ?>

        <!-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
            
                <span class="badge badge-danger badge-counter">7</span>
            </a>
        
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="javascript:void(0);">Read More Messages</a>
            </div>
        </li> -->

        <div class="topbar-divider d-none d-sm-block"></div>


        <?php if ($sesion_iniciada) { ?>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $usuario['nombre_usuario']; ?></span>
                    <img class="img-profile rounded-circle" id="imagenpequena1" src="">
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                    <a class="dropdown-item" href="../perfil">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Perfil
                    </a>
                    <label class="dropdown-item" data-toggle="modal" data-target="#modaltemaconcookie">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Tema
                    </label>
                    <div class="dropdown-divider"></div>

                    <label class="dropdown-item" onclick="funcioncerrar()">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cerrar Sesión
                    </label>

                </div>
            </li>


        <?php } ?>

    </ul>

</nav>
<!-- End of Topbar -->

<script src="../js/alertas.js"></script>


<script>
    // function recarga() {
    let fechactual = new Date();
    let anoactual = fechactual.getFullYear(); //Año
    let diasemana = new Array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado');
    let nombremes = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    let dia = diasemana[fechactual.getDay()]; //nombre del dia de la semana
    let mes = nombremes[fechactual.getMonth()];
    let numerodeldia = fechactual.getDate();
    let horas = fechactual.getHours();
    let minutos = fechactual.getMinutes();
    let segundos = fechactual.getSeconds();

    // $('#diadesemana').html(dia);
    $('#fecha').html(numerodeldia + ' de ' + mes + ' del ' + anoactual);

    // $('#hora').html(horas + ':' + minutos + ':' + segundos);
    //}

    // setInterval(recarga, 1000);
</script>

<script>
    //SCRIPT PARA LA IMAGEN PEQUEÑA
    function imagenpequena() {
        $.getJSON('../perfil/funciones/fun_llenar_editar_perfil.php', function(data) {
            if (data[0].NOMBREIMAGEN == '' || data[0].NOMBREIMAGEN == null) {
                $('#imagenpequena1').attr('src', '../../imgpordefecto/no-imagen.jpg'); //attr sustituye el src de la imagen
                $('#imagenpequena2').attr('src', '../../imgpordefecto/no-imagen.jpg'); //attr sustituye el src de la imagen
            } else {
                let comprobarDirectorio = new Request('../perfil/fotodeperfiles/' + data[0].RUT + '/' + data[0].NOMBREIMAGEN);
                fetch(comprobarDirectorio).then(function(respuesta) {
                    //console.log(respuesta.status); // returns 200
                    if (respuesta.status == 200) {
                        $('#imagenpequena1').attr('src', '../perfil/fotodeperfiles/' + data[0].RUT + '/' + data[0].NOMBREIMAGEN);
                        $('#imagenpequena2').attr('src', '../perfil/fotodeperfiles/' + data[0].RUT + '/' + data[0].NOMBREIMAGEN);
                    } else {
                        $('#imagenpequena1').attr('src', '../../imgpordefecto/no-imagen.jpg');
                        $('#imagenpequena2').attr('src', '../../imgpordefecto/no-imagen.jpg');
                    }
                }).catch(function(error) {
                    console.log(error);
                });
            }
        });
    }
    imagenpequena();
</script>

<script>
    function e(q) {
        document.body.appendChild(document.createTextNode(q));
        document.body.appendChild(document.createElement("BR"));
    }

    function inactividad() {
        //alert("Inactivo pos hombre!!");

        $.post('../funcionesphp/fun_ocultar_item_navbar.php', {
            opciontres: 3
        }, function(response) {
            if (response == 5) { //Existe la sesion
                location.href = "../funcionesphp/cerrarsesion.php";
            } else { //No existe la sesion
                console.log("No existe la sesion");
            }
        });
    }

    var t = null;

    function contadorInactividad() { //1000 milisegundo= 1 segundo -- 10000= 10 segundos -- 60000=1 minuto -- 600000=10minutos
        t = setTimeout("inactividad()", 900000); //900000 milisegundos= POR 15 MINUTOS DE INACTIVIDAD SIN MOVER EL MOUSE SE CIERRA LA SESION AUTOMATICAMENTE 
    }
    window.onblur = window.onmousemove = function() {
        if (t) clearTimeout(t);
        contadorInactividad();
    }
</script>


<script>
    function funcioncerrar() {
        Swal.fire({
            title: 'Espere un momento...',
            html: 'Cerrando sesion  <b></b>',
            timer: 1500,
            timerProgressBar: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading()
            }
        }).then((result) => {

            if (result.dismiss === Swal.DismissReason.timer) {
                // console.log('Ha cerrado session');
                window.location.href = '../funcionesphp/cerrarsesion.php';

            }
        });
    }
</script>

<script>
    //FUNCION QUE MUESTRA EL HORARIO ADEMÁS DE LOS NAVBAR ITEM
    $(document).ready(function() {
        mueveReloj();

        function mueveReloj() {
            momentoActual = new Date();
            hora = ('0' + momentoActual.getHours()).slice(-2);
            minuto = ('0' + momentoActual.getMinutes()).slice(-2);
            segundo = ('0' + momentoActual.getSeconds()).slice(-2);
            horaImprimible = hora + " : " + minuto + " : " + segundo;
            $('#horaenlinea').text(horaImprimible);
            // document.reloj.value = horaImprimible;
            //La función se tendrá que llamar así misma para que sea dinámica, 
            //de esta forma:
            setTimeout(mueveReloj, 1000);
        }
    });


    function moverFlechaSubmenu(valor) {
        $("#" + valor).toggleClass("fa fa-angle-down text-white fa fa-angle-up text-white");
        // alertify.success("Pase por aqui");
    }
</script>


<div class="modal fade top" id="modaltemaconcookie" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-frame modal-top">
        <div class="modal-content">
            <div class="modal-body py-1">
                <div class="d-flex justify-content-center align-items-center my-3">
                    <div class="row justify-content-center col-3">
                        <h4>
                            <span class="badgenuevo bgnuevo-primary">Tema:</span>
                        </h4>
                        <p class="mx-4">
                            Escoga un tema para el sistema.<strong><br> ¡Solo haz click y Listo <i class="fas fa-thumbs-up" style="color: #fdba33;"></i>!</strong>
                        </p>
                    </div>
                    <div class="row justify-content-center col-9">
                        <div class="col"><label onclick="opcion('primary');" class="btnnuevo-primary btnnuevo btn-block">&nbsp;</label></div>
                        <div class="col"><label onclick="opcion('danger');" class="btnnuevo-danger btnnuevo btn-block">&nbsp;</label></div>
                        <div class="col"><label onclick="opcion('warning');" class="btnnuevo-warning btnnuevo btn-block">&nbsp;</label></div>
                        <div class="col"><label onclick="opcion('info');" class="btnnuevo-info btnnuevo btn-block">&nbsp;</label></div>
                        <div class="col"><label onclick="opcion('success');" class="btnnuevo-success btnnuevo btn-block">&nbsp;</label></div>
                        <div class="col"><label onclick="opcion('dark');" class="btnnuevo-dark btnnuevo btn-block">&nbsp;</label></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function opcion(color) {
        // alertify.success("valor: " + color);
        var fecha = new Date();
        var time = fecha.getTime();
        var añadirtiempo = 60 * 60 * 24 * 30 * 12; // 60 s * 60 min (1 hora) *24h (1 dia) * 30 (1 mes) * 12meses (1 año) | otro Ej: 5 minutos = 60*5
        var expiracion = time + (1000 * añadirtiempo);
        fecha.setTime(expiracion);
        document.cookie = "color=" + color + ";expires=" + fecha.toGMTString() + ';path=/'; //Este formato tiene 3 horas añadidas pero funciona igual

        //window.location.reload(); 

        //LUEGO QUE SETEO LA COOKIE CON EL COLOR, DE MANERA LOCAL NO SE SETEA HASTA RECARGAR LA PÁGINA
        //ES POR ESO QUE DE MANERA LOCAL LE CAMBIO EL COLOR, REEMPLAZANDO(replace) LA CLASE DE LOS COLORES DEL Ej:badge-warning y Ej:bg-gradient-success
        //Y DESPUES CON PHP CUANDO SE RECARGUE TOMARÁ AUTAMICAMENTE EL COLOR DE LA COOKIE

        let v1 = document.getElementById('fecha').className;
        let v2 = v1.split(" ");
        let e = document.getElementById("fecha").className = document.getElementById("fecha").className.replace(v2[1], 'badge-' + color); // /(?:^|\s)badge-warning(?!\S)/g

        /* 
        --------------------------------------------------------NOTA---------------------------------------------------
        console.log("color de la fecha del topbar:" + e2); 
        si miras la clase que contiene la fecha en el inspeccionador, 
        te darás cuenta que va reemplazando la clase especifica Ej: badge-success por la que estoy cambiando en el swal
        --------------------------------------------------------NOTA---------------------------------------------------*/

        let v3 = document.getElementById('accordionSidebar').className;
        let v4 = v3.split(" ");
        let e2 = document.getElementById("accordionSidebar").className = document.getElementById("accordionSidebar").className.replace(v4[1], 'bg-gradient-' + color);
        // console.log("color de la sidebar:" + e2); 

        // $('#modaltemaconcookie').hide();
        $('#modaltemaconcookie').modal('hide');
    }
</script>