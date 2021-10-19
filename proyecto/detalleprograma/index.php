<?php session_start();
include '../partes/head.php';
include '../partes/encriptacion.php';
include '../partes/llenadodetalleprograma.php';
?>
<title>Salud los Álamos - Programas</title>

<style>
    .card .card-image {
        height: 30%;
        /* width: 70%; */
        position: relative;
        overflow: hidden;
        /* margin-left: 120px;
        margin-right: 120px; */
        margin-top: 5px;
        border-radius: 6px;
        /* background-color: #ffff; */
        /* box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); */
    }

    .card .card-image img {
        height: 450px;
        width: 100%;
    }

    .badge_outline_rojo {
        color: #90bde4;
        border: 1px solid #90bde4;
        background-color: transparent;
    }

    .badge_outline_rojo:hover {
        color: white !important;
        background-color: #90bde4 !important;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .badge_outline_rojo_marcado {
        color: white !important;
        background-color: #90bde4 !important;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .badge_outline_rojo_marcado:hover {
        color: white !important;
        background-color: #90bde4 !important;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .clase_small {
        font-size: 11px;
    }
</style>
</head>

<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>


    <div class="container" style="padding-top:85px;padding-bottom:30px;">

        <header class="text-center pb-3">
            <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Progr<span style="color:#90bde4;">amas</span></h1>
            <div class="row justify-content-end pb-3">
                <a href="javascript:void(0)" onclick="location.href='../programas/'" class="btn btn-outline-primary btn-sm"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
            </div>
        </header>

        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow-sm py-2 border-0 pb-4" >
                    <!--shadow y sin border-0 es el otro diseño -->
                    <div class="card-image ml-2 mr-2 p-1">

                        <img class="img" src="
                            <?php
                            if (is_null($imagen) || empty($imagen)) {
                                echo "../../importantes/logocesfam2.png";
                            } else {
                                echo $imagen;
                            }

                            ?>
                        ">
                    </div>
                </div>

                <hr>

                <div class="card shadow-sm">

                    <div class="row text-center pt-2">
                        <div class="col-lg-12">
                            <h4>Todos los programas</h4>
                        </div>
                    </div>

                    <div class="row text-center pt-2 p-2">


                        <div class="col-lg-4 col-md-12 pb-2 pr-2">
                            <a href="./?dt=<?php echo encriptar("programadieciseis", "e"); ?>" class="badge badge-pill <?php ($identificador == "programadieciseis") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> PAPNAJ </small></a>
                        </div>

                        <div class="col-lg-4 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programadiecisiete", "e"); ?>" class="badge badge-pill <?php ($identificador == "programadiecisiete") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> ERA Y TBC </small></a>
                        </div>

                        <div class="col-lg-4 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programauno", "e"); ?>" class="badge badge-pill <?php ($identificador == "programauno") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> Farmacia </small></a>
                        </div>

                        <div class="col-lg-9 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programados", "e"); ?>" class="badge badge-pill <?php ($identificador == "programados") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> SALA DE NEUROREHABILITACIÓN </small></a>
                        </div>

                        <div class="col-lg-4 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programatres", "e"); ?>" class="badge badge-pill <?php ($identificador == "programatres") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> PASMI </small></a>
                        </div>

                        <div class="col-lg-3 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programadoce", "e"); ?>" class="badge badge-pill <?php ($identificador == "programadoce") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> PAD Y CP </small></a>
                        </div>

                        <div class="col-lg-5 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programacatorce", "e"); ?>" class="badge badge-pill <?php ($identificador == "programacatorce") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> PNAC PACAM </small></a>
                        </div>

                        <div class="col-lg-6 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programaseis", "e"); ?>" class="badge badge-pill <?php ($identificador == "programaseis") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> ELIGE VIDA SANA </small></a>
                        </div>

                        <div class="col-lg-5 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programasiete", "e"); ?>" class="badge badge-pill <?php ($identificador == "programasiete") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> IMAGENOLOGÍA </small></a>
                        </div>

                        <div class="col-lg-7 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programanueve", "e"); ?>" class="badge badge-pill <?php ($identificador == "programanueve") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> PROGRAMA CARDIOVASCULAR </small></a>
                        </div>

                        <div class="col-lg-5 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programatrece", "e"); ?>" class="badge badge-pill <?php ($identificador == "programatrece") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> SALUD FAMILIAR </small></a>
                        </div>

                        <div class="col-lg-9 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programadiez", "e"); ?>" class="badge badge-pill <?php ($identificador == "programadiez") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> PROGRAMA DE EQUIDAD RURAL EN SALUD </small></a>
                        </div>

                        <div class="col-lg-6 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programaonce", "e"); ?>" class="badge badge-pill <?php ($identificador == "programaonce") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> PROGRAMA ADOLESCENTE </small></a>
                        </div>

                        <div class="col-lg-6 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programacinco", "e"); ?>" class="badge badge-pill <?php ($identificador == "programacinco") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> DEPENDENCIA SEVERA </small></a>
                        </div>

                        <div class="col-lg-4 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programaquince", "e"); ?>" class="badge badge-pill <?php ($identificador == "programaquince") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> OIRS </small></a>
                        </div>

                        <div class="col-lg-4 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programacuatro", "e"); ?>" class="badge badge-pill <?php ($identificador == "programacuatro") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> IRA </small></a>
                        </div>

                        <div class="col-lg-4 col-md-12 pb-2">
                            <a href="./?dt=<?php echo encriptar("programaocho", "e"); ?>" class="badge badge-pill <?php ($identificador == "programaocho") ? print("badge_outline_rojo_marcado") : print("badge_outline_rojo"); ?> p-2"> <small class="clase_small"> CCR </small></a>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 pt-4">

                <div class="card shadow ml-4 mr-4" style="border-bottom: 3px solid #dc3545;">
                    <!-- <div class="card-body"> -->
                    <h6 class="text-danger text-center m-2"> <?php echo $titulo; ?> </h6>
                    <!-- </div> -->
                </div>

                <br>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="text-small mt-2">
                            <?php echo $descripcion; ?>
                    </div>
                </div>
            </div>

            <?php include '../partes/banners-derecha.php' ?>
        </div>
    </div>

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#programas").attr('class', 'nav-item active');
    </script>


    <script>
        $('#bannervideotendencias').hide();
        $('#bannerlomasvisto').hide();
    </script>

</body>

</html>