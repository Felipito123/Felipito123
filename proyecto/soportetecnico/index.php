<?php session_start();
$usuario;
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE SÓLO ESTE INICIADO SESIÓN
    $usuario = $_SESSION['sesionCESFAM'];
    if (isset($rol) && $rol != 22) {
    } else {
        header("Location:../indice/");
    }
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>

<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>
<title>Salud los Álamos - Soporte Técnico </title>
<style>
    #content {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%2300538c'/%3E%3Cstop offset='1' stop-color='%230081bf'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%23868686'/%3E%3Cstop offset='0.09' stop-color='%23ababab'/%3E%3Cstop offset='0.18' stop-color='%23c4c4c4'/%3E%3Cstop offset='0.31' stop-color='%23d7d7d7'/%3E%3Cstop offset='0.44' stop-color='%23e5e5e5'/%3E%3Cstop offset='0.59' stop-color='%23f1f1f1'/%3E%3Cstop offset='0.75' stop-color='%23f9f9f9'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='.5' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: top left;
    }

    .scroll {
        max-height: 750px;
        overflow-y: auto;
    }

    /* 
    PÁGINA PARA VER FONDOS 
    https://www.svgbackgrounds.com/#confetti-doodles */

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
        border: 0.1em solid #858796;
        color: #858796;
        text-align: center;
        border-radius: 50%;
        line-height: 2em;
        box-sizing: content-box;
    }

    .btn_azul {
        color: #fff;
        background-color: #1191d0;
        border-color: #1191d0;
    }

    .btn_azul:hover {
        color: #fff;
        background-color: #0f79ad;
        border-color: #0f79ad;
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
                                    <div class="px-5 py-3 text-center card-img-top" style="background-color: #1191d0;"><span class="mb-2 d-block mx-auto"><i class="fas fa-comments" style="font-size: 55px;color:white;"></i></span>
                                        <h5 class="text-white mb-0">Soporte Técnico</h5>
                                        <p class="small text-white mb-0">
                                            Le proporcionamos asistencia técnica si tiene algún problema. <br>
                                            Envíenos un mensaje y pronto estaremos resolviendo su necesidad. <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pb-3">

                        <div class="col-xl-6 col-sm-12 pb-3">
                            <div class="card" style="border-top: 5px solid #858796;">
                                <div class="card-body">
                                    <div class="row p-3">
                                        <div class="col-xl-6 pb-2">
                                            <div class="card card-icon shadow">
                                                <div class="row">
                                                    <div class="col-sm-5 card-icon-aside bg-secondary">
                                                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:70px;height:70px">
                                                        </lord-icon>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="card-body text-center py-2">
                                                            <h5 class="py-2"><label class="numberCircle" id="cant_msj_enviados">0</label></h5>
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
                                                            <h5 class="py-2"><label class="numberCircle" id="cant_msj_eliminados">0</label></h5>
                                                            <p class="card-text pt-1">Mensajes eliminados</p>
                                                            <hr class="col-7">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 card-icon-aside bg-secondary">
                                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:70px;height:70px">
                                                        </lord-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <div class="card" style="border-top: 5px solid #1191d0;">
                                <div class="card-body">


                                    <div class="row justify-content-between text-left pl-2">
                                        <div class="col-xl-12 col-sm-12">
                                            <label class="form-control-label" style="font-weight: 300;font-size:20px">Chat asistencia técnica </label>
                                        </div>
                                    </div>

                                    <!-- <div class="card shadow-sm">
                                        <div class="card-body scroll" id="cardbodyscroll"> -->

                                            <div class="row justify-content-center rounded-lg shadow-none p-2 scroll" id="cardbodyscroll"> <!--style="background-color: #f5f2ef;" -->
                                                <!-- Chat Box-->
                                                <div class="col-xl-12 "> <!-- bg-white-->
                                                    <div class="chat-box bg-white" id="contenidomensajes"></div>
                                                </div>
                                            </div>
                                        <!-- </div>
                                    </div> -->

                                    <div class="row justify-content-center pt-4">
                                        <div class="col-xl-10">
                                            <form id="formComentar" method="POST" autocomplete="off" class="bg-light ml-1 mr-1">
                                                <div class="input-group">
                                                    <input type="text" id="comentarioasoporte" placeholder="Escribe un mensaje..." aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s¡!$%(),-./:;_¿?]+" onkeypress="return soloSoporteTecnico(event)" minlength="2" maxlength="200" required>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-secondary"> <i class="fa fa-camera"></i></button>
                                                        <!-- <button type="button" class="btn btn-secondary"> <i class="fa fa-paperclip"></i></button> -->
                                                        <button type="submit" id="botonenviarcomentario" class="btn btn_azul rounded-right" onclick="vibrapo()"> <i class="fa fa-paper-plane"></i> Enviar</button>
                                                        <div class="p-2 bg-white" style="color:transparent;"></div>
                                                        <button type="button" class="btn btn-danger rounded btnscrol" style="display: none;"> <i class="fas fa-angle-down"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--FIN DEL ROW -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>




        <!-- Scroll to Top Button-->
        <!-- <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a> -->




        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#soportetecnico").attr('class', 'nav-item active');
        </script>


        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/SopTecn.js"></script>
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

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


</body>

</html>