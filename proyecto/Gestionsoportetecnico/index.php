<?php session_start();
$usuario;
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE SÓLO ESTE INICIADO SESIÓN...ESTA PÁGINA SÓLO LA PUEDE VER EL ENC DE SOPORTE TECNICO
    $usuario = $_SESSION['sesionCESFAM'];
    if (isset($rol) && $rol != 22) {
        header("Location:../indice/");
    }
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>

<?php
// include '../funcionesphp/detectarNavegadoreIP.php';
// $infoNav = detectanavegador();
// echo "Sistema operativo: " . $infoNav["os"] . '</br>';
// echo "Navegador: " . $infoNav["browser"] . '</br>';
// echo "Versión: " . $infoNav["version"] . '</br>';
?>

<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>
<title>Salud los Álamos - Gestión Soporte Técnico </title>
<style>
    #content {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%2300697b'/%3E%3Cstop offset='1' stop-color='%2306a4b7'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%23868686'/%3E%3Cstop offset='0.09' stop-color='%23ababab'/%3E%3Cstop offset='0.18' stop-color='%23c4c4c4'/%3E%3Cstop offset='0.31' stop-color='%23d7d7d7'/%3E%3Cstop offset='0.44' stop-color='%23e5e5e5'/%3E%3Cstop offset='0.59' stop-color='%23f1f1f1'/%3E%3Cstop offset='0.75' stop-color='%23f9f9f9'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='.5' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: top left;
    }

    .scroll {
        max-height: 750px;
        overflow-y: auto;
    }

    .scrollmsj {
        max-width: 550px;
        overflow-x: auto;
    }

    #modalbody::-webkit-scrollbar {
        width: 7px;
        background-color: #F5F5F5;
    }

    #modalbody::-webkit-scrollbar-thumb {
        background-color: #36b9cc;
        border-radius: 10px;
    }

    /* 
    PÁGINA PARA VER FONDOS 
    https://www.svgbackgrounds.com/#confetti-doodles */


    /*AVATAR CIRCULAR DE LAS IMAGENES CON EL CIRCULO DE EN LINA Y FUERA DE LINEA DEL CHAT*/
    .avatar {
        position: relative;
        white-space: nowrap;
        border-radius: 50%;
        vertical-align: middle;
        height: 50px;
        width: 50px;
        cursor: pointer;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .avatar .badge-up {
        position: absolute;
        right: -8px;
        top: -8px
    }

    .avatar[class*=avatar-] i {
        border-radius: 50%;
        width: 11px;
        height: 11px;
        position: absolute;
        right: -2px;
        bottom: 0;
        border: 1px solid #FFF
    }

    .avatar.avatar-offline i {
        background-color: #e84118
    }

    .avatar.avatar-online i {
        background-color: #16D39A
    }

    .avatar img {
        width: 100%;
        max-width: 100%;
        height: auto;
        border: 0;
        border-radius: 50%
    }

    .avatar.avatar-xl {
        width: 70px;
        height: 70px;
        font-size: 1.5rem
    }

    .avatar.avatar-xl[class*=avatar-] i {
        width: 20px;
        height: 20px
    }

    .avatar.avatar-lg {
        width: 50px;
        height: 50px;
        font-size: 1.2rem
    }

    .avatar.avatar-lg[class*=avatar-] i {
        width: 15px;
        height: 15px
    }

    .avatar.avatar-sm {
        width: 24px;
        height: 24px;
        font-size: 1rem
    }

    .avatar.avatar-sm[class*=avatar-] i {
        width: 7px;
        height: 7px
    }

    /*PARA CENTRAR EL ICONO DEL MODAL DEL HISTORIAL*/
    .card-icon {
        overflow: hidden;
    }

    .card-icon .card-icon-aside {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        padding: 2rem;
    }

    .card-icon .card-icon-aside i,
    .card-icon .card-icon-aside svg,
    .card-icon .card-icon-aside .feather {
        height: 3rem;
        width: 3rem;
    }

    /*Para enumerar con un circulo en el card*/
    .numberCircle {
        font: 32px Arial, sans-serif;
        width: 2em;
        height: 2em;
        box-sizing: initial;
        background: #fff;
        border: 0.1em solid #36b9cc;
        color: #36b9cc;
        text-align: center;
        border-radius: 50%;
        line-height: 2em;
        box-sizing: content-box;
    }

    /*ANIMACION FADE*/

    .fadeIne {
        animation: fadeIn 4s;
        -webkit-animation: fadeIn 4s;
        -moz-animation: fadeIn 4s;
        -o-animation: fadeIn 4s;
        -ms-animation: fadeIn 4s;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-moz-keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-o-keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-ms-keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /*EL ANCHO DE LA TABLA*/
    .table th {
        padding: 0.25rem !important;
    }
</style>
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>


                <div class="container-fluid" style="padding-bottom: 25px;">

                    <div class="row justify-content-center pt-3 pb-3">
                        <div class="col-xl-4 col-sm-6 mb-lg-0">
                            <!-- Card-->
                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-0">
                                    <div class="px-5 py-3 text-center card-img-top" style="background-color: #36b9cc;"><span class="mb-2 d-block mx-auto">

                                            <i class="fas fa-comments" style="font-size: 55px;color:white;"></i>

                                        </span>
                                        <h5 class="text-white mb-0"> Gestión de Soporte Técnico</h5>
                                        <p class="small text-white mb-0 pt-1">
                                            En este módulo podrá ayudar al funcionario(a) por medio de un chat, <br>
                                            en el que podrá enseñar los pasos para solucionar el problema.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-xl-7 col-sm-12">
                            <div class="row">

                                <div class="col-xl-6 col-sm-6 mb-4"></div>

                                <div class="col-xl-3 col-sm-6 mb-4">
                                    <div class="card border-left-secondary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"> Fuera de linea</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-circle fa-2x" style="color: #858796 !important;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-3 col-sm-6 mb-4">
                                    <div class="card shadow h-100 py-2" style="border-right: 4px solid #36b9cc;">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"> En linea</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-circle fa-2x" style="color: #36b9cc !important;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-xl-6 col-sm-12 pb-3">

                            <div class="row justify-content-center rounded-lg shadow-sm" style="background-color: #f5f7fd;" id="contenidodelpanel">

                                <div class="col-xl-12 text-center pb-2">
                                    <lord-icon src="https://cdn.lordicon.com/pndvzexs.json" trigger="loop" colors="primary:#858796,secondary:#858796" style="width:100px;height:100px">
                                    </lord-icon>
                                </div>

                                <div class="col-xl-12 text-center pb-2">
                                    <p class="card-text text-secondary">Para visualizar el panel con los datos de seguimiento, presione el botón <strong> Seguimiento </strong> de la tabla.</p>
                                </div>

                                <!-- <div class="col-xl-6 pb-2">
                                            <div class="card card-icon shadow-sm">
                                            <div class="row">
                                            <div class="col-sm-5 card-icon-aside bg-primary">
                                            <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:70px;height:70px">
                                            </lord-icon>
                                            </div>
                                            <div class="col-sm-7">
                                            <div class="card-body py-5">
                                            <h5 class="card-title text-center">2</h5>
                                            <p class="card-text">Chart.js is a third party plugin that is used to generate the charts in this template. </p>
                                            <a class="btn btn-primary btn-sm" href="https://www.chartjs.org/docs/latest/" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link me-1">
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                            <polyline points="15 3 21 3 21 9"></polyline>
                                            <line x1="10" y1="14" x2="21" y2="3"></line>
                                            </svg>
                                            Visit Chart.js Docs
                                            </a>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                    </div> 
                                        -->

                            </div>

                        </div>

                        <div class="col-xl-6 col-sm-12">

                            <div class="card rounded shadow-sm border-left-0 border-right-0 " style="border-top: 6px solid #36b9cc;">

                                <div class="card-body p-2">

                                    <div class="row justify-content-between text-left pl-2">
                                        <div class="col-xl-12 col-sm-12">
                                            <label class="form-control-label" style="font-weight: 300;font-size:20px">Mensajes recibidos</label>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="card shadow-sm mb-4 pb-2">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="tabla_gestion_soporte_tecnico" class="table">
                                                            <thead class="text-center" style="background-color: #36b9cc;color:white;">
                                                                <tr>
                                                                    <th scope="col" title="Estado">ESTADO</th>
                                                                    <th scope="col" title="Imagen">IMAGEN</th>
                                                                    <th scope="col" title="R.U.T">R.U.T</th>
                                                                    <th scope="col" title="Nombre">NOMBRE</th>
                                                                    <th scope="col" title="Acciones">ACCIONES</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-center">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="modalchat" class="modal text-left" data-easein="bounceUpIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" style="font-family: 'Roboto', sans-serif;">
                            <div class="modal-content" style="border: none;border-radius: 2px;box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);">
                                <div class="modal-header" style="padding-top: 15px;padding-right: 26px;padding-left: 26px;padding-bottom: 0px;border-bottom: 0;">
                                    <h4 class="modal-title text-secondary" style="font-size: 20px;">
                                        <!-- <i class="fas fa-comment-alt flip"></i> -->
                                        <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:50px;height:50px"></lord-icon>
                                        Chat de soporte técnico
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter: alpha(opacity=20);opacity: .2;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body scroll" id="modalbody" style="border-bottom: 0;padding-top: 5px;padding-right: 26px;padding-left: 26px;padding-bottom: 10px;font-size: 15px;">
                                    <!-- <div class="row justify-content-between text-left pl-2">
                                        <div class="col-xl-12 col-sm-12">
                                            <label class="form-control-label" style="font-weight: 300;font-size:20px">Chat asistencia técnica </label>
                                        </div>
                                    </div> -->
                                    <div class="card row justify-content-center rounded-lg shadow-sm">
                                        <!-- Chat Box-->
                                        <div class="col-xl-12 px-0">

                                            <div class="px-4 py-5 chat-box bg-white" id="contenidomensajes">

                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <div class="modal-footer" style="border:0;padding-top: 0px;padding-right:26px;padding-bottom:26px;padding-left:26px;">
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10 col-sm-12">
                                                <div class="card border-0 p-3">
                                                    <form id="formComentar" method="POST" autocomplete="off" class="bg-light ml-1 mr-1">
                                                        <input type="hidden" name="rutaenviarmensaje" id="rutaenviarmensaje">
                                                        <div class="input-group">
                                                            <input type="text" id="comentarioasoporte" placeholder="Escribe un mensaje..." aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s!$%(),-./:;_¿?]+" onkeypress="return soloCaractDeConversacion(event)" required>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-secondary"> <i class="fa fa-camera"></i></button>
                                                                <!-- <button type="button" class="btn btn-secondary"> <i class="fa fa-paperclip"></i></button> -->
                                                                <button type="submit" id="botonenviarcomentario" class="btn btn-info rounded-right" onclick="vibrapo()"> <i class="fa fa-paper-plane"></i> Enviar</button>
                                                                <div class="p-2 bg-white" style="color:transparent;"></div>
                                                                <button type="button" class="btn btn-danger rounded btnscrol" style="display: none;"> <i class="fas fa-angle-down"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-xl-2 col-sm-12 pt-4">
                                                <button class="btn btn_blanco_modal" data-dismiss="modal" aria-hidden="true">
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div id="modalseguimiento" class="modal text-left" data-easein="bounceUpIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" style="font-family: 'Roboto', sans-serif;">
                            <div class="modal-content" style="border: none;border-radius: 2px;box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);">
                                <div class="modal-header" style="padding-top: 15px;padding-right: 26px;padding-left: 26px;padding-bottom: 0px;border-bottom: 0;">
                                    <h4 class="modal-title text-secondary" style="font-size: 20px;">
                                        <lord-icon src="https://cdn.lordicon.com/qghrdngw.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:50px;height:50px">
                                        </lord-icon>
                                        Seguimiento
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter: alpha(opacity=20);opacity: .2;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body scroll" style="border-bottom: 0;padding-top: 5px;padding-right: 26px;padding-left: 26px;padding-bottom: 10px;font-size: 15px;">

                                    <div class="row justify-content-center rounded-lg shadow-sm" style="background-color: #f5f7fd;">
                                        <div class="col-xl-12 px-0">

                                            <div class="row p-3">

                                                <div class="col-xl-6 pb-2">
                                                    <div class="card card-icon shadow">
                                                        <div class="row">
                                                            <div class="col-sm-5 card-icon-aside bg-info">
                                                                <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:70px;height:70px">
                                                                </lord-icon>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <div class="card-body text-center py-2">
                                                                    <h5 class="py-2"><label class="numberCircle">2</label></h5>
                                                                    <p class="card-text pt-1">Mensajes enviados</p>
                                                                    <hr class="col-7">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 pb-2">
                                                    <div class="card card-icon shadow">
                                                        <div class="row">
                                                            <div class="col-sm-7">
                                                                <div class="card-body text-center py-2">
                                                                    <h5 class="py-2"><label class="numberCircle">2</label></h5>
                                                                    <p class="card-text pt-1">Mensajes eliminados</p>
                                                                    <hr class="col-7">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5 card-icon-aside bg-info">
                                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:70px;height:70px">
                                                                </lord-icon>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12" style="padding-bottom: 30px;"></div>
                                                <div class="col-xl-4 col-sm-4 mb-4">
                                                    <div class="card bg-secondary text-white h-100">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="me-3">
                                                                    <div class="text-white-75 small">Navegadores utilizados</div>
                                                                    <div class="text-lg fw-bold">40.000 +</div>
                                                                </div>
                                                                <i class="fas fa-globe fa-2x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-4 mb-4">
                                                    <div class="card bg-secondary text-white h-100">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="me-3">
                                                                    <div class="text-white-75 small">Versiones de los navegadores</div>
                                                                    <div class="text-lg fw-bold">215,000 +</div>
                                                                </div>
                                                                <i class="fas fa-sort-numeric-up fa-2x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-4 mb-4">
                                                    <div class="card bg-secondary text-white h-100">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="me-3">
                                                                    <div class="text-white-75 small">Sistemas operativos utilizados</div>
                                                                    <div class="text-lg fw-bold">24 +</div>
                                                                </div>
                                                                <i class="fas fa-network-wired fa-2x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="border:0;padding-top: 0px;padding-right:26px;padding-bottom:26px;padding-left:26px;">
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-6 col-sm-12 pt-4 text-center">
                                                <button class="btn btn_blanco_modal" data-dismiss="modal" aria-hidden="true">
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->


                </div>
                <!--FIN DEL ROW -->
            </div>
            <!-- End of Content Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>
        <!-- End of Page Wrapper -->
    </div>




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#gestionsoportetecnico").attr('class', 'nav-item active');
    </script>



    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="js/GestSopTecn.js"></script>
    <script src="js/tablas.js"></script>

    <script>
        // function oprimeboton() {
        //     NotifTipoIntranet("Exito", "A presionado el botón", "success");
        // }

        function vibrapo() {
            navigator.vibrate(300); //un segundo
            // navigator.vibrate([1000, 500, 1000, 500, 2000]);
            // navigator.vibrate(0); // se detiene la vibración
        }
    </script>

    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


    <script>
        function mensajepordefecto() {
            $('#contenidodelpanel').html(`
            <div class="row fadeIne">
                <div class="col-xl-12 text-center pb-2">
                    <lord-icon src="https://cdn.lordicon.com/pndvzexs.json" trigger="loop" colors="primary:#858796,secondary:#858796" style="width:100px;height:100px">
                    </lord-icon>
                </div>

                <div class="col-xl-12 text-center pb-2">
                    <p class="card-text text-secondary">Para visualizar el panel con los datos de seguimiento, presione el botón <strong> Seguimiento </strong> de la tabla.</p>
                </div>
            </div>
            `);

            clearInterval(intervalo2);
        }
        var tet = null;

        function NcontadorInactividad() { //1000 milisegundo= 1 segundo -- 10000= 10 segundos -- 60000=1 minuto -- 600000=10minutos
            tet = setTimeout("mensajepordefecto()", 600000); //900000 milisegundos= POR 10 MINUTOS DE INACTIVIDAD SIN MOVER EL MOUSE SE CIERRA LA SESION AUTOMATICAMENTE 
        }
        window.onblur = window.onmousemove = function() {
            if (tet) clearTimeout(tet);
            NcontadorInactividad();
        }
    </script>


</body>

</html>